<?php

namespace App\Providers;
use View;
use DB;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $kategori = DB::table('kategori')->get();
            $view->with('kategori',$kategori);
        });

        view()->composer('*', function ($view) {
            $contact = DB::table('contact')->get();
            $view->with('contact',$contact);
        });
    }
}
