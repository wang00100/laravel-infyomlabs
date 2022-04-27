<?php namespace Tests\Repositories;

use App\Models\staff;
use App\Repositories\staffRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class staffRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var staffRepository
     */
    protected $staffRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->staffRepo = \App::make(staffRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_staff()
    {
        $staff = staff::factory()->make()->toArray();

        $createdstaff = $this->staffRepo->create($staff);

        $createdstaff = $createdstaff->toArray();
        $this->assertArrayHasKey('id', $createdstaff);
        $this->assertNotNull($createdstaff['id'], 'Created staff must have id specified');
        $this->assertNotNull(staff::find($createdstaff['id']), 'staff with given id must be in DB');
        $this->assertModelData($staff, $createdstaff);
    }

    /**
     * @test read
     */
    public function test_read_staff()
    {
        $staff = staff::factory()->create();

        $dbstaff = $this->staffRepo->find($staff->id);

        $dbstaff = $dbstaff->toArray();
        $this->assertModelData($staff->toArray(), $dbstaff);
    }

    /**
     * @test update
     */
    public function test_update_staff()
    {
        $staff = staff::factory()->create();
        $fakestaff = staff::factory()->make()->toArray();

        $updatedstaff = $this->staffRepo->update($fakestaff, $staff->id);

        $this->assertModelData($fakestaff, $updatedstaff->toArray());
        $dbstaff = $this->staffRepo->find($staff->id);
        $this->assertModelData($fakestaff, $dbstaff->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_staff()
    {
        $staff = staff::factory()->create();

        $resp = $this->staffRepo->delete($staff->id);

        $this->assertTrue($resp);
        $this->assertNull(staff::find($staff->id), 'staff should not exist in DB');
    }
}
