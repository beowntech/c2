<?php

namespace App\Http\Controllers;

use App\Mail\VerifyPropMail;
use App\Properties;
use App\User;
use App\VerifyProp;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    //

    public function send(Request $request){
        $randN = mt_rand(100000, 999999);
        $verifyProp = new VerifyProp();
        $verifyProp->prop_id = $request->prop_id;
        $verifyProp->otp = $randN;
        $verifyProp->save();

        if($verifyProp){
            \Mail::to($request->email)->send(new VerifyPropMail($request->email, $randN));

            return response()->json(['success'=>1]);
        }
        return response()->json(['success'=>0]);
    }

    public function submit(Request $request){
        $data = VerifyProp::where('prop_id',$request->prop)->where('otp',$request->otp)->get();
        if($data->isEmpty()){
            return response()->json(['success'=>0]);
        }
        return response()->json(['success'=>1]);
    }

    public function create(Request $request){
        $data = new User();
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->name = "YogPrerna User";
        $data->verified = 1;
        $data->status = 1;
        $data->contact = $request->contact;
        $data->save();
        $data->assignRole('Admin');
        if($data){
            $prop = Properties::where('id',$request->prop)->update(array('host'=>$data->id));
            return 1;
        }
        return 0;
    }
}
