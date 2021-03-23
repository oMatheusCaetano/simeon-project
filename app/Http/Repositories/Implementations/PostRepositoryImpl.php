<?php

namespace App\Http\Repositories\Implementations;

use App\Http\Repositories\PostRepository;
use App\Models\Post;
use Illuminate\Support\Facades\DB;


class PostRepositoryImpl implements PostRepository
{

  public function getAllPaginated(): array
  {
    $posts = Post::orderBy('created_at', 'desc')->paginate(5)->toArray();
    foreach ($posts['data'] as $key => $value) {
      $posts['data'][$key]['comments'] = DB::table('comments')
        ->select(['comments.description', 'comments.created_at', 'users.name', 'users.email'])
        ->where('post_id', '=', $value['id'])
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->orderBy('comments.created_at', 'desc')
        ->get();
    }
    return $posts;
  }

  public function create(array $data): object
  {
    return Post::create($data);
  }
}
