<?php

namespace App\Providers;

use App\Http\Repositories\Implementations\PostRepositoryImpl;
use App\Http\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(PostRepository::class, fn() => new PostRepositoryImpl());
    }

    public function boot(): void
    {
    }
}
