<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tag;

class tagApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tag()
    {
        $tag = tag::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tags', $tag
        );

        $this->assertApiResponse($tag);
    }

    /**
     * @test
     */
    public function test_read_tag()
    {
        $tag = tag::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/tags/'.$tag->id
        );

        $this->assertApiResponse($tag->toArray());
    }

    /**
     * @test
     */
    public function test_update_tag()
    {
        $tag = tag::factory()->create();
        $editedtag = tag::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tags/'.$tag->id,
            $editedtag
        );

        $this->assertApiResponse($editedtag);
    }

    /**
     * @test
     */
    public function test_delete_tag()
    {
        $tag = tag::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tags/'.$tag->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tags/'.$tag->id
        );

        $this->response->assertStatus(404);
    }
}
