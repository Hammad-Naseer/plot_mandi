<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\StoredProcedureHelper;

class StoredProcedureHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        foreach (get_class_methods(StoredProcedureHelper::class) as $method) {
            $this->app->bind($method, function () use ($method) {
                return StoredProcedureHelper::$method(...func_get_args());
            });
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
