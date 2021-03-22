<?php

namespace App\Http\Repositories;

use App\Http\Repositories\CrudRepository;

interface PostRepository extends CrudRepository 
{
    public function getAllPaginated(): array;
}