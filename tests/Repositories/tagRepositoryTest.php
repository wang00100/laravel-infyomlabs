<?php namespace Tests\Repositories;

use App\Models\tag;
use App\Repositories\tagRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tagRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tagRepository
     */
    protected $tagRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tagRepo = \App::make(tagRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tag()
    {
        $tag = tag::factory()->make()->toArray();

        $createdtag = $this->tagRepo->create($tag);

        $createdtag = $createdtag->toArray();
        $this->assertArrayHasKey('id', $createdtag);
        $this->assertNotNull($createdtag['id'], 'Created tag must have id specified');
        $this->assertNotNull(tag::find($createdtag['id']), 'tag with given id must be in DB');
        $this->assertModelData($tag, $createdtag);
    }

    /**
     * @test read
     */
    public function test_read_tag()
    {
        $tag = tag::factory()->create();

        $dbtag = $this->tagRepo->find($tag->id);

        $dbtag = $dbtag->toArray();
        $this->assertModelData($tag->toArray(), $dbtag);
    }

    /**
     * @test update
     */
    public function test_update_tag()
    {
        $tag = tag::factory()->create();
        $faketag = tag::factory()->make()->toArray();

        $updatedtag = $this->tagRepo->update($faketag, $tag->id);

        $this->assertModelData($faketag, $updatedtag->toArray());
        $dbtag = $this->tagRepo->find($tag->id);
        $this->assertModelData($faketag, $dbtag->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tag()
    {
        $tag = tag::factory()->create();

        $resp = $this->tagRepo->delete($tag->id);

        $this->assertTrue($resp);
        $this->assertNull(tag::find($tag->id), 'tag should not exist in DB');
    }
}
