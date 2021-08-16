<?php

namespace App\Http\Controllers;

use App\Amenities;
use App\Booking;
use App\Categories;
use App\CategoryNameModel;
use App\CityModel;
use App\Course;
use App\ImagesModel;
use App\Properties;
use App\Review;
use App\Rooms;
use App\Scholarship;
use App\SEO;
use App\Social;
use App\StateModel;
use App\Status;
use App\Hostel;
use App\Tales;
use App\Teacher;
use App\FrontCategories;
use App\Placement;
use App\Locations;
use App\User;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Deprecated;
use App\Events\ViewsEvent;
use App\Events\BlogViews;

class CategoriesController extends Controller
{
    //
    public function parent()
    {
        $data = FrontCategories::where('parent_id', 0)->with('children')->get();
        $children = [];
        foreach ($data as $d => $vals) {
            foreach ($vals->children as $c => $val) {
                $children[] = array('name' => $val->name, 'id' => $val->id);
            }
        }
        $i = 1;
        return $children;
    }

    public function subparent()
    {
        $data = FrontCategories::where('parent_id', 0)->has('children')->with('children')->get();
        $vals = [];
        foreach ($data as $in => $da) {
            foreach ($da->children as $c => $val) {
                foreach ($val->stream as $s => $st) {
                    if ($st->deleted_at == null) {
                        $vals[] = ['name' => $st->name, 'id' => $st->id, 'parent' => $val->name];
                    }
                }
            }
        }
        return $vals;
    }

    public function subNames()
    {
        $fin = [];
        $data = Categories::where('parent_id', '<>', 0)->get('name')->toArray();
        foreach ($data as $dat) {
            $fin[] = $dat['name'];
        }
        return array_values($fin);
    }

    public function add(Request $request)
    {
        $check = FrontCategories::where('name', $request->name)->first();
        if ($check == null || $check == "") {
            $data = new FrontCategories();
            $data->name = $request->name;
            $data->parent = 44;
            $data->description = $request->desc;
            $data->save();
            if ($data) {
//                    $datas = new Categories();
//                    $datas->name = $data->id;
//                    $datas->parent_id = 0;
//                    $datas->status = 1;
//                    $datas->description = null;
//                    $datas->save();
//                    if ($datas) {
                return 1;
//                    }
            }
            return 0;
        }
        return 2;
    }

    public function subadd(Request $request)
    {
        $check = FrontCategories::where('name', '=', $request->name)->where('deleted_at', null)->first();

        if ($check == null || $check == "") {
            $data = new FrontCategories();
            $data->name = $request->name;
            $data->parent_id = $request->parent;
            $data->status = 1;
            $data->description = $request->desc;
            $data->save();
            if ($data) {
                return 1;
            }
            return 0;
        }
        return 2;
    }

