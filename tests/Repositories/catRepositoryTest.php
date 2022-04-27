<?php namespace Tests\Repositories;

use App\Models\cat;
use App\Repositories\catRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class catRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var catRepository
     */
    protected $catRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->catRepo = \App::make(catRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cat()
    {
        $cat = cat::factory()->make()->toArray();

        $createdcat = $this->catRepo->create($cat);

        $createdcat = $createdcat->toArray();
        $this->assertArrayHasKey('id', $createdcat);
        $this->assertNotNull($createdcat['id'], 'Created cat must have id specified');
        $this->assertNotNull(cat::find($createdcat['id']), 'cat with given id must be in DB');
        $this->assertModelData($cat, $createdcat);
    }

    /**
     * @test read
     */
    public function test_read_cat()
    {
        $cat = cat::factory()->create();

        $dbcat = $this->catRepo->find($cat->id);

        $dbcat = $dbcat->toArray();
        $this->assertModelData($cat->toArray(), $dbcat);
    }

    /**
     * @test update
     */
    public function test_update_cat()
    {
        $cat = cat::factory()->create();
        $fakecat = cat::factory()->make()->toArray();

        $updatedcat = $this->catRepo->update($fakecat, $cat->id);

        $this->assertModelData($fakecat, $updatedcat->toArray());
        $dbcat = $this->catRepo->find($cat->id);
        $this->assertModelData($fakecat, $dbcat->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cat()
    {
        $cat = cat::factory()->create();

        $resp = $this->catRepo->delete($cat->id);

        $this->assertTrue($resp);
        $this->assertNull(cat::find($cat->id), 'cat should not exist in DB');
    }
}
