<?php

namespace Tests\Feature;

use App\Repositories\PostRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Client;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEndpoint()
    {
        $client = new Client();
        $response = $client->request('GET','https://jsonplaceholder.typicode.com/posts');
        $this->assertTrue($response->getStatusCode() == 200);
    }

    /*
     * I decided to use the live url to test because I do not have
     * a test url to mock.
     */
    public function testSinglePost()
    {
        $postRepository = new PostRepository('https://jsonplaceholder.typicode.com/posts');
        $result = $postRepository->show(1);
        $this->assertTrue(count($result) <= 1);
    }

    public function testUserPost(){
        $postRepository = new PostRepository('https://jsonplaceholder.typicode.com/posts');
        $testdata = $postRepository->get(1);
        foreach ($testdata as $values) {
            $this->assertTrue($values->userId == 1);

        }
    }
}