    public function index(Request $request)
    {
        $am = [];
        $sec = [];
        if ($request->search != "" && $request->city != "" && $request->catg != "") {
            $catg = FrontCategories::where('name', $request->catg)->get();
            $city = CityModel::where('name', $request->city)->get();
            $data = Properties::where('name', '%' . $request->search . '%')->orderByRaw('featured = ? desc', 1)->where('property_type', 'like', '%' . $catg[0]->id . '%')->where('city', $city[0]->id)->with('location')->where('status', 1)->with('children')->get();
        } else if ($request->search != "" && $request->city != "") {
            $city = CityModel::where('name', $request->city)->get();
            $data = Properties::where('name', '%' . $request->search . '%')->orderByRaw('featured = ? desc', 1)->where('city', $city[0]->id)->where('status', 1)->with('location')->with('children')->get();
        } else if ($request->search != "" && $request->catg != "") {
            $catg = FrontCategories::where('name', $request->catg)->get();
            $data = Properties::where('name', '%' . $request->search . '%')->orderByRaw('featured = ? desc', 1)->where('property_type', 'like', '%' . $catg[0]->id . '%')->where('status', 1)->with('children')->get();
        } else if ($request->city != "") {
            $city = CityModel::where('name', $request->city)->get();
            $data = Properties::where('city', $city[0]->id)->where('status', 1)->orderByRaw('featured = ? desc', 1)->with('children')->with('location')->get();
        } else if ($request->catg != "") {
            $catg = FrontCategories::where('name', $request->catg)->get();
            if ($catg->isEmpty()) {
                return abort(404);
            }
            $data = Properties::where('property_type', 'like', '%' . $catg[0]->id . '%')->orderByRaw('featured = ? desc', 1)->where('status', 1)->with('children')->with('location')->with('location')->get();
        } else if ($request->state != "") {
            $state = StateModel::where('name', $request->state)->get();
            if ($state->isEmpty()) {
                return abort(404);
            }
            $data = Properties::whereHas('location', function ($query) use ($state){
                $query->where('state', $state[0]->id);
            })->orderByRaw('featured = ? desc', 1)->where('status', 1)->with('location')->with('children')->get();
        } else {
            $data = Properties::where('status', 1)->orderByRaw('featured = ? desc', 1)->with('children')->with('location')->simplePaginate(10);
        }
        foreach ($data as $datas => $value) {
            $seo = Properties::find($value->id);
//            $sec = [];
            foreach ($value->location as $vl => $val) {
                $data[$datas]['cities'] = CityModel::where('id', $val->city)->get();
                $data[$datas]['states'] = StateModel::where('id', $val->state)->get();

            }
            foreach (explode(',', str_replace("[", "", str_replace("]", "", $value->amenities))) as $info) {
                $am[$value->id][] = Amenities::where('id', $info)->get();
            }

            $data[$datas]['images'] = ImagesModel::where('property_id', $value->id)->get();
            $data[$datas]['reviews'] = Review::where('property_id', $value->id)->get();
            $data[$datas]['courses'] = Course::where('prop_id', $value->id)->with('streams')->get();
            $data[$datas]['seo'] = $seo->seo[0];
//            $data[$datas]['seo'] = SEO::where('property_id',$value->id)->get();
        }
//        return $data;
//        $prp = DB::table('location')
//            ->select('city','id', DB::raw('count(*) as total'))
//            ->groupBy('city','id')
//            ->get();
        $pRrp = Locations::all();

        $prp = $pRrp->groupBy('city');

        $prpC = DB::table('properties')
            ->select('property_type', DB::raw('count(*) as total'))
            ->groupBy('property_type')
            ->get();
        $ptype = DB::table('courses')
            ->select('program_type', DB::raw('count(*) as total'))
            ->groupBy('program_type')
            ->get();
        $courseD = DB::table('courses')
            ->select('year', DB::raw('count(*) as total'))
            ->groupBy('year')
            ->get();
        $city = [];
        $categories = [];
        foreach ($prp as $k => $prps) {
            $city[] = CityModel::where('id', $k)->limit(20)->get();
        }
//        dd($city);
        foreach ($prpC as $k => $prpsC) {
            $categories[] = Categories::where('id', $prpsC->property_type)->get();
        }
//        return $categories;
        $stream = FrontCategories::where('parent_id', '!=', 0)->has('children')->with('children')->limit(20)->get();
        $category = CategoryNameModel::orderBy('position', 'ASC')->with('children')->get();
        $course = Course::limit(20)->get();
        foreach ($category as $cat => $value) {
            foreach ($value->children as $child => $children) {
                $category[$cat]['childrens'] = FrontCategories::where('name', '=', $children->name)->with('children')->get();
            }
        }
        $state = StateModel::orderBy('id', 'ASC')->get();
        return view('front.search', compact('data', 'state', 'ptype', 'courseD', 'course', 'stream', 'am', 'category', 'city', 'categories'));
    }

