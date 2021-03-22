<?php

namespace App\Http\Repositories\Implementations;

use App\Http\Repositories\UserRepository;
use App\Models\Post;

class UserRepositoryImpl implements UserRepository
{

  public function create(array $data): object
  {
    return Post::create($data);
  }
}
