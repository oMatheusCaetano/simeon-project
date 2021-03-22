<?php

namespace App\Http\Repositories\Implementations;

use App\Http\Repositories\UserRepository;
use App\Models\User;

class UserRepositoryImpl implements UserRepository
{

  public function create(array $data): object
  {
    return User::create($data);
  }
}
