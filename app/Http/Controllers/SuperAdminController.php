<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\TempPassword;
use Illuminate\Support\Facades\Mail;

class SuperAdminController extends Controller
{
    //
    //Function for Approving Cyber Partner
    public function approveCyberPartner(Request $request){
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $password = Hash::make(implode($pass));
        $data = User::where('id',$request->cyber_id)->update(array('status'=>1,'password'=>$password));
        if($data){
            $temp = new TempPassword();
            $temp->user_id = $request->cyber_id;
            $temp->password = implode($pass);
            $temp->changed = 0;
            $temp->save();
            $datas = array(
                'email' => $request->input('email'),
                'subject' => 'Request Approved - Admission Jockey',
                'name' => $request->input('name'),
                'mailbody' => 'Your Request has been Approved. Thanks for showing your interest. --> Your Login Credentials ---> Email: '.$request->input('email').' --->  Login Password: '.implode($pass)
            );

            Mail::send([], [], function ($message) use ($datas) {
                $message->to($datas['email']);
                $message->subject($datas['subject'] . " from " . $datas['name']);
                $message->setBody($datas['mailbody']);
            });
            return response()->json(['status'=>1],200);
        }
        return response()->json(['status'=>0],200);
    }

    // Function for terminating Cyber Partner
    public function terminateCyberPartner(Request $request){
        $data = User::where('id',$request->cyber_id)->update(array('status'=>7));
        if($data){
            return response()->json(['status'=>1],200);
        }
        return response()->json(['status'=>0],200);
    }
}
