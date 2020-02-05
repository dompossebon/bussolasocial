<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
//        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        if (DB::connection() instanceof \Illuminate\Database\SQLiteConnection) {
//            DB::statement(DB::raw('PRAGMA foreign_keys=1'));
//        }
    }
}
