<?php

namespace App\Providers;

use App\Http\Repositories\Implementations\PostRepositoryImpl;
use App\Http\Repositories\Implementations\UserRepositoryImpl;
use App\Http\Repositories\PostRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(PostRepository::class, fn() => new PostRepositoryImpl());
        $this->app->singleton(UserRepository::class, fn() => new UserRepositoryImpl());
    }

    public function boot(): void
    {
    }
}
