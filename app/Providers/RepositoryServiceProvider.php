<?php
/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 5/8/19
 * Time: 10:45 PM
 */

namespace App\Providers;



use App\Repositories\IBaseRepository;
use App\Repositories\ICommentRepository;
use App\Repositories\IPostRepository;
use App\Repositories\IUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            IBaseRepository::class,
            IUserRepository::class,
            IPostRepository::class,
            ICommentRepository::class
        );
    }
}
