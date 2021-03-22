<?php

namespace App\Http\Repositories\Implementations;

use App\Http\Repositories\PostRepository;
use App\Models\Post;

class PostRepositoryImpl implements PostRepository
{

  public function getAllPaginated(): array
  {
    return Post::paginate()->toArray();
  }

  public function create(array $data): object
  {
    return Post::create($data);
  }
}
