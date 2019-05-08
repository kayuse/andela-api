<?php

namespace App\Http\Controllers;

use App\Repositories\IUserRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{


    protected $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;

    }

    //
    public function index()
    {
        try {
            $result = $this->repository->all();
            return $result;

        } catch (\Exception $exception) {
            return response()->json(['status' => -1, 'message' => 'There was an error in processing your request'], 500);
        }
    }

    public function show($id)
    {
        try {
            $result = $this->repository->show($id);
            return $result;

        } catch (\Exception $exception) {
            return response()->json(['status' => -1, 'message' => 'There was an error in processing your request'], 500);
        }
    }

}
