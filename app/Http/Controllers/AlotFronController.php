<?php

namespace App\Http\Controllers;

use App\Amenities;
use App\Booking;
use App\Categories;
use App\CategoryNameModel;
use App\CityModel;
use App\Banks;
use App\Course;
use App\FrontCategories;
use App\Hostel;
use App\ImagesModel;
use App\Locations;
use App\Option;
use App\PagesModel;
use App\Properties;
use App\Review;
use App\Rooms;
use App\SEO;
use App\StateModel;
use App\Status;
use App\Tales;
use App\Teacher;
use App\Testimonial;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\ClassString;
use Illuminate\Pagination\Paginator;
use App\Exam;
use App\Events\BlogViews;

class AlotFronController extends Controller
{
    public function index()
    {
        $category = CategoryNameModel::orderBy('position', 'ASC')->where('featured', '=', 1)->with('children')->get();

        foreach ($category as $cat => $value) {
            foreach ($value->children as $child => $children) {
                $category[$cat]['childrens'] = Categories::where('name', '=', $children->name)->with('children')->get();
            }
        }
        $prp = DB::table('location')
            ->select('city', DB::raw('count(*) as total'))
            ->groupBy('city')
            ->get();
        $prpC = DB::table('properties')
            ->select('property_type', DB::raw('count(*) as total'))
            ->groupBy('property_type')
            ->get();
        $course = DB::table('front_categories')
            ->select('name', DB::raw('count(*) as total'))
            ->groupBy('name')
            ->get();
        $city = [];
        $categories = [];
        foreach ($prp as $k => $prps) {
            $city[] = CityModel::where('id', $prps->city)->get();
        }
        foreach ($prpC as $k => $prpsC) {
            $categories[] = Categories::where('id', $prpsC->property_type)->get();
        }
        $prop = Properties::where('status', 1)
            ->orderByRaw('featured = ? desc',1)
            ->limit(12)->with('seo')->with('location')->with('images')->with('courses')->get();
        foreach ($prop as $pw => $vals) {
            foreach ($vals->location as $p => $val) {
                $prop[$pw]['cities'] = CityModel::where('id', $val->city)->get('name');
            }
        }
        $catg = Categories::where('parent_id', '!=', 0)->get();
        foreach ($catg as $c => $ca) {
            $catg[$c]['property'] = Properties::where('property_type', $ca->id)->count();
        }
        $fcatg = FrontCategories::where('parent_id', 0)->with('children')->get();
        foreach ($fcatg as $c => $ca) {
            foreach ($ca->children as $cc => $cac) {
                $fcatg[$c]['children'][$cc]['property'] = Properties::where('property_type', 'like', '%' . $cac->id . '%')->count();
                $fcatg[$c]['children'][$cc]['exams'] = Exam::where('exam_category',$cac->id)->count();
            }
        }
        $state = StateModel::where('image', '!=', null)->get();
        foreach ($state as $s => $st) {
            $state[$s]['count'] = Locations::where('state', $st->id)->count();
        }
        $seo = SEO::where('permalink','/')->get();
        return view('front.index', compact('category', 'catg','seo', 'course', 'city', 'categories', 'prop', 'fcatg', 'state'));
//        dd($category);
    }

    public function search(Request $request)
    {
        $data = Amenities::orWhere('name', 'like', '%' . $request->get('data') . '%')->get();
        if (!$data->isEmpty()) {
            return response()->json(['success' => "?catg=" . $data[0]->name, 'data' => 'aminity']);
        } else {
            $data = CityModel::orWhere('name', 'like', '%' . $request->get('data') . '%')->get();
            if (!$data->isEmpty()) {
                return response()->json(['success' => "/" . $data[0]->name, 'data' => 'city']);
            } else {
                $data = Categories::orWhere('name', 'like', '%' . $request->get('data') . '%')->get();
                if (!$data->isEmpty()) {
                    return response()->json(['success' => $data[0]->id, 'data' => 'property']);
                } else {
                    return 0;
                }
            }
        }
    }

