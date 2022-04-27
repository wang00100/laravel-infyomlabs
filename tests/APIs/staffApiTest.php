<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\staff;

class staffApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_staff()
    {
        $staff = staff::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/staff', $staff
        );

        $this->assertApiResponse($staff);
    }

    /**
     * @test
     */
    public function test_read_staff()
    {
        $staff = staff::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/staff/'.$staff->id
        );

        $this->assertApiResponse($staff->toArray());
    }

    /**
     * @test
     */
    public function test_update_staff()
    {
        $staff = staff::factory()->create();
        $editedstaff = staff::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/staff/'.$staff->id,
            $editedstaff
        );

        $this->assertApiResponse($editedstaff);
    }

    /**
     * @test
     */
    public function test_delete_staff()
    {
        $staff = staff::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/staff/'.$staff->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/staff/'.$staff->id
        );

        $this->response->assertStatus(404);
    }
}
