<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
  public PostRepository $repository;

  public function __construct(PostRepository $postRepository)
  {
    $this->middleware('auth:api');
    $this->repository = $postRepository;
  }

  public function index(): JsonResponse
  {
    return response()->json($this->repository->getAllPaginated());
  }

  public function store(PostRequest $request): JsonResponse
  {
    return response()->json($this->repository->create($request->all()), 201);
  }
}
