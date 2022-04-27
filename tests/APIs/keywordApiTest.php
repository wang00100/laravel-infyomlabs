<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\keyword;

class keywordApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_keyword()
    {
        $keyword = keyword::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/keywords', $keyword
        );

        $this->assertApiResponse($keyword);
    }

    /**
     * @test
     */
    public function test_read_keyword()
    {
        $keyword = keyword::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/keywords/'.$keyword->id
        );

        $this->assertApiResponse($keyword->toArray());
    }

    /**
     * @test
     */
    public function test_update_keyword()
    {
        $keyword = keyword::factory()->create();
        $editedkeyword = keyword::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/keywords/'.$keyword->id,
            $editedkeyword
        );

        $this->assertApiResponse($editedkeyword);
    }

    /**
     * @test
     */
    public function test_delete_keyword()
    {
        $keyword = keyword::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/keywords/'.$keyword->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/keywords/'.$keyword->id
        );

        $this->response->assertStatus(404);
    }
}
