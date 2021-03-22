<?php

namespace App\Providers;

use App\Http\Repositories\Implementations\PostRepositoryImpl;
use App\Http\Repositories\Implementations\UserRepositoryImpl;
use App\Http\Repositories\Implementations\CommentRepositoryImpl;
use App\Http\Repositories\PostRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\CommentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(PostRepository::class, fn() => new PostRepositoryImpl());
        $this->app->singleton(UserRepository::class, fn() => new UserRepositoryImpl());
        $this->app->singleton(CommentRepository::class, fn() => new CommentRepositoryImpl());
    }

    public function boot(): void
    {
    }
}
