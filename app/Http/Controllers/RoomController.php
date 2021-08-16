<?php

namespace App\Http\Controllers;

use App\Rooms;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //

    public function addRoom(Request $request){
//        return response()->json($request->all());
        foreach ($request->name as $k => $val) {
//            return $request->name[$k];
            $data = new Rooms();
            $data->property_id = $request->prop_id;
            $data->name = $request->name[$k];
            $data->type = $request->type[$k];
            $data->att_bath = $request->bath[$k] == "true" ? 1: 0;
            $data->max_guest = $request->guest[$k];
            $data->extra_bed = $request->bed[$k] == "true" ? 1: 0;
            $data->description = $request->desc[$k];
            $data->status = 1;
            $data->save();
        }
//        if($data){
//            return response()->json(['success'=>1]);
//        }
        return response()->json(['success'=>1]);
    }
}
