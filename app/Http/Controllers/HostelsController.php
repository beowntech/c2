<?php

namespace App\Http\Controllers;

use App\CityModel;
use App\Hostels;
use App\SEO;
use App\StateModel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HostelsController extends Controller
{

    public function index(){
        $data = Hostels::limit(4)
        ->where('featured',1)
        ->with('seo')
        ->with('cities')
        ->with('states')
        ->get();
        return view('v2.front.hostel.index',compact('data'));
    }

    public function nearby($slug=""){
        if(isset($slug)) {
            $seo = SEO::where('permalink',$slug)->get();
            if($seo->isEmpty()){
                return abort(404);
            }
            $prop = $seo[0]->property[0];
            $data = Hostels::where('city',$seo[0]->property[0]->location->cities->id)
            ->with('cities')
            ->paginate(3);
            return view('v2.front.hostel.nearby', compact('data','prop'));
        }
        return abort(404);
    }

    public function create(Request $request){
//        return $request->all();
        $json = $request->all();
        unset($json['images']);
        $data = Hostels::create($json);
        if($data){
            $seo = new SEO();
                $seo->title = $request->input('name');
                $seo->description = null;
                $seo->permalink = strtolower(trim(preg_replace('/[\s-]+/', "-", preg_replace('/[^A-Za-z0-9-]+/', "-", preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $request->input('name')))))), "-"));
                $seo->save();
            $data->seo()->attach($seo->id);
            $files = [];
            $path = env('UPLOAD_PATH') == "" ? public_path('hostel/' . $data->id . '/images'):env('UPLOAD_PATH') . '/hostel/' . $data->id . '/images';
            foreach ($request->file('images') as $image) {
                $req = new Request([
                    'featured' => $image,
                    'id' => $data->id,
                    'savePath' => $path
                ]);
                $files[] = $this->uploadImages($req);
            }
            Hostels::where('id',$data->id)->update(array('images'=>json_encode($files)));
            return response()->json(['status'=>1]);
        }
        return response()->json(['status'=>0]);
    }

    public function uploadImages(Request $request): string
    {
        $sizeArray = [0.2, 0.5, 0.7, 1];
        $i = [];
        $time = time();
        $img = $request->featured;
        $fileMain = 'hostel-' . $request->id . '-' . $time;
        foreach ($sizeArray as $val) {
            $i[] = $val;
            $valName = "";
            if ($val == 0.2) {
                $valName = "sm";
            } elseif ($val == 0.5) {
                $valName = "md";
            } elseif ($val == 0.7) {
                $valName = "lg";
            } elseif ($val == 1) {
                $valName = "xl";
            }
            $filename = 'hostel-' . $request->id . '-' . $time . '-' . $valName;
            $extension = 'png';
            $size = getimagesize($img);
            $newWidth = $val * $size[0];
            $newHeight = $val * $size[1];
            $savePath = $request->savePath;
            if (!file_exists($savePath)) {
                mkdir($savePath, 0755, true);
            }
            if ($val == 1) {
                Image::make($img)->save($savePath . '/' . $filename . '.' . $extension);
                Image::make($img)->encode('webp', 100)->save($savePath . '/' . $filename . '.webp');
            } else {
                Image::make($img)
                    ->encode('webp', 20)
                    ->resize($newWidth, $newHeight)
                    ->save($savePath . '/' . $filename . '.webp');
            }
        }
        return $fileMain;
    }

    public function detail($city,$slug){
        $seo = SEO::where('permalink',$slug)->firstorFail();
        $hostel = $seo->hostels[0];
        $ci = CityModel::where('name',$city)->firstorFail();
        if($hostel->cities->id == $ci->id){
        return view('v2.front.hostel.detail',compact('hostel'));
        }
        return abort(404);
    }

}
