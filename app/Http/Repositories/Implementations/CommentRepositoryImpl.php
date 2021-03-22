<?php

namespace App\Http\Repositories\Implementations;

use App\Http\Repositories\CommentRepository;
use App\Models\Comment;

class CommentRepositoryImpl implements CommentRepository
{

  public function create(array $data): object
  {
    return Comment::create($data);
  }
}
