<?php

namespace App\Http\Controllers;

use App\MultipleForms;
use Illuminate\Http\Request;

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
            return response()->json(['status'=>1]);
        }
        return response()->json(['status'=>0]);
    }
}
