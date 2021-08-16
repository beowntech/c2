<?php

namespace App\Http\Controllers;

use App\Booking;
use App\ImagesModel;
use App\Models\PrivacyTermsModel;
use App\PagesModel;
use App\Properties;
use App\Rooms;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppController extends Controller
{
    //
    public function getProp(Request $request){
        $data = Properties::where('host','=',$request->user_id)->get();
        if ($data->isEmpty()){
            return 0;
        }
        foreach ($data as $k => $val){
            $data[$k]['image'] = ImagesModel::where('property_id',$val->id)->get('featured');
            $data[$k]['rooms'] = Rooms::where('property_id',$val->id)->count();
        }
        return response()->json($data);
    }

    public function getRooms(Request $request){
        $rooms = "";
        if($request->prop_id == null || $request->prop_id == 0) {
            $data = Properties::where('host', '=', $request->user_id)->first();
            if ($data == null || $data == "") {
                return 0;
            }
                $rooms = Rooms::where('property_id', $data->id)->get();
                    foreach ($rooms as $y => $vals) {
                        $book = Booking::where('room_id',$vals->id)->where('status',6)->whereDate('from_date',Carbon::today())->count();
                        if(!$book == 0) {
                            $rooms[$y]['avail'] = $book;
                        }else{
                            $rooms[$y]['avail'] = 0;
                        }
                    }
            return response()->json($rooms);
        }else{
            $rooms = Rooms::where('property_id', $request->prop_id)->get();
            foreach ($rooms as $y => $vals) {
                $book = Booking::where('room_id',$vals->id)->get('guests');
                if(!$book->isEmpty()) {
                    $rooms[$y]['avail'] = $book;
                }else{
                    $guest = ['guests'=>0];
                    $rooms[$y]['avail'] = [$guest];
                }
            }
            return response()->json($rooms);
        }
    }

    public function profileData(Request $request){
        $rooms=0;
        $data = Properties::where('host',$request->user_id)->get();
        $prop = Properties::where('host',$request->user_id)->count();
        foreach ($data as $k =>$v) {
            $rooms += Rooms::where('property_id', $v->id)->count();
        }
        return response()->json(['prop'=>$prop,'rooms'=>$rooms]);
    }

    public function getPropAll(Request $request){
//        $rooms = 0;
//        $book = 0;
        $data = Properties::where('status',1)->get();
        foreach ($data as $k =>$v) {
            $rooms =0;
            $book =0;
            $rooms += Rooms::where('property_id', $v->id)->where('status', 1)->count();
            $room = Rooms::where('property_id', $v->id)->where('status', 1)->get();
            foreach ($room as $f => $val) {
                $book += Booking::where('room_id', $val->id)->where('status', 6)->whereDate('from_date', Carbon::today())->count();
            }
            $data[$k]['rooms'] = $rooms - $book;
            $data[$k]['room'] = $book;
        }
        return response()->json($data);
    }

    public function addBooking(Request $request){
        if($request->name === "0") {
            $data = new Booking();
            $data->property_id = $request->property;
            $data->room_id = $request->room;
            $data->guests = $request->guests;
            $data->from_date = $request->from;
            $data->to_date = $request->to;
            $data->price = $request->price;
            $data->status = 6;
            $data->save();
            if($data){
                Rooms::where('id',$request->room)->update(array('status'=>6));
                return response()->json(['success'=>1]);
            }
            return response()->json(['success'=>0]);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->status = 1;
        $user->save();
        if($user) {
            $data = new Booking();
            $data->user_id = $user->id;
            $data->property_id = $request->property;
            $data->room_id = $request->room;
            $data->guests = $request->guests;
            $data->from_date = $request->from;
            $data->to_date = $request->to;
            $data->price = $request->price;
            $data->status = 6;
            $data->save();
            if($data){
                Rooms::where('id',$request->room)->update(array('status'=>6));
                return response()->json(['success'=>1]);
            }
            return response()->json(['success'=>0]);
        }
        return response()->json(['success'=>0]);
    }

    public function unbookRoom(Request $request){
        $book = Booking::where('room_id',$request->room)->where('status',6)->update(array('status'=>7));
        $data = Rooms::where('id',$request->room)->update(array('status'=>1));
        return response()->json(['success'=>1]);
    }

    public function getPrivacy(){
        $data = PagesModel::where('id',1)->get('content');
        return $data;
    }

    public function getChangeData(){
        $data = User::where('id',7)->get();
        return $data;
    }
}
