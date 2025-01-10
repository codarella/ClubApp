<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model; 
use App\Models\Clubs;
use App\Models\User;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('RUN_MIGRATIONS', false)) {
            try {
                // Run migrations
                Artisan::call('migrate', ['--force' => true]);

                // Run seeders
                Artisan::call('db:seed', ['--force' => true]);
            } catch (\Exception $e) {
                logger('Migration or Seeding error: ' . $e->getMessage());
            }
        }
        Model::preventLazyLoading();

        Paginator::useTailwind();
        
        Gate::define('edit-club', function (User $user, Clubs $club) {
            return $club->user_id === $user->id;
        });
    }
}
