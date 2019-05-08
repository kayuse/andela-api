<?php

namespace App\Providers;

use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;
use \App\Repositories\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\IUserRepository::class, function ($app) {
            return new UserRepository('https://jsonplaceholder.typicode.com/users');
        });

        $this->app->bind(\App\Repositories\IPostRepository::class, function ($app) {
            return new PostRepository('https://jsonplaceholder.typicode.com/posts');
        });

        $this->app->bind(\App\Repositories\ICommentRepository::class, function ($app) {
            return new CommentRepository('https://jsonplaceholder.typicode.com/comments');
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
