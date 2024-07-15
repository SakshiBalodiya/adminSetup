<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
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
        Validator::extend('valid_role', function ($attribute, $value, $parameters, $validator) {
            $validroles = ['customer', 'admin', 'subadmin'];
           
  
            $query = User::where('role', $validroles);
           
  
            return $query->exists();
        });
    }
}
