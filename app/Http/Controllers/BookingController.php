<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Review;
use App\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function get(){
        $data = Booking::all();
        foreach ($data as $u =>$val){
            $data[$u]['user'] = User::where('id',$val->user_id)->get();
        }
        return response()->json(['data'=>$data]);
    }

    public function dataCount(Request $request){
        $data = Booking::where('property_id',30)->count();
        $rev = Review::where('property_id',30)->count();
        return compact('data','rev');
    }
}
