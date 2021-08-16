<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banks;
use Symfony\Component\Console\Input\Input;

class BankController extends Controller
{
    //
    public function bankList(){
        $data = Banks::all();
        return $data;
    }

    public function bankAdd(Request $request){
//        return $request->all();
        $data = $request->all();
        if($request->hasFile('image')) {
            $featuredname = $request->name . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('banks'), $featuredname);
            $data['image'] = $featuredname;
        }
        $done = Banks::create($data);
        if($done){
            return 1;
        }
        return 0;
    }
}
