<?php

namespace App\Providers;

use App\Categories;
use App\Course;
use App\FrontCategories;
use App\Properties;
use App\CityModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Banks;
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
        /*Schema::defaultStringLength(191);
       $this->app->bind('path.public', function() {
        return getcwd();
       });*/

        view()->composer('front.layout.header2', function($view) {
          $prp = DB::table('properties')
                ->select('city', DB::raw('count(*) as total'))
                ->groupBy('city')
                ->get();
            $city = [];
            foreach ($prp as $k =>$prps){
                $city[] = CityModel::where('id',$prps->city)->get();
            }
            $dat = Categories::where('parent_id','!=',0)->get();
            $view->with('cities', $city)->with('catg',$dat);
        });

        view()->composer('front.index', function($view) {
            $prp = Properties::all();
            $stream = FrontCategories::where('parent_id',0)->with('children')->get();
            $view->with('catf',$stream);
        });

        view()->composer('front.layout.footer', function($view) {
            $prp = Properties::all();
            $bank = Banks::all();
            $view->with('prop', $prp)->with('bank', $bank);
        });

        //
//        Schema::defaultStringLength(191);
//        $this->app->bind('path.public', function() {
//        return base_path().'/public/';
//    });
    }
}
