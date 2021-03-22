<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Repositories\Implementations\PostRepositoryImpl;

class PostController extends Controller
{
  public function index()
  {
    $postRespotiroy = new PostRepositoryImpl();
    return response()->json($postRespotiroy->getAllPaginated());
  }

  public function store(PostRequest $request)
  {
    $postRespotiroy = new PostRepositoryImpl();
    return response()->json($postRespotiroy->create($request->all()));
  }
}
