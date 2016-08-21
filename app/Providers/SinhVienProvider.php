<?php

namespace App\Providers;

use App\ConcreateClass\Sinhvien;
use Illuminate\Support\ServiceProvider;

class SinhvienProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\BaseClass\ISinhvien', function(){

            return new Sinhvien();

        });
    }
    public function boot()
    {
        //
    }
}
