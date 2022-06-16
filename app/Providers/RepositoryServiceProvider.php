<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repository\Eloquent\TaskRepository;
use App\Repository\TaskRepositoryInterface;

use App\Repository\Eloquent\StatusRepository;
use App\Repository\StatusRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TaskRepositoryInterface::class,TaskRepository::class);
        $this->app->bind(StatusRepositoryInterface::class,StatusRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
