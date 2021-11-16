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
use Illuminate\Support\Collection;
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
        $data = Properties::query()
            ->with('location')
            ->with('images')
            ->with('seo')
            ->with('courses')
            ->with('review');
//        if($request->query() == null){
            $data = $data->where('status', 1)->orderByRaw('featured = ? desc', 1);
//        }
//        if ($request->search != "" && $request->city != "" && $request->catg != "") {
//            $catg = FrontCategories::where('name', $request->catg)->limit(1)->get();
//            $city = CityModel::where('name', $request->city)->get();
//            $data = $data->where('name', '%' . $request->search . '%')->orderByRaw('featured = ? desc', 1)->where('property_type', 'like', '%' . $catg[0]->id . '%')->where('city', $city[0]->id)->with('location')->where('status', 1);
//        }
        if ($request->has('search')) {
//            $city = CityModel::where('name', $request->city)->get();
            if($request->search == ""){
                return redirect(route('search-college'));
            }
            $data = $data->where('name','LIKE','%' . $request->search . '%')->orderByRaw('featured = ? desc', 1)->where('status', 1);
        }
        if ($request->has('catg')) {
            $catg = FrontCategories::where('name', $request->catg)->limit(1)->get();
            $data = $data->orderByRaw('featured = ? desc', 1)->where('property_type', 'like', '%' . $catg[0]->id . '%')->where('status', 1);
        }
        if ($request->has('type')) {
            $data = $data->orderByRaw('featured = ? desc', 1)->whereIn('college_type', explode(',',$request->type))->where('status', 1);
        }
        if ($request->has('city')) {
            $city = CityModel::whereIn('name', explode(',',$request->city))->pluck('id');
           $data = $data->whereHas('location', function ($query) use ($city) {
                    $query->whereIn('city', $city);
                })->where('status', 1)->orderByRaw('featured = ? desc', 1);
        }
//        else if ($request->catg != "") {
//            $catg = FrontCategories::where('name', $request->catg)->limit(1)->get();
//            if ($catg->isEmpty()) {
//                return abort(404);
//            }
//            $data = $data->where('property_type', 'like', '%' . $catg[0]->id . '%')->orderByRaw('featured = ? desc', 1)->where('status', 1);
//        }
        if ($request->has('state')) {
            $state = StateModel::whereIn('name', explode(',',$request->state))->pluck('id');
           $data = $data->whereHas('location', function ($query) use ($state) {
                    $query->whereIn('state', $state);
                })->orderByRaw('featured = ? desc', 1)->where('status', 1);
        }
        $data = $data->simplePaginate(20);

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
//        $city = [];
        $categories = [];
//        foreach ($prp as $k => $prps) {
            $city = CityModel::has('location')->withCount('location')->limit(20)->get();
//        }
//        dd($city);
        foreach ($prpC as $k => $prpsC) {
            $categories[] = Categories::where('id', $prpsC->property_type)->get();
        }
//        return $categories;
//        $stream = FrontCategories::where('parent_id', '!=', 0)->has('children')->with('children')->limit(20)->get();
        $category = CategoryNameModel::orderBy('position', 'ASC')->with('children.categories')->limit(20)->get();
//        $course = Course::limit(20)->get();

        $state = StateModel::orderBy('id', 'ASC')->has('location')->withCount('location')->get();
        if($request->ajax()){
            return $data;
        }
        return view('v2.front.search.college-search', compact('data', 'state', 'ptype', 'courseD', 'am', 'category', 'city', 'categories'));
    }

    public function single($city = "", $id = '')
    {
        if ($city == "") {
            return abort(404);
        }

        $url = SEO::where('permalink', $id)->where('deleted_at', null)->limit(1)->get('id');
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
                return view('front.blog.detail', compact('data', 'related', 'colleges','courses'));
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
            $related = Properties::where('property_type', 'LIKE', "%{$json[0]}%")->where('id', '!=', $value->id)->where('status', 1)
                ->with('seo')
                ->with('location')
                ->with('category')
                ->with('review')
                ->with('images')
                ->with('courses')
                ->with('category')
                ->limit(5)->get();
            //Featured Fetch
            $featured = Properties::where('featured', 1)->where('id', '!=', $value->id)->where('status', 1)
                ->with('seo')
                ->with('location')
                ->with('category')
                ->with('review')
                ->with('images')
                ->with('courses')
                ->with('category')->limit(8)->get();
            //Reviews Fetch
            $review = Review::where('property_id', $value->id)->avg('stars');
            $reviews = Review::where('property_id', $value->id)->get();
            foreach ($reviews as $k => $v) {
                $reviews[$k]['user'] = User::where('id', $v->user_id)->get();
            }
        }
        event(new ViewsEvent());
        Properties::where('id', $data[0]->id)->increment('views');
        return view('v2.front.detail', compact('data','related', 'catg',
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