    public function dashboard()
    {
        if (Auth::user()) {
            $review = Review::where('user_id', '=', Auth::user()->id)->get();
//        $test = Testimonial::where('user_id','=',Auth::user()->id)->get();
            $book = Booking::where('user_id', '=', Auth::user()->id)->get();
//        foreach ($test as $i =>$val) {
//            $test[$i]['stat'] = Status::where('id',$val->status)->get();
//        }
//        foreach ($book as $i =>$val) {
//            $book[$i]['stat'] = Status::where('id',$val->status)->get();
//            $book[$i]['prop'] = Properties::where('id',$val->property_id)->get();
//            $book[$i]['room'] = Rooms::where('id',$val->room_id)->get();
//        }
            return view('front.user-dashboard'
                , compact('book', 'review')
            );
        }
        return redirect('/');
    }

    public function addTestimonial(Request $request)
    {
        $test = new Testimonial();
        $test->user_id = $request->id;
        $filename = time() . '.' . $request->imageFile->getClientOriginalExtension();
        $request->imageFile->move(public_path('testimonials'), $filename);
        $test->image = $filename;
        $test->content = $request->testimonial;
        $test->save();
        if ($test) {
            return back();
        }
        return back();
    }

    public function statusList()
    {
        $status = Status::all();
        return $status;
    }

    public function updateTest(Request $request)
    {
        $test = Testimonial::where('id', $request->id)->update(array('status' => $request->status));
        return 1;
    }

    public function getAmen()
    {
        $amen = FrontCategories::where('parent_id', 0)->has("children")->with('children')->get();
        return $amen;
    }

    public function getPolicy()
    {
        $data = PagesModel::all();
        return $data;
    }

    public function getState()
    {
        $state = StateModel::all();
        return $state;
    }

    public function getSEO(Request $request)
    {
        $data = Tales::find($request->prop_id);
        return $data->seo;
    }

    public function updateSEO(Request $request){
        $seo = SEO::where('id',$request->seo_id)
            ->update(array('permalink'=>$request->slug,'title'=>$request->title,
                'author_name'=>$request->author,
                'canonical'=>$request->canonical,
                'json_schema'=>$request->schema,
                'description'=>$request->description,'primary_focus_keyword'=>$request->focus));
        return $seo;
    }

    public function getCity(Request $request)
    {
        $city = CityModel::where('state_id', $request->id)->get();
        foreach ($city as $s => $val) {
            $city[$s]['label'] = $val->name;
            $city[$s]['id'] = $val->id;
        }
        return $city;
    }

    public function profile()
    {
        return view('front.user-profile');
    }

    public function changePass()
    {
        return view('front.change-password');
    }

    public function addReview(Request $request)
    {
//        $image = [];
        $data = new Review();
        $data->property_id = $request->prop;
        $data->stars = $request->ratings;
//        $data->user_id = Auth::user()->id;
        $data->message = $request->message;
        $data->status = 5;
//        $file = $request->file('imageFiles');
//        foreach ($file as $k) {
//            $filen = time().'.' . $k->getClientOriginalExtension();
//            $k->move(public_path('reviews/images'), $filen);
//            $image[] = $filen;
//        }
//        $data->images = json_encode($image);
        $data->save();
        if ($data) {
            return back();
        }
    }

    public function tales()
    {
        $data = Categories::where('parent_id', '!=', 0)->get();
        return view('front.add-tale', compact('data'));
    }

    public function addTale(Request $request)
    {
        $data = new Tales();
        $data->title = $request->title;
        $data->type = $request->category;
        $data->content = $request->detail;
        $data->user_id = Auth::user()->id;
        $data->status = 1;
        $data->save();
        return back();
    }

    public function blog()
    {
        if (\request()->slug != "") {
            $seo = SEO::where('permalink', \request()->slug)->get();
            $s = SEO::find($seo[0]->id);
            $data = Tales::where('id', $s->tales[0]->id)->get();
            foreach ($data as $d => $val) {
                $data[$d]['catg'] = FrontCategories::whereIn('id', json_decode($val->type))->get();
                $related = Tales::where('type', $val->type)->with('seo')->limit(4)->get();
                $colleges = Properties::where('property_type', $val->type)->where('status', 1)->with('seo')->with('images')->with('location')->with('category')->limit(8)->get();
            }
            Tales::where('id', $s->tales[0]->id)->increment('views');
            return view('front.blog-detail', compact('data', 'related', 'colleges'));
        }
        $data = Tales::where('deleted_at',null)->paginate(9);
        foreach ($data as $k => $d) {
            $sep = Tales::find($d->id);
            $data[$k]['user'] = User::where('id', $d->user_id)->get();
            $data[$k]['catg'] = Categories::where('id', $d->type)->get();
            $data[$k]['seo'] = $sep->seo;
        }
        $type = [];
        $cat = DB::table('tales')
            ->select('type', DB::raw('count(*) as total'))
            ->groupBy('type')
            ->get();
        foreach ($cat as $c => $ca) {
            $type[] = Categories::where('id', $ca->type)->get();
        }
        $option = Option::where('option_name','blog_video')->get();
        $courses = FrontCategories::where('parent_id',0)->with('children')->get();
        return view('front.blog.index', compact('data', 'type','option','courses'));
    }

