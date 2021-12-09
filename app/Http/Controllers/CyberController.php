<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Cyber;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\TempPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Events\CyberLeads;
class CyberController extends Controller
{
    //

    public function addLead(Request $request){

        $callers = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'Caller');
        })->get('id');
        $check = Cyber::latest()->first();
        if($check != null) {
            $call = [];
            foreach ($callers as $c) {
                $call[] = $c->id;
            }
            $search = array_search($check->assigned_to, $call);
            $count = count($call) - 1;
            $main = 0;
            if ($search == $count) {
                $main = $call[0];
            } else {
                $main = $call[$search + 1];
            }

            $data = new Cyber();
            $data->user_id = Auth::user()->id;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->contact = $request->contact;
            $data->city = $request->city;
            $data->interested_course = $request->course;
            $data->interested_place = $request->place;
            $data->interested_college = $request->college;
            $data->message = $request->message;
            $data->class = $request->class;
            $data->status = 0;
            $data->assigned_to = $main;
            $data->save();
            if ($data) {
                event(new CyberLeads($data->id));
                $success = "Lead Added Successfully";
                return redirect()->back()->with('success',$success);
            }
            return 0;
        }
        else{
            $data = new Cyber();
            $data->user_id = Auth::user()->id;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->contact = $request->contact;
            $data->city = $request->city;
            $data->interested_course = $request->course;
            $data->interested_place = $request->place;
            $data->interested_college = $request->college;
            $data->message = $request->message;
            $data->class = $request->class;
            $data->status = 0;
            $data->assigned_to = $callers[0]->id;
            $data->save();
            if ($data) {
                event(new CyberLeads($data->id));
                return 1;
            }
            return 0;
        }
    }

    public function getLeads(){
        $data = Cyber::where('user_id',Auth::user()->id)->with('college')->get();
        return view('v2.front.cyber.leads',compact('data'));
    }

    public function joinCyber(Request $request){
        $check = User::where('email',$request->email)->count();
        if($check == 0) {
            $data = new User();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->contact = $request->contact;
            $data->cafe_name = $request->cafe;
            $data->cafe_city = $request->city;
            $data->status = 4;
            $data->save();
            if ($data) {
                $data->assignRole('Cyber');
                $datas = array(
                    'email' => $request->input('email'),
                    'subject' => 'Cyber Partner - Admission Jockey',
                    'name' => $request->input('name'),
                    'mailbody' => 'Your Request has been sent to admin. Thanks for taking interest in Cyber Partner'
                );

                Mail::send([], [], function ($message) use ($datas) {
                    $message->to($datas['email']);
                    $message->subject($datas['subject'] . " from " . $datas['name']);
                    $message->setBody($datas['mailbody']);
                });
//                return implode($pass);
            }
        }else{
            return 0;
        }
        return 0;
    }

    public function cyberDetail(Request $request){
        $arr = [];
        $data = Cyber::where('id',$request->enq)->get('cyber_status');
        if($data[0]->cyber_status != null) {
            foreach (json_decode($data[0]->cyber_status) as $item => $val) {
                $arr[] = array(
                    'date' => date('d M Y', strtotime($val->datetime)),
                    'reason' => $val->reason
                );
            }
            return $arr;
        }
        return response()->json([]);
    }

    public function updateStatus(Request $request){
        $data = Cyber::where('id',$request->id)->update(array('status'=>$request->status));
        return 1;
    }

    public function reasonAdd(Request $request){
        $data = Cyber::where('id',$request->id)->get('cyber_status');
        if($data[0]->cyber_status != null) {
            $arr = json_decode($data[0]->cyber_status, true);
            $arr[] = ['datetime' => Carbon::now(), 'reason' => $request->reason,'user'=>$request->user_id];
            $json = json_encode($arr);
            $check = Cyber::where('id', $request->id)->update(array('cyber_status' => $json));
            if ($check) {
                return 1;
            }
            return 0;
        }else{
            $arr[] = ['datetime' => Carbon::now(), 'reason' => $request->reason,'user'=>$request->user_id];
            $json = json_encode($arr);
            $check = Cyber::where('id', $request->id)->update(array('cyber_status' => $json));
            if ($check) {
                return 1;
            }
            return 0;
        }
    }
}
