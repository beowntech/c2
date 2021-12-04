<?php

namespace App\Providers;

use App\Categories;
use App\CategoryNameModel;
use App\Course;
use App\FrontCategories;
use App\Menu;
use App\Properties;
use App\CityModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Banks;
use Illuminate\Support\Facades\URL;
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

       if(env('FORCE_HTTPS',false)) { // Default value should be false for local server
        URL::forceScheme('https');
       }

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

        view()->composer('front.modal.index', function($view) {
            $courses = FrontCategories::where('parent_id',0)->with('children')->get();
            $view->with('courses',$courses);
        });

        view()->composer('front.layout.footer', function($view) {
            $prp = Properties::all();
            $bank = Banks::all();
            $view->with('prop', $prp)->with('bank', $bank);
        });

        view()->composer('front.blog.layout.footer', function($view) {
            $courses = FrontCategories::where('parent_id',0)->with('children')->get();
            $view->with('courses',$courses);
        });

        view()->composer('v2.front.modal.applynow', function($view) {
            $course = DB::table('front_categories')
                ->select('name', DB::raw('count(*) as total'))
                ->groupBy('name')
                ->get();
            $view->with('courses',$course);
        });

        view()->composer('v2.front.apply-now', function($view) {
            $course = DB::table('front_categories')
                ->select('name', DB::raw('count(*) as total'))
                ->groupBy('name')
                ->get();
            $view->with('courses',$course);
        });


        view()->composer('v2.front.layout.header', function($view) {
            $menu = Menu::categories();
            $view->with('menu',$menu);
        });
        view()->composer('v2.front.layout.footer', function($view) {
//            $data = FrontCategories::with('children')->get();
//            $district = \App\Destination::where('status',1)->get();
            $footer = Menu::where('page_type','main')->get('footer');
            $footer_upper = Menu::where('page_type','main')->get('upper_footer');
            $footer_menu= [];
            $footer_upper_menu= [];
            if($footer->isNotEmpty()) {
                if($footer[0]->footer != null) {
                    $footer_menu = json_decode($footer[0]->footer);
                    foreach ($footer_menu as $d => $val) {
                        if (isset($val->category)) {
                            $catg = FrontCategories::where('id', $val->category)->get('name');
                            $footer_menu[$d]->catg = str_replace(' ', '-', strtolower($catg[0]->name));
                        }
                        foreach ($val->submenu as $s => $sub) {
                            if (isset($sub->category)) {
                                $catgs = FrontCategories::where('id', $sub->category)->get('name');
                                $footer_menu[$d]->submenu[$s]->catg = str_replace(' ', '-', strtolower($catgs[0]->name));
                            }
                        }
                    }
                }else{
                    $footer_menu = [];
                }
            }
            else{
                $footer_menu = [];
            }
            if($footer_upper->isNotEmpty()) {
                if($footer_upper[0]->upper_footer != null) {
                    $footer_upper_menu = json_decode($footer_upper[0]->upper_footer);
                    foreach ($footer_upper_menu as $d => $val) {
                        if (isset($val->category)) {
                            $catg = FrontCategories::where('id', $val->category)->get('name');
                            $footer_upper_menu[$d]->catg = str_replace(' ', '-', strtolower($catg[0]->name));
                        }
                        foreach ($val->submenu as $s => $sub) {
                            if (isset($sub->category)) {
                                $catgs = FrontCategories::where('id', $sub->category)->get('name');
                                $footer_upper_menu[$d]->submenu[$s]->catg = str_replace(' ', '-', strtolower($catgs[0]->name));
                            }
                        }
                    }
                }else{
                    $footer_upper_menu = [];
                }
            }
            else{
                $footer_upper_menu = [];
            }
            $final = $footer_menu != [] ? json_encode($footer_menu): json_encode($footer_menu);
            $final_upper = $footer_upper_menu != [] ? json_encode($footer_upper_menu): json_encode($footer_upper_menu);
            $view
//                ->with('footerCatg',$data)
                ->with('count',1)
                ->with('footer_menu',$final)
                ->with('footer_upper_menu',$final_upper);
        });

        //
//        Schema::defaultStringLength(191);
//        $this->app->bind('path.public', function() {
//        return base_path().'/public/';
//    });
    }
}
