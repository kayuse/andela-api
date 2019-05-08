<?php
/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 5/8/19
 * Time: 10:38 PM
 */

namespace App\Repositories;


use GuzzleHttp\Client;

class CommentRepository implements ICommentRepository
{
    private $endpoint;
    private $client;

    public function __construct($urlEndpoint)
    {
        $this->endpoint = $urlEndpoint;
        $this->client = new Client();
    }

    public function all()
    {
        $response = $this->client->request('GET', $this->endpoint);
        if ($response->getStatusCode() == 200) {
            return \GuzzleHttp\json_decode($response->getBody());
        }
        throw $response->getBody();
    }

    public function show($id)
    {
        $url = $this->endpoint . "?id=$id";
        $response = $this->client->request('GET', $url);
        if ($response->getStatusCode() == 200) {
            return \GuzzleHttp\json_decode($response->getBody());
        }
        throw $response->getBody();
    }
    public function get($parentId)
    {
        $url = $this->endpoint . "?postId=$parentId";
        $response = $this->client->request('GET', $url);
        if ($response->getStatusCode() == 200) {
            return \GuzzleHttp\json_decode($response->getBody());
        }
        throw $response->getBody();
    }

}
