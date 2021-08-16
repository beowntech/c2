<?php

namespace App\Http\Controllers;

use App\PagesModel;
use App\SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    //
    public function update(Request $request)
    {
        if ($request->type === "privacy") {
            $data = PagesModel::where('page_name', '=', 'privacy')->update(array('content' => $request->privacy));
        } elseif ($request->type === "disclaimer") {
            $data = PagesModel::where('page_name', '=', 'disclaimer')->update(array('content' => $request->disc));
        } elseif ($request->type === "about") {
            $data = PagesModel::where('page_name', '=', 'about')->update(array('content' => $request->about));
        } elseif ($request->type === "policy") {
            $data = PagesModel::where('page_name', '=', 'return-policy')->update(array('content' => $request->return));
        } elseif ($request->type === "terms") {
            $data = PagesModel::where('page_name', '=', 'terms')->update(array('content' => $request->terms));
        } elseif ($request->type === "cancelpol") {
            $data = PagesModel::where('page_name', '=', 'cancel-policy')->update(array('content' => $request->cancelpol));
        }
    }

    public function get(Request $request)
    {
        $data = PagesModel::where('page_name', '=', $request->type)->get();
        return $data;
    }

    public function updateSeo(Request $request)
    {
        $data = PagesModel::find($request->page_id);
        if ($data->seo->isNotEmpty()) {
            $seo = SEO::where('id', $data->seo[0]->id)
                ->update(array(
                    'permalink' => $request->slug,
                    'title' => $request->title,
                    'canonical' => $request->canonical,
                    'description' => $request->description,
                    'primary_focus_keyword' => $request->focus,
                    'json_schema'=> $request->schema
                ));
            if ($seo) {
                return 1;
            }
            return 0;
        }
        $seo = new SEO();
        $seo->title = $request->input('title');
        $seo->description = $request->input('description');
        $seo->permalink = strtolower(trim(preg_replace('/[\s-]+/', "-", preg_replace('/[^A-Za-z0-9-]+/', "-", preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $request->input('title')))))), "-"));
        $seo->primary_focus_keyword = $request->focus;
        $seo->canonical = $request->canonical;
        $seo->save();
        $data->seo()->attach($seo->id);
        if ($seo) {
            return 1;
        }
        return 0;
    }

    public function getSeo(Request $request){
        if($request->type != null){
            $data = PagesModel::where('page_name',$request->type)->get();
            return response()->json(['seo'=>$data[0]->seo,'id'=> $data[0]->id]);
        }
        $data = PagesModel::find($request->page_id);
        return $data->seo;
    }
}
