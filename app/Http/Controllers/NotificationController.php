<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Notification;
use App\Properties;
use App\Rooms;
use App\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function getNotification(Request $request){
        $data = Notification::where('user_id',$request->userID)->get();
        return array_reverse($data->toArray());
    }

    public function getNotificationDetail(Request $request){
        $data = Booking::where('id',$request->bookingID)->get();
        $prop = Properties::where('id',$data[0]->property_id)->get();
        $user = User::where('id',$prop[0]->host)->get();
        $room = Rooms::where('id',$data[0]->room_id)->get();
        return response()->json(['success'=>['data'=>$data,'user'=>$user,'room'=>$room]]);
    }
}
