<?php

namespace Tests\Feature;

use App\Repositories\UserRepository;
use GuzzleHttp\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserEndpoint()
    {
        $client = new Client();
        $response = $client->request('GET','https://jsonplaceholder.typicode.com/users');
        $this->assertTrue($response->getStatusCode() == 200);
    }

    /*
     * I decided to use the live url to test because I do not have
     * a test url to mock.
     */
    public function testSingleUser()
    {
        $userRepository = new UserRepository('https://jsonplaceholder.typicode.com/users');
        $result = $userRepository->show(1);
        $this->assertTrue(count($result) == 1);
    }


}