    public function changeCurr(Request $request)
    {
        $data = User::where('id', Auth::user()->id)->update(array('prefer_currency' => $request->value));
        return $data;
    }

    public function compare()
    {
        $data = Properties::where('status', 1)->get();
        return view('front.compare', compact('data'));
    }

    public function statesData(Request $request)
    {
        $state = StateModel::where('name', 'LIKE', '%' . $request->get('query') . '%')->get();
        return $state;
    }

    public function citiesData(Request $request)
    {
        $city = CityModel::where('name', 'LIKE', '%' . $request->get('query') . '%')->where('state_id', $request->state)->get();
        return $city;
    }

    public function collegeList(Request $request)
    {
        if ($request->data == "") {
            return 0;
        }
        $prop = Properties::where('name', 'LIKE', '%' . $request->get('data') . '%')->where('status', 1)->with('seo')->with('category')->with('location')->limit(6)->get();
        return $prop;
    }

    public function examList(Request $request)
    {
        if ($request->data == "") {
            return 0;
        }
        $prop = Exam::where('exam_name', 'LIKE', '%' . $request->get('data') . '%')->limit(6)->get();
        foreach ($prop as $i => $val) {
            $prop[$i]['catg'] = FrontCategories::where('id',$val->exam_category)->get();
        }
        return $prop;
    }

    public function courseList(Request $request)
    {
        if ($request->data == "") {
            return 0;
        }
        $prop = Course::where('prop_id', $request->data)->with('streams')->get();
        return $prop;
    }

    public function filterList(Request $request)
    {
        if ($request->popularity) {
            $data = Properties::where('status', 1)->orderBy('views', 'desc')->with('seo')->with('cities')->with('states')->with('courses')->with('images')->with('reviewCount')->limit(10)->get();
            foreach ($data as $d => $val) {
                $data[$d]['rev'] = $val->reviewCount->avg('stars');
            }
            return $data;
        } else if ($request->rating) {
            $rev = Review::all();
            return $rev;
            $data = Properties::orderBy('rating', 'desc')->with('seo')->with('cities')->with('states')->with('courses')->with('images')->with('reviewCount')->limit(10)->get();
            foreach ($data as $d => $val) {
                $data[$d]['rev'] = $val->reviewCount->avg('stars');
            }
            return $data;
        }
    }

    public function getTeachers(Request $request)
    {
        $data = Teacher::where('prop_id', $request->id)->get();
        return $data;
    }

    public function addHostel(Request $request)
    {
        if ($request->type == 0) {
            Hostel::updateOrCreate(
                ['prop_id' => $request->prop, 'male_female' => 0],
                ['html' => $request->boyC, 'price' => $request->boyF]
            );
        } else {
            Hostel::updateOrCreate(
                ['prop_id' => $request->prop, 'male_female' => 1],
                ['html' => $request->girlC, 'price' => $request->girlF]
            );
        }
        return 1;
    }

    public function getHostel(Request $request)
    {
        $data = Hostel::where('prop_id', $request->id)->get();
        return $data;
    }

    public function getCities()
    {
        $data = CityModel::limit(200)->get();
        $state = StateModel::all();
        foreach ($data as $s => $val) {
            $data[$s]['label'] = $val->name;
            $data[$s]['id'] = $val->id;
        }
        foreach ($state as $s => $val) {
            $state[$s]['label'] = $val->name;
            $state[$s]['id'] = $val->id;
        }
        return response()->json(['city' => $data, 'state' => $state]);
    }

