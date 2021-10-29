<?php

namespace App\Http\Controllers;

use App\SEO;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index($properties = ""){
            $split = explode('-vs-',$properties);
            if(count($split) > 4){
                return abort(404);
            }
            $prop = [];
            $check = [];
            $newSplit = [];
            $data = SEO::whereIn('permalink',$split)->get();
            foreach ($data as $d => $datam) {
                if(isset($split,$datam->permalink)){
                        $prop[] = $datam->property[0];
                        $newSplit[] = $split[$d];
                    }
            }
            if($split != $newSplit){
                return redirect('/'.implode('-vs-',$newSplit));
            }
            return view('v2.front.compare',compact('prop'));
//        }
//        return abort(404);
    }
}