    public function single($city = "", $id = '')
    {
        if ($city == "") {
            return abort(404);
        }

        $url = SEO::where('permalink', $id)->where('deleted_at', null)->get();
        if ($url->isEmpty()) {
            $blo = SEO::where('permalink', $city)->where('deleted_at', null)->get();
            if (!$blo->isEmpty()) {
                $s = SEO::find($blo[0]->id);
                if($s->tales->isEmpty()) {
                return abort(404);
                }
                $colleges = [];
                $data = Tales::where('id', $s->tales[0]->id)->get();
                foreach ($data as $d => $val) {
                    $data[$d]['catg'] = FrontCategories::whereIn('id', json_decode($val->type))->get();
                    $ptype = explode(',',str_replace('[','',str_replace(']','',$val->type)))[0];
                    $related = Tales::where('type','LIKE','%'.$ptype.'%')->with('seo')->limit(4)->get();
                    $colleges = Properties::where('property_type','LIKE','%'.$ptype.'%')->where('status', 1)->with('seo')->with('images')->with('location')->with('category')->limit(8)->get();
                }
//                return $colleges;
                Tales::where('id', $s->tales[0]->id)->increment('views');
                $courses = FrontCategories::where('parent_id',0)->with('children')->get();

                event(new BlogViews());
                return view('front.blog-detail', compact('data', 'related', 'colleges','courses'));
            }
            return abort(404);
        }

//        $se = SEO::where('id',$url[0]->id)->where('deleted_at',null)->get();
        $c = explode('-', $city);
        if (!array_key_exists(2, $c)) {
            return abort(404);
        }
        $checkcity = CityModel::where('name', 'like', '%' . str_replace('_', ' ', $c[2]) . '%')->firstOrFail();
        $data = Properties::where('id', $url[0]->property[0]->id)->where('deleted_at',null)->with('location')->with('children')->with('childrens')->with('seo')->with('courses')->with('teachers')->with('images')->with('category')->get();
        if ($data->isEmpty()) {
            return abort(404);
        }
        foreach ($data as $datas => $value) {
            $data[$datas]['scholar'] = Scholarship::where('prop_id', $value->id)->get();
//            $city = CityModel::where('id', $value->location[0]->city)->get();
//            if($checkcity->id != $value->location[0]->cities[0]->id){
//                return abort(404);
//            }
//            $state = StateModel::where('id', $value->location[0]->state)->get('name');
            $placement = Placement::where('property_id', $value->id)->get();
            if($value->property_type == null) {
                return abort(404);
            }
                $catg = FrontCategories::where('id', json_decode($value->property_type)[0])->get();
            $faculty = Teacher::where('prop_id', $value->id)->get();
            $hostel = Hostel::where('prop_id', $value->id)->get();
            //Related Fetch
            $json = json_decode($value->property_type);
            $related = Properties::where('property_type', 'LIKE', "%{$json[0]}%")->where('id', '!=', $value->id)->where('status', 1)->with('seo')->with('location')->with('category')->limit(5)->get();
            if (!$related->isEmpty()) {
                foreach ($related as $r => $rel) {
                    foreach ($rel->location as $rl => $rels) {
                        $related[$r]['state'] = StateModel::where('id', $rels->state)->get();
                        $related[$r]['cities'] = CityModel::where('id', $rels->city)->get();
                    }
                    $related[$r]['review'] = Review::where('property_id', $rel->id)->get();
                    $related[$r]['catg'] = Categories::where('id', $rel->property_type)->get();
                    $related[$r]['images'] = ImagesModel::where('property_id', $rel->id)->get();
                    $related[$r]['courses'] = Course::where('prop_id', $rel->id)->limit(4)->get();
                }
            }
            //Featured Fetch
            $featured = Properties::where('featured', 1)->where('id', '!=', $value->id)->where('status', 1)->with('seo')->with('category')->limit(8)->get();
            if (!$featured->isEmpty()){
                foreach ($featured as $r => $fea) {
                    foreach ($fea->location as $fl => $feas) {
                        $featured[$r]['state'] = StateModel::where('id', $feas->state)->get();
                        $featured[$r]['cities'] = CityModel::where('id', $feas->city)->get();
                    }
//                $seo = Properties::find($fea->id);
                    $featured[$r]['review'] = Review::where('property_id', $fea->id)->get();
                    $featured[$r]['catg'] = Categories::where('id', $fea->property_type)->get();
                    $featured[$r]['images'] = ImagesModel::where('property_id', $fea->id)->get();
                    $featured[$r]['courses'] = Course::where('prop_id', $fea->id)->get();
//                $featured[$r]['seo'] = $seo->seo[0];
                }
            }
            //Reviews Fetch
            $review = Review::where('property_id', $value->id)->avg('stars');
            $reviews = Review::where('property_id', $value->id)->get();
            foreach ($reviews as $k => $v) {
                $reviews[$k]['user'] = User::where('id', $v->user_id)->get();
            }
        }
        event(new ViewsEvent());
        Properties::where('id', $data[0]->id)->increment('views');
        return view('front.details', compact('data','related', 'catg',
//                'course', 'coursecount',
                'placement', 'faculty', 'hostel', 'featured', 'review',
//                'images',
//                'teachers',
                'reviews')
        );
    }

