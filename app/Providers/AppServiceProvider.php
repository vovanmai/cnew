<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Model\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('publicUrl',getenv('PUBLIC_URL'));
        View::share('adminUrl',getenv('ADMIN_URL'));
        View::share('arCats',Category::all());
        View::share('URL_PIC',getenv('URL_PIC'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
