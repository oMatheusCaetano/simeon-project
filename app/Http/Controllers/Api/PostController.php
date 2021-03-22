<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
  public function index()
  {
    return response()->json(Post::paginate());
  }

  public function store(PostRequest $request)
  {
    return response()->json(Post::create($request->all()));
  }
}
