<?php

namespace App\Providers;

use App\Http\Interfaces\AttendanceInterface;
use App\Http\Interfaces\ExamsInterface;
use App\Http\Interfaces\FeesInterface;
use App\Http\Interfaces\FeesInvoicesInterface;
use App\Http\Interfaces\GraduatedStudentsInterface;
use App\Http\Interfaces\PaymentsInterface;
use App\Http\Interfaces\RefundsInterface;
use App\Http\Interfaces\StudentRefundsInterface;
use App\Http\Interfaces\StudentsAccountInterface;
use App\Http\Interfaces\StudentsInterface;
use App\Http\Interfaces\SubjectsInterface;
use App\Http\Interfaces\TeachersInterface;
use App\Http\Interfaces\UpgradeStudentsInterface;
use App\Http\Repositories\AttendanceRepository;
use App\Http\Repositories\ExamsRepository;
use App\Http\Repositories\FeesInvoicesRepository;
use App\Http\Repositories\FeesRepository;
use App\Http\Repositories\GraduatedStudentsRepository;
use App\Http\Repositories\PaymentsRepository;
use App\Http\Repositories\RefundsRepository;
use App\Http\Repositories\StudentRefundsRepository;
use App\Http\Repositories\StudentsAccountRepository;
use App\Http\Repositories\StudentsRepository;
use App\Http\Repositories\SubjectsRepository;
use App\Http\Repositories\TeachersRepository;
use App\Http\Repositories\UpgradeStudentsRepository;
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

        $this->app->bind(UpgradeStudentsInterface::class, UpgradeStudentsRepository::class);

        $this->app->bind(GraduatedStudentsInterface::class, GraduatedStudentsRepository::class);

        $this->app->bind(FeesInterface::class, FeesRepository::class);

        $this->app->bind(FeesInvoicesInterface::class, FeesInvoicesRepository::class);

        $this->app->bind(StudentsAccountInterface::class, StudentsAccountRepository::class);

        $this->app->bind(PaymentsInterface::class, PaymentsRepository::class);

        $this->app->bind(RefundsInterface::class, RefundsRepository::class);

        $this->app->bind(StudentRefundsInterface::class, StudentRefundsRepository::class);

        $this->app->bind(AttendanceInterface::class, AttendanceRepository::class);

        $this->app->bind(SubjectsInterface::class, SubjectsRepository::class);

        $this->app->bind(ExamsInterface::class, ExamsRepository::class);



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
