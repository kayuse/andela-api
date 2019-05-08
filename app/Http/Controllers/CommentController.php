<?php

namespace App\Http\Controllers;

use App\Repositories\ICommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $repository;

    public function __construct(ICommentRepository $repository)
    {
        $this->repository = $repository;

    }
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
    public function get($postId){
        try {
            $result = $this->repository->get($postId);
            return $result;

        } catch (\Exception $exception) {
            return response()->json(['status' => -1, 'message' => 'There was an error in processing your request'], 500);
        }
    }
}
