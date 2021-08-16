<?php

namespace App\Http\Controllers;

use App\Amenities;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    //
    public function parent(){
        $data = Amenities::where('parent_id','=',1)->get();
        return $data;
    }

    public function subparent(){
        $data = Amenities::where('parent_id','<>',0)->where('parent_id','<>',1)->get();
        foreach ($data as $key => $val){
            $data[$key]['parent'] = Amenities::where('id','=',$val->parent_id)->get('name');
        }
        return $data;
    }

    public function add(Request $request){
        $check = Amenities::where('name','=',$request->name)->first();
        if($check == null || $check == "") {
            $data = new Amenities();
            $data->name = $request->name;
            $data->parent_id = 0;
            $data->status = 1;
            $data->save();
            if ($data) {
                return 1;
            }
            return 0;
        }
        return 2;
    }
    public function subadd(Request $request){
        $check = Amenities::where('name','=',$request->name)->first();

        if($check == null || $check == "") {
            $data = new Amenities();
            $data->name = $request->name;
            $data->parent_id = $request->parent;
            $data->status = 1;
            $data->save();
            if ($data) {
                return 1;
            }
            return 0;
        }
        return 2;
    }

    public function update(Request $request){
        if($request->type == 1) {
            $data = Amenities::where('id', '=', $request->id)->update(array('parent_id' => $request->parent));
        }else if($request->type == 2){
            $data = Amenities::where('id', '=', $request->id)->update(array('name' => $request->name));
        }else if($request->type == 3){
            $data = Amenities::where('id', '=', $request->id)->update(array('name' => $request->name));
        }
        return 1;
    }
}
