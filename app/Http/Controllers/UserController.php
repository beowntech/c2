<?php

namespace App\Http\Controllers;

use App\Mail\VerifyMail;
use App\VerifyUser;
use App\Properties;
use App\StateModel;
use App\Status;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'contact' => $request->get('contact'),
            'status' => 1,
            'verified' => 0,
            'password' => Hash::make($request->get('password')),
        ]);

        $user->assignRole('Admin');

        $randN = mt_rand(100000, 999999);
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'otp' => $randN
        ]);
        if($verifyUser){
            \Mail::to($user->email)->send(new VerifyMail($user, $randN));
            // $success = ['token' => $user->createToken('MyApp')->accessToken, 'NAME' => $user->name, 'EMAIL' => $user->email, 'ID' => $user->id, 'IMAGE' => $user->image];
            return response()->json(['success'=>1, 'user'=>$user->id]);
        }
        return response()->json(0, $this->successStatus);

//        $token = JWTAuth::fromUser($user);

//        return response()->json(compact('user','token'), 201);

    }

    public function confirmPin(Request $request){

        $data = VerifyUser::where('otp',$request->pin)->where('user_id',$request->userID)->get();
        if(!$data->isEmpty()){
            User::where('id',$request->userID)->update(array('verified'=>1));
            $user = Auth::loginUsingId($request->userID);
            $token = JWTAuth::fromUser($user);
            return response()->json(compact('user','token'), 201);
        }
        return response()->json(0,200);
    }

    public function login(Request $request){
        $credentials = $request->json()->all();

        try {
            if(! $token = JWTAuth::attempt($credentials)){
                return response()->json(['error'=>'invalid Credentials'], 400);
            }
        }catch (JWTException $e){
            return response()->json(['error'=>'could_not_create_token'], 500);
        }
        $user = Auth::user();
        $user->getRoleNames();
        if($user->deleted_at != null){
            return response()->json(['status'=>2]);
        }
        return response()->json(compact('token','user'));

    }

    public function getAuthenticatedUser(){
        try{
            if(!$user = JWTAuth::parseToken()->authenticate()){
                return response()->json(['user_not_found'], 400);
            }
        }catch (TokenExpiredException $e){
            return response()->json(['token_expired']);
        }catch (TokenInvalidException $e){
            return response()->json(['token_invalid']);
        }catch (JWTException $e){
            return response()->json(['token_absent']);
        }
        $user->getRoleNames();
        return response()->json(compact('user'));
    }

    public function frontLogin(Request $request){

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user()->roles->pluck('name');
            if($user[0] == "Cyber"){
                return redirect('/cyber-leads');
            }
            return redirect('/');
        }
        return back()->withErrors(['error'=>'Wrong Credentials']);
    }

    public function appLogin(Request $request){
      $user = User::where('email',$request->email)->get();
        if(!$user->isEmpty()) {
            if($user[0]->status === 2){
                $status = Status::where('id',2)->get();
                $success = ['status'=> $status, 'code'=>3];
                return response()->json(['success' => $success]);
            }
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $roles = Auth::user()->roles->pluck('name');
                $success = ['name' => Auth::user()->name, 'email' => Auth::user()->email, 'id' => Auth::user()->id, 'contact' => Auth::user()->contact, 'altcontact' => Auth::user()->alt_contact, 'roles' => $roles];
                return response()->json(['success' => $success]);
            }
            $status = Status::where('id',8)->get();
            $success = ['status'=> $status, 'code'=>0];
            return response()->json(['success' => $success]);
        }
        $status = Status::where('id',9)->get();
        $success = ['status'=> $status, 'code'=>2];
        return response()->json(['success' => $success]);
    }

    public function frontLogout(Request $request){

        Auth::logout();
            return redirect('/');
    }

    public function getManager(){
        $manager = User::whereHas(
            'roles', function($q){
            $q->where('name', 'Manager');
        }
        )->get();
        foreach ($manager as $item => $val) {
            $manager[$item]['statuss'] = Status::where('id','=',$val->status)->get();
        }
        return $manager;
    }

    public function getGuest(){
        $manager = User::whereHas(
            'roles', function($q){
            $q->where('name', 'User');
        }
        )->get();
        foreach ($manager as $item => $val) {
            $manager[$item]['statuss'] = Status::where('id','=',$val->status)->get();
        }
        return $manager;
    }

    public function getEditors(){
        $manager = User::whereHas(
            'roles', function($q){
            $q->where('name', 'Editor');
        }
        )->where('deleted_at',null)->get();
        foreach ($manager as $item => $val) {
            $manager[$item]['statuss'] = Status::where('id','=',$val->status)->get();
        }
        return $manager;
    }

    public function getCyber(){
        $manager = User::whereHas(
            'roles', function($q){
            $q->where('name', 'Cyber');
        }
        )->where('deleted_at',null)->get();
        foreach ($manager as $item => $val) {
            $manager[$item]['statuss'] = Status::where('id','=',$val->status)->get();
        }
        return $manager;
    }

    public function getCallers(){
        $manager = User::whereHas(
            'roles', function($q){
            $q->where('name', 'Caller');
        }
        )->where('deleted_at',null)->get();
        foreach ($manager as $item => $val) {
            $manager[$item]['statuss'] = Status::where('id','=',$val->status)->get();
        }
        return $manager;
    }

    public function addUpdateEditor(Request $request){
        if($request->id != null){
            $data = User::where('id',$request->id)->
            update(array('name'=>$request->name,
                'email' => $request->get('email'),
                'contact' => $request->get('contact')));
            if($data){
                return 1;
            }
            return 0;
        }
        $data = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'contact' => $request->get('contact'),
            'status' => 1,
            'password' => Hash::make($request->get('password')),
        ]);
        $data->assignRole('Editor');
        if($data){
            return 1;
        }
        return 0;
    }

    public function addUpdateCaller(Request $request){
        if($request->id != null){
            $data = User::where('id',$request->id)->
            update(array('name'=>$request->name,
                'email' => $request->get('email'),
                'contact' => $request->get('contact')));
            if($data){
                return 1;
            }
            return 0;
        }
        $data = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'contact' => $request->get('contact'),
            'status' => 1,
            'password' => Hash::make($request->get('password')),
        ]);
        $data->assignRole('Caller');
        if($data){
            return 1;
        }
        return 0;
    }

    public function fLogin(Request $request){
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return back();
        }
        return back();
    }

    public function deleteUsers(Request $request){
        $data = User::where('id',$request->id)->update(array('deleted_at'=>Carbon::now()));
        if($data){
            return 1;
        }
        return 0;
    }
}
