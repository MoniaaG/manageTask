<?php

namespace App\Providers;

use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TaskRepositoryInterface::class,
            TaskRepository::class
        );

        $this->app->bind(
            ProjectRepositoryInterface::class,
            ProjectRepository::class
        );
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
