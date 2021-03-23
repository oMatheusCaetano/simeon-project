<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Repositories\CommentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
  public CommentRepository $repository;

  public function __construct(CommentRepository $postRepository)
  {
    $this->middleware('auth:api');
    $this->repository = $postRepository;
  }

  public function store(CommentRequest $request): JsonResponse
  {
    $data = $request->all();
    $data['user_id'] = Auth::user()->id;
    return response()->json($this->repository->create($data), 201);
  }
}
