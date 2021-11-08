<?php

namespace App\Http\Controllers;

use App\MultipleForms;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Jobs\MultipleFormJob;

class MultipleFormController extends Controller
{
    public function create(Request $request){
//        return $request->all();
        $jsonArray = $request->all();
        unset($jsonArray['type']);
        unset($jsonArray['url']);
        unset($jsonArray['_token']);
        $json = json_encode($jsonArray);
        $data = new MultipleForms();
        $data->data = $json;
        $data->form_type = $request->type;
        $data->from_url = $request->url;
        $data->save();
        if($data){
            dispatch(new MultipleFormJob(
                $request->name,
                $request->email,
                json_encode($jsonArray),
            ));
            return response()->json(['status'=>1]);
        }
        return response()->json(['status'=>0]);
    }
}
