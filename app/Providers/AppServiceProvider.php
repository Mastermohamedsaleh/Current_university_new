<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;
use App\Repositories\AssignmentRepository;
use App\Interfaces\AssignmentRepositoryInterface;
use App\Interfaces\LectureRepositoryInterface;
use App\Repositories\LectureRepository;
use App\Interfaces\QuizzeRepositoryInterface;
use App\Repositories\QuizzeRepository;

use App\Interfaces\QuestionRepositoryInterface;
use App\Repositories\QuestionRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
          $this->app->bind(AssignmentRepositoryInterface::class, AssignmentRepository::class);
          $this->app->bind(LectureRepositoryInterface::class, LectureRepository::class);
          $this->app->bind(
        QuizzeRepositoryInterface::class,
        QuizzeRepository::class
    );

     $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