    public function search($name = '')
    {
        if ($name == '') {
            return abort(404);
        } else {
            if (str_contains($name, 'hotels-in')) {
                $name = explode("-", $name);
                $data = CityModel::where('name', '=', $name[2])->get();
                if (!$data->isEmpty()) {
                    foreach ($data as $key => $value) {
                        $prop = Properties::where('property_type', '=', $value->id)->where('status', 1)->with('children')->get();
                        foreach ($prop as $count => $vals) {
                            $prop[$count]['from_state'] = StateModel::where('id', '=', $vals->state)->get();
                            $prop[$count]['from_city'] = CityModel::where('id', '=', $vals->city)->get();
                        }
                    }
                    return view('alotfront.search2', compact('data', 'prop'));
                } else {
                    return abort(404);
                }
//                dd($data);
            } else {
                $name = str_replace("_", " ", $name);
                $data = Categories::where('name', '=', $name)->get();
                if (!$data->isEmpty()) {
                    foreach ($data as $key => $value) {
                        $prop = Properties::where('property_type', '=', $value->id)->where('status', 1)->with('children')->get();
                        foreach ($prop as $count => $vals) {
                            $prop[$count]['from_state'] = StateModel::where('id', '=', $vals->state)->get();
                            $prop[$count]['from_city'] = CityModel::where('id', '=', $vals->city)->get();
                        }
                    }
                    return view('alotfront.search2', compact('data', 'prop'));
//            dd($prop);
                } else {
                    return abort(404);
                }
            }
        }
    }

    public function update(Request $request)
    {
        $data = CategoryNameModel::where('id', '=', $request->id)->update(array('name' => $request->name));
        return 1;
    }

