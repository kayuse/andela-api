<?php

namespace Tests\Feature;

use App\Repositories\CommentRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Client;

class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEndpoint()
    {
        $client = new Client();
        $response = $client->request('GET','https://jsonplaceholder.typicode.com/comments');
        $this->assertTrue($response->getStatusCode() == 200);
    }

    /*
     * I decided to use the live url to test because I do not have
     * a test url to mock.
     */
    public function testSinglePost()
    {
        $postRepository = new CommentRepository('https://jsonplaceholder.typicode.com/comments');
        $result = $postRepository->show(1);
        $this->assertTrue(count($result) <= 1);
    }

    public function testUserPost(){
        $postRepository = new CommentRepository('https://jsonplaceholder.typicode.com/comments');
        $testdata = $postRepository->get(1);
        foreach ($testdata as $values) {
            $this->assertTrue($values->postId == 1);

        }
    }
}
