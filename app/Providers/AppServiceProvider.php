<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

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
    }
}
