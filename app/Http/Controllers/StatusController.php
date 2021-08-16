<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    //

    public function add(Request $request){
        $status = new Status();
        $status->name = $request->name;
        $status->message = $request->message;
        $status->color = $request->color;
        $status->type_for = $request->for;
        $status->save();
        if($status){
            return response()->json(['success'=>1]);
        }
        return response()->json(['success'=>0]);
    }

    public function all(){
        $status = Status::all();
        return response()->json($status);
    }

    public function getProperty(){
        $status = Status::where('type_for',1)->get();
        return response()->json($status);
    }

    public function update(Request $request){
        if($request->type === "name") {
            $status = Status::where('id', '=', $request->id)->update(array('name' => $request->name));
            if ($status) {
                return "Done";
            }
        }else if($request->type === "message"){
            $status = Status::where('id', '=', $request->id)->update(array('message' => $request->msg));
            if ($status) {
                return "Done";
            }
        }else if($request->type === "color"){
            $status = Status::where('id', '=', $request->id)->update(array('color' => $request->color));
            if ($status) {
                return "Done";
            }
        }
    }
}
