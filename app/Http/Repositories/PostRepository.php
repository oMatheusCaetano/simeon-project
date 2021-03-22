<?php

namespace App\Http\Repositories;

interface PostRepository
{
    public function getAllPaginated(): array;
    public function create(array $data): object;
}