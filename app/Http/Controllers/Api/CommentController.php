<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Repositories\CommentRepository;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
  public CommentRepository $repository;

  public function __construct(CommentRepository $postRepository)
  {
    $this->repository = $postRepository;
  }

  public function store(CommentRequest $request): JsonResponse
  {
    return response()->json($this->repository->create($request->all()), 201);
  }
}