    public function addBlog(Request $request)
    {
        $catg = [];
        $data = new Tales();
        $data->user_id = $request->user;
        foreach (explode(',',$request->catg) as $k){
            $catg[] = $k;
        }
        $data->type = json_encode($catg);
        $data->title = $request->title;
        $data->content = $request->text;
        $data->status = 5;
        $data->save();
        if ($data) {
            $permalink = strtolower(trim(preg_replace('/[\s-]+/', "-", preg_replace('/[^A-Za-z0-9-]+/', "-", preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $request->title))))), "-"));
            $seo = new SEO();
            $seo->title = $request->title;
            $seo->description = null;
            $seo->permalink = $permalink;
            $seo->save();
            $data->seo()->attach($seo->id);
            if ($request->hasFile('image')) {
                $fileName = $permalink.'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('blog/' . $data->id . '/image'), $fileName);
                Tales::where('id', $data->id)->update(array('image' => $fileName));
            }
            return 1;
        }
        return 0;
    }

    public function getBlog()
    {
        $data = Tales::where('deleted_at',null)->with('stat')->get();
        return $data;
    }

    public function updateBlog(Request $request)
    {
        if($request->hasFile('image')){
            $permalink = strtolower(trim(preg_replace('/[\s-]+/', "-", preg_replace('/[^A-Za-z0-9-]+/', "-", preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $request->title))))), "-"));
            $fileName = $permalink. '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('blog/' . $request->id . '/image'), $fileName);
            $data = Tales::where('id', $request->id)->update(
                array('title' => $request->title,
                    'content' => $request->text,
                    'image'=> $fileName,
                    'type' => "[".$request->catg."]"));
            if ($data) {
                return 1;
            }
        }else {
            $data = Tales::where('id', $request->id)->update(
                array('title' => $request->title,
                    'content' => $request->text,
                    'type' => "[" . $request->catg . "]"));
            if ($data) {
                return 1;
            }
            return 0;
        }
        return 0;
    }

    public function blogData(Request $request)
    {
        $data = Tales::where('id',$request->id)->get();
        return $data;
    }

    public function bank()
    {
        $data = Banks::all();
        return view('front.bank', compact('data'));
    }

    public function getBank(Request $request)
    {
        $data = Banks::where('id', $request->id)->get();
        return $data;
    }

    public function updateStatus(Request $request)
    {
        $data = Tales::where('id',$request->id)->update(array('status' => $request->status));
        return response()->json(['status'=>1]);
    }

    public function educationLoan(){
        $banks = Banks::all();
        return view('front.calculator',compact('banks'));
    }

    public function privacy(){
        $data = PagesModel::where('id',1)->get('content');
        return view('front.privacy-policy',compact('data'));
    }

    public function terms(){
        $data = PagesModel::where('id',2)->get('content');
        return view('front.terms',compact('data'));
    }

    public function deleteBlog(Request $request){
        $data = Tales::where('id',$request->id)->update(array('deleted_at'=>Carbon::now()));
        if($data){
            return 1;
        }
        return 0;
    }

    public function buttonClicks(Request $request){
        if($request->has('call')) {
            $url = explode('?',str_replace(env('APP_URL'),'',url()->previous()));
            $check = DB::table('button_stats')
                ->where('url',$url[0])
                ->whereDate('created_at',Carbon::today())
                ->get();
            if($check->isEmpty()) {
                $data = DB::table('button_stats')
                    ->insert([
                        'calls' => 0,
                        'url' => $url[0],
                        'created_at' => Carbon::now()
                    ]);
            }
            DB::table('button_stats') ->where('url',$url[0])->whereDate('created_at',Carbon::today())->increment('calls');
            return redirect('tel:+91'.env('PHONE'));
        }
        elseif($request->has('whatsapp')) {
            $url = explode('?',str_replace(env('APP_URL'),'',url()->previous()));
            $check = DB::table('button_stats')
                ->where('url',$url[0])
                ->whereDate('created_at',Carbon::today())
                ->get();
            if($check->isEmpty()) {
                $data = DB::table('button_stats')
                    ->insert([
                        'whatsapp' => 0,
                        'url' => $url[0],
                        'created_at' => Carbon::now()
                    ]);
            }
            DB::table('button_stats') ->where('url',$url[0])->whereDate('created_at',Carbon::today())->increment('whatsapp');
            return redirect(env('WHATSAPP'));
        }
    }

    public function searchCity($search = ""){
        if($search == "0"){
            $data = CityModel::whereIn('state_id',[39,38])->limit(200)->get();
            return $data;
        }
        $data = CityModel::where('name','LIKE','%'.$search.'%')->whereIn('state_id',[39,38])->limit(50)->get();
        return $data;
    }

}
