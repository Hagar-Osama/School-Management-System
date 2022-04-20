<?php

namespace App\Providers;

use App\Http\Interfaces\StudentsInterface;
use App\Http\Interfaces\TeachersInterface;
use App\Http\Repositories\StudentsRepository;
use App\Http\Repositories\TeachersRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\AuthInterface',
            'App\Http\Repositories\AuthRepository'
        );

        $this->app->bind(
            "App\Http\Interfaces\GradesInterface",
            "App\Http\Repositories\GradesRepository"
        );
        $this->app->bind(
            "App\Http\Interfaces\ClassesInterface",
            "App\Http\Repositories\ClassesRepository"
        );
        $this->app->bind(
            "App\Http\Interfaces\SectionsInterface",
            "App\Http\Repositories\SectionsRepository"
        );
        $this->app->bind(TeachersInterface::class, TeachersRepository::class);

        $this->app->bind(StudentsInterface::class, StudentsRepository::class);

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
