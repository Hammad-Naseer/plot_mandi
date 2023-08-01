<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        \DB::listen(function ($query) {
            // Log or display the query and its bindings
            $sql = $query->sql;
            $bindings = $query->bindings;
            $time = $query->time;
        
            // Log the query information
            \Log::debug('Query: ' . $sql);
            \Log::debug('Bindings: ' . print_r($bindings, true));
            \Log::debug('Time: ' . $time . 'ms');
        });
        
    }
}
