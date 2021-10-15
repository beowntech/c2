<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //

    public static function categories(){
        $menu = Menu::where('page_type','main')->get('menu');
        $final = [];
        if($menu->isNotEmpty()) {
            if ($menu[0]->menu != null) {
                $manu = json_decode($menu[0]->menu);
                foreach ($manu as $d => $val) {
                    if (isset($val->category)) {
                        $catg = FrontCategories::where('id', $val->category)->get('name');
                        $manu[$d]->catg = str_replace(' ', '-', strtolower($catg[0]->name));
                    }
                    foreach ($val->submenu as $s => $sub) {
                        if (isset($sub->category)) {
                            $catgs = FrontCategories::where('id', $sub->category)->get('name');
                            $manu[$d]->submenu[$s]->catg = str_replace(' ', '-', strtolower($catgs[0]->name));
                        }
                        if (isset($sub->submenu)) {
                            foreach ($sub->submenu as $sc => $subc) {
                                $catgs = FrontCategories::where('id', $subc->category)->get('name');
                                $manu[$d]->submenu[$s]->submenu[$sc]->catg = str_replace(' ', '-', strtolower($catgs[0]->name));
                            }
                        }
                    }
                }
                $final = $manu;
            }
        }
        return $final;
    }
}