    public function subupdate(Request $request)
    {
        if ($request->check === "2") {
            $filename = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('alotfront/assets//front/images/site'), $filename);
            $data = Categories::where('id', '=', $request->id)->update(array('name' => $request->name, 'image' => $filename, 'description' => $request->desc, 'parent_id' => $request->parent));
        } elseif ($request->check === "0") {
            $data = Categories::where('id', '=', $request->id)->update(array('name' => $request->name, 'image' => null, 'description' => $request->desc, 'parent_id' => $request->parent));
        } elseif ($request->check === "1") {
            $data = Categories::where('id', '=', $request->id)->update(array('name' => $request->name, 'description' => $request->desc, 'parent_id' => $request->parent));
        }
        return $request;
    }

    public function loadAjax(Request $request)
    {

        $array = explode(",", $request->get('data'));
        $city = $request->get('city');
        $cityname = CityModel::where('name', '=', $city)->get();
        if ($request->get('data') === "0") {
            if (!$cityname->isEmpty()) {
                $data[] = Properties::where('city', '=', $cityname[0]->id)->where('status', 1)->with('children')->get();
            }
            $data[] = Properties::where('status', 1)->with('children')->get();
            foreach ($data as $keys => $dav) {
                foreach ($data[$keys] as $count => $vals) {
                    $data[$keys][$count]['from_state'] = StateModel::where('id', '=', $vals->state)->get();
                    $data[$keys][$count]['from_city'] = CityModel::where('id', '=', $vals->city)->get();
                    $data[$keys][$count]['catg'] = Categories::where('id', '=', $vals->property_type)->get();
                }
            }
            return response()->json($data, 200);
//            dd($data);
        } else {
            foreach ($array as $item => $value) {
                $main = Categories::where('name', '=', $value)->get();
                foreach ($main as $key => $val) {
                    if (!$cityname->isEmpty()) {
                        $data[] = Properties::where('property_type', $val->id)->where('status', 1)->where('city', '=', $cityname[0]->id)->with('children')->get();
                    }
                    $data[] = Properties::where('property_type', $val->id)->where('status', 1)->with('children')->get();
                    foreach ($data as $keys => $dav) {
                        foreach ($data[$keys] as $count => $vals) {
                            $data[$keys][$count]['from_state'] = StateModel::where('id', '=', $vals->state)->get();
                            $data[$keys][$count]['from_city'] = CityModel::where('id', '=', $vals->city)->get();
                            $data[$keys][$count]['catg'] = Categories::where('id', '=', $vals->property_type)->get();
                        }
                    }
                }
            }
            return response()->json($data, 200);
        }
        return response()->json(['status', null], 200);
//        dd($data);
    }

    public function loadAjaxName(Request $request)
    {

        $data[] = Properties::where('id', '=', $request->get('data'))->where('status', 1)->with('children')->get();
        foreach ($data[0] as $count => $val) {
            $data[0][$count]['from_state'] = StateModel::where('id', '=', $val->state)->get();
            $data[0][$count]['from_city'] = CityModel::where('id', '=', $val->city)->get();

        }
        return response()->json($data);
//        dd($data);
    }

    public function loadProperty(Request $request)
    {
        $req = Properties::where('host', '=', $request->id)->where('status', 1)->get();
        foreach ($req as $o => $val) {
            $req[$o]['statuss'] = Status::where('id', '=', $val->status)->get();
            $req[$o]['image'] = ImagesModel::where('property_id', '=', $val->id)->get();
            $req[$o]['location'] = CityModel::where('id', '=', $val->city)->get();
        }
        return $req;
    }


    public function getCCatg()
    {
        $catg = [];
        $data = FrontCategories::where('parent_id', 0)->has('children')->get();
        foreach ($data as $k => $val) {
            $datas = FrontCategories::where('parent_id', $val->id)->has('children')->get();
            foreach ($datas as $d => $vals) {
                $catg[] = array('label' => $vals->name, 'id' => $vals->id);
            }
        }
        if ($catg == [] || $catg == null) {
            return 0;
        }
        return $catg;
    }

    public function getCStream(Request $request)
    {
        $st = [];
        $stream = FrontCategories::where('parent_id', $request->id)->where('deleted_at', null)->get();
        foreach ($stream as $s => $val) {
            $st[$s]['label'] = $val->name;
            $st[$s]['id'] = $val->id;
        }
        return $st;
    }

    public function getCSStream(Request $request)
    {
        $st = [];
        $stream = FrontCategories::where('parent_id', $request->id)->get();
        foreach ($stream as $s => $val) {
            $st[$s]['label'] = $val->name;
            $st[$s]['id'] = $val->id;
        }
        return $st;
    }

    public function deleteStream(Request $request)
    {
        $data = FrontCategories::where('id', $request->id)->update(array('deleted_at' => Carbon::now()));
        return 1;
    }

}
