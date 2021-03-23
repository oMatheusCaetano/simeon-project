<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
  public UserRepository $repository;

  public function __construct(UserRepository $postRepository)
  {
    $this->middleware('auth:api', ['except' => ['store']]);
    $this->repository = $postRepository;
  }

  public function store(UserRequest $request): JsonResponse
  {
    return response()->json($this->repository->create($request->all()), 201);
  }
}
