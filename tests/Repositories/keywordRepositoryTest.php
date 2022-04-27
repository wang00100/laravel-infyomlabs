<?php namespace Tests\Repositories;

use App\Models\keyword;
use App\Repositories\keywordRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class keywordRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var keywordRepository
     */
    protected $keywordRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->keywordRepo = \App::make(keywordRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_keyword()
    {
        $keyword = keyword::factory()->make()->toArray();

        $createdkeyword = $this->keywordRepo->create($keyword);

        $createdkeyword = $createdkeyword->toArray();
        $this->assertArrayHasKey('id', $createdkeyword);
        $this->assertNotNull($createdkeyword['id'], 'Created keyword must have id specified');
        $this->assertNotNull(keyword::find($createdkeyword['id']), 'keyword with given id must be in DB');
        $this->assertModelData($keyword, $createdkeyword);
    }

    /**
     * @test read
     */
    public function test_read_keyword()
    {
        $keyword = keyword::factory()->create();

        $dbkeyword = $this->keywordRepo->find($keyword->id);

        $dbkeyword = $dbkeyword->toArray();
        $this->assertModelData($keyword->toArray(), $dbkeyword);
    }

    /**
     * @test update
     */
    public function test_update_keyword()
    {
        $keyword = keyword::factory()->create();
        $fakekeyword = keyword::factory()->make()->toArray();

        $updatedkeyword = $this->keywordRepo->update($fakekeyword, $keyword->id);

        $this->assertModelData($fakekeyword, $updatedkeyword->toArray());
        $dbkeyword = $this->keywordRepo->find($keyword->id);
        $this->assertModelData($fakekeyword, $dbkeyword->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_keyword()
    {
        $keyword = keyword::factory()->create();

        $resp = $this->keywordRepo->delete($keyword->id);

        $this->assertTrue($resp);
        $this->assertNull(keyword::find($keyword->id), 'keyword should not exist in DB');
    }
}
