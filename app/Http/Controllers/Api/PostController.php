<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

  public function lastCommented()
  {
    return response()->json($this->repository->findLastCommented(Auth::user()->id));
  }

  public function store(PostRequest $request): JsonResponse
  {
    $data = $request->all();
    $data['user_id'] = Auth::user()->id;
    return response()->json($this->repository->create($data), 201);
  }
}
