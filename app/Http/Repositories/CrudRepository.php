<?php

namespace App\Http\Repositories;

interface CrudRepository
{
    public function create(array $data): object;
}