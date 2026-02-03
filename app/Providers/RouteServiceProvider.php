<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    public const ADMIN = '/dashboard/admin';

    public const STUDENT = '/dashboard/student';

    public const  DOCTOR = '/dashboard/doctor';

    public const ACCOUNTANT = '/dashboard/accountant';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));


            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/student.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/doctor.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/accountant.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

    RateLimiter::for('admin_login', function ($request) {
       return Limit::perMinute(5)->by($request->email.$request->ip())->response(function() {
            return response()->json([
                'message' => 'لقد تجاوزت الحد المسموح به لتسجيل , حاول مرة أخرى بعد دقيقة.'
            ], 429);
        });
    
    });
    RateLimiter::for('student_login', function ($request) {
        return Limit::perMinute(5)->by($request->email.$request->ip())->response(function() {
            return response()->json([
                'message' => 'لقد تجاوزت الحد المسموح به لتسجيل , حاول مرة أخرى بعد دقيقة.'
            ], 429);
        });
    });

    RateLimiter::for('doctor_login', function ($request) {
        return Limit::perMinute(3)->by($request->email.$request->ip())->response(function() {
            return response()->json([
                'message' => 'لقد تجاوزت الحد المسموح به لتسجيل , حاول مرة أخرى بعد دقيقة.'
            ], 429);
        });
   
    });

        RateLimiter::for('accountant_login', function ($request) {
        return Limit::perMinute(3)->by($request->email.$request->ip())->response(function() {
            return response()->json([
                'message' => 'لقد تجاوزت الحد المسموح به لتسجيل , حاول مرة أخرى بعد دقيقة.'
            ], 429);
        });
    });



    }
}
