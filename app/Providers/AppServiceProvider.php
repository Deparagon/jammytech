<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            $categories = \App\Category::with('courses')->inRandomOrder()->take(6)->get();
          $subjects = \App\Course::inRandomOrder()->get();
      $states=["Abuja","Anambra","Enugu","Akwa-Ibom","Adamawa","Abia","Bauchi","Bayelsa","Benue","Borno","Cross-River","Delta","Ebonyi","Edo","Ekiti","Gombe","Imo","Jigawa","Kaduna","Kano","Katsina","Kebbi","Kogi","Kwara","Lagos","Nasarawa","Niger","Ogun","Ondo","Osun","Oyo","Plateau","Rivers","Sokoto","Taraba","Yobe","Zamfara"];
 
      View::share('maincategories', $categories);
       View::share('states', $states);
       View::share('subjects', $subjects);
       if(Auth::user()){
           View::share('profiledata', Auth::user());
       }
       
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
