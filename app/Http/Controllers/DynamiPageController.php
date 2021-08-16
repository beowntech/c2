<?php

namespace App\Http\Controllers;

use App\SEO;
use Illuminate\Http\Request;
use App\DynamicPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DynamiPageController extends Controller
{
    //

    public function addPage(Request $request)
    {
//        return $request;
        $check = DynamicPage::where('id', $request->pageId)->first();
        if ($check == null) {
            $data = new DynamicPage();
            $data->name = $request->name;
            $data->content = $request->description;
//            $data = DynamicPage::updateOrCreate(
//                ['id' => $request->pageId],
//                [
//                    'name' => $request->name,
//                    'content' => $request->description,
//                ]
//            );
            $data->save();
            if ($data) {
                $seo = new SEO();
                $seo->title = $request->input('name');
                $seo->permalink = strtolower(trim(preg_replace('/[\s-]+/', "-", preg_replace('/[^A-Za-z0-9-]+/', "-", preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $request->input('name')))))), "-"));
                $seo->save();
                $data->seo()->attach($seo->id);
                return response()->json(['success' => 1, 'data' => $data->id], 200);
            }
            return response()->json(['success' => 0], 200);
        } else {
            $data = DynamicPage::where('id', $request->pageId)->update(
                array('name' => $request->name,
                'content' => $request->description,
                ));
            if ($data) {
                $check = DynamicPage::where('id', $request->pageId)->get();
//                return $check[0]->seo;
                if($check[0]->seo->isNotEmpty()) {
                    $check[0]->seo[0]->title = $request->name;
                    $check[0]->seo[0]->save();
                }else{
                    $seo = new SEO();
                    $seo->title = $request->input('name');
                    $seo->permalink = strtolower(trim(preg_replace('/[\s-]+/', "-", preg_replace('/[^A-Za-z0-9-]+/', "-", preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $request->input('name')))))), "-"));
                    $seo->save();
                    $check->seo()->attach($seo->id);
                }
                return response()->json(['success' => 1, 'data' => (int)$request->pageId], 200);
            }
            return response()->json(['success' => 0], 200);
        }
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('logo')) {
            $check = DynamicPage::where('id', $request->id)->first();
            if ($check != null) {
                $name = $request->id . '.' . $request->logo->getClientOriginalExtension();
                $request->logo->move(public_path('dynamic/'.$request->id.'/logo'), $name);
                $data = DynamicPage::where('id', $request->id)->update(array('logo' => $name));
                if ($data) {
                    return $request->id;
                } else {
                    return 2;
                }
            } else {
                $data = new DynamicPage();
                $data->save();
                if ($data) {
                    $name = $data->id . '.' . $request->logo->getClientOriginalExtension();
                    $request->logo->move(public_path('dynamic/'.$data->id.'/logo'), $name);
                    DynamicPage::where('id', $data->id)->update(array('logo' => $name));
                    return $data->id;
                }
            }
        }elseif($request->hasFile('featured')){
            $check = DynamicPage::where('id', $request->id)->first();
            if ($check != null) {
                $name = $request->id . '.' . $request->featured->getClientOriginalExtension();
                $request->featured->move(public_path('dynamic/'.$request->id.'/featured'), $name);
                $data = DynamicPage::where('id', $request->id)->update(array('featured' => $name));
                if ($data) {
                    return $request->id;
                } else {
                    return 2;
                }
            } else {
                $data = new DynamicPage();
                $data->save();
                if ($data) {
                    $name = $data->id . '.' . $request->featured->getClientOriginalExtension();
                    $request->featured->move(public_path('dynamic/'.$data->id.'/featured'), $name);
                    DynamicPage::where('id', $data->id)->update(array('featured' => $name));
                    return $data->id;
                }
            }
        }
        return 0;
    }

    public function deleteImage(Request $request){
//        return $request;
        if($request->type == "logo") {
            $data = DynamicPage::where('id', $request->id)->get('logo');
            $image_path = public_path("/dynamic/".$data[0]->id."/logo/".$data[0]->logo);  // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            return 1;
        }elseif($request->type == "featured") {
            $data = DynamicPage::where('id', $request->id)->get('featured');
            $image_path = public_path("/dynamic/" . $data[0]->id . "/featured/" . $data[0]->featured);  // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            return 1;
        }
        return 0;
    }

    public function all(){
        $data = DynamicPage::all();
        foreach ($data as  $d => $val){
            $count = DB::table('button_stats')->where('url','/pp/'.$val->seo[0]->permalink)->get();
            $data[$d]['calls'] = $count->isEmpty() ? 0 : $count[0]->calls;
            $data[$d]['whatsapp'] = $count->isEmpty() ? 0 : $count[0]->whatsapp;
            $data[$d]['created'] = date('d M Y',strtotime($val->created_at));
            $data[$d]['time'] = date('g:i a',strtotime($val->created_at));
        }
        return $data;
    }

    public function getPage(Request $request){
        $data = DynamicPage::where('id',$request->id)->get();
        return $data;
    }

}
