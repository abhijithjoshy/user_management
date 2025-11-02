<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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
        Route::macro('softDeletes', function ($name, $controller) {
            Route::get("$name/trashed", "$controller@trashed")->name("$name.trashed");
            Route::patch("$name/{user}/restore", "$controller@restore")->name("$name.restore");
            Route::delete("$name/{user}/delete", "$controller@delete")->name("$name.delete");
            Route::delete("$name/{user}/force-delete", "$controller@forceDelete")->name("$name.forceDelete");
        });
    }
}
