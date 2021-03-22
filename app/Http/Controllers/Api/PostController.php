<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Repositories\PostRepository;

class PostController extends Controller
{
  public PostRepository $repository;

  public function __construct(PostRepository $postRepository)
  {
    $this->repository = $postRepository;
  }

  public function index()
  {
    return response()->json($this->repository->getAllPaginated());
  }

  public function store(PostRequest $request)
  {
    return response()->json($this->repository->create($request->all()));
  }
}
