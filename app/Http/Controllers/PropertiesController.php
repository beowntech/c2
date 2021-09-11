<?php

namespace App\Http\Controllers;

use App\Amenities;
use App\Categories;
use App\CityModel;
use App\Course;
use App\Enquiry;
use App\FrontCategories;
use App\Hostel;
use App\ImagesModel;
use App\Banks;
use App\Locations;
use App\Properties;
use App\Review;
use App\Rooms;
use App\RoomsModel;
use App\Scholarship;
use App\SEO;
use App\PagesModel;
use App\Social;
use App\StateModel;
use App\Status;
use App\Tales;
use App\Teacher;
use App\User;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Enquiries;
use App\Exam;
use App\Cyber;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PropertiesController extends Controller
{
    public function step1(Request $request)
    {
//        return $request->all();
        $check = Properties::where('name', $request->input('name'))->where('deleted_at', null)->count();
        if ($check == 0) {
            $prop = new Properties();
            $prop->name = $request->input('name');
            $prop->short_name = $request->input('sname');
            $prop->host = 32;
//        $prop->property_type = 45;
            $prop->short_description = $request->input('sdescription');
            $prop->hotel_contact = $request->input('hotel');
            $prop->email = $request->input('email');
            $prop->affiliated_by = $request->input('aff');
            $prop->approved_by = $request->input('app');
            $prop->established_on = $request->input('est');
            $prop->program_type = $request->input('program');
            $prop->college_type = $request->input('college');
            $prop->status = 5;
            $prop->created_by = $request->user_id;
            $prop->save();
            if ($prop) {
                $seo = new SEO();
                $seo->title = $request->input('name');
                $seo->description = $request->input('sdescription');
                $seo->permalink = strtolower(trim(preg_replace('/[\s-]+/', "-", preg_replace('/[^A-Za-z0-9-]+/', "-", preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $request->input('name')))))), "-"));
                Str::macro('readDuration', function (...$text) {
                    $totalWords = str_word_count(implode(" ", $text));
                    $minutesToRead = round($totalWords / 200);

                    return (int)max(1, $minutesToRead);
                });
                $seo->estimated_reading_time_minutes = Str::readDuration($request->input('sdescription'));
                $seo->save();
                $prop->seo()->attach($seo->id);
//                $featuredname = 'logo_' . time() . '.' . $request->logo->getClientOriginalExtension();
//                if (!file_exists(env('UPLOAD_PATH').'property/' . $prop->id . '/logo')) {
//                    mkdir(env('UPLOAD_PATH').'property/' . $prop->id . '/logo', 666, true);
//                }
                $path = env('UPLOAD_PATH') == "" ? public_path('/property/' . $prop->id . '/logo'):env('UPLOAD_PATH') . '/property/' . $prop->id . '/logo';
                $requestUpload = new Request([
                    'logo' => $request->logo,
                    'id' => $prop->id,
                    'savePath' => $path
                ]);
                $this->uploadLogo($requestUpload);
//                $request->logo->move(env('UPLOAD_PATH').'property/' . $prop->id . '/logo', $featuredname);
//                Properties::where('id', $prop->id)->update(array('logo' => $featuredname));
                return response()->json(['success' => 1, 'prop' => $prop->id]);
            }
            return response()->json(['success' => 'Error']);
        }
        return response()->json(['success' => 'Already Exist']);
    }

    public function step2(Request $request)
    {

        $prop = Properties::where('id', $request->prop_id)
            ->update(array('description' => $request->description));
        if ($prop) {
//            $featuredname = 'featured_' . time() . '.' . $request->featured->getClientOriginalExtension();
            $path = env('UPLOAD_PATH') == "" ? public_path('/property/' . $request->prop_id . '/gallery/featured'):env('UPLOAD_PATH') . '/property/' . $request->prop_id . '/gallery/featured';
            $req = new Request([
                'featured' => $request->featured,
                'id' => $request->prop_id,
                'savePath' => $path
            ]);
            $this->uploadFeatured($req);
//            $request->featured->move(env('UPLOAD_PATH') . 'property/' . $request->prop_id . '/gallery/featured', $featuredname);

//            $img = ImagesModel::updateOrCreate(
//                ['property_id' => $request->prop_id],
//                ['status' => 1, 'featured' => $featuredname]
//            );
            return response()->json(['success' => 1]);
        }
        //        $prop = Properties::where('id',$request->prop_id)
//            ->update(array('address'=>$request->address,'village'=>$request->village,
//                'district'=>$request->district,'state'=>$request->state,
//                'city'=>$request->city,'pincode'=>$request->pin,'road_name'=>$request->road));
    }

    public function step3(Request $request)
    {

        $prop = Properties::where('id', $request->prop_id)->update(array('property_type' => json_encode($request->catg)));

        return response()->json(['status' => 1]);
    }

    public function step4(Request $request)
    {

        $location = Locations::updateOrCreate(
            ['prop_id' => $request->prop_id],
            ['street_name' => $request->address,
                'local_area' => $request->local,
                'nationality' => $request->national,
                'city' => $request->city,
                'state' => $request->state,
                'pincode' => $request->pin]
        );

        if ($location) {
            return response()->json(['success' => 1]);
        }
        return response()->json(['success' => 0]);
    }

    public function step5(Request $request)
    {
        $image = [];
        $featuredname = 'featured_' . time() . '.' . $request->featured->getClientOriginalExtension();
        $request->featured->move(env('UPLOAD_PATH') . 'property/images', $featuredname);

        $img = ImagesModel::updateOrCreate(
            ['property_id' => $request->prop_id],
            ['status' => 1, 'featured' => $featuredname]
        );
        return response()->json(['status' => 1]);
    }

    public function gallery(Request $request)
    {
        $image = [];
        $file = $request->file('files');
        foreach ($file as $k) {
            $filen = time() . '.' . $k->getClientOriginalExtension();
            $k->move(env('UPLOAD_PATH') . 'property/images', $filen);
            $image[] = $filen;
        }
        $img = ImagesModel::updateOrCreate(
            ['property_id' => $request->prop_id],
            ['images' => json_encode($image), 'status' => 1]
        );
        return response()->json(['status' => 1]);
    }

    public function submit(Request $request)
    {
        $data = Properties::where('id', $request->prop_id)->update(array('status' => 3));
        if ($data) {
            $room = Rooms::where('property_id', $request->prop_id)->update(array('status' => 3));
            return response()->json(['status' => 1]);
        }
    }

    public function get()
    {
        $data = Properties::all();
        foreach ($data as $k => $val) {
            $data[$k]['user'] = User::where('id', $val->host)->get();
            $data[$k]['type'] = Categories::where('id', $val->property_type)->get();
            $data[$k]['rooms'] = Rooms::where('property_id', $val->id)->get();
            $data[$k]['stat'] = Status::where('id', $val->status)->get();
        }
        return $data;
    }

    public function updateStatus(Request $request)
    {
        $data = Properties::where('id', $request->id)->update(array('status' => $request->status));
        if ($data) {
//            $room = Rooms::where('property_id',$request->id)->update(array('status'=>$request->status));
//            if($room){
            return response()->json(['status' => 1]);
//            }
        }
    }

    public function getProp(Request $request)
    {
        $data = Properties::where('id', $request->prop_id)->with('images')->get();
        foreach ($data as $i => $val) {
            $data[$i]['prop'] = FrontCategories::where('id', $val->property_type)->get();
        }
        return $data;
    }

    //Update Property Basic
    public function updateBasic(Request $request)
    {

        if ($request->hasFile('logo')) {
//            $featuredname = 'logo_' . time() . '.' . $request->logo->getClientOriginalExtension();
            $path = env('UPLOAD_PATH') == "" ? public_path('/property/' . $request->prop_id . '/logo'):env('UPLOAD_PATH') . '/property/' . $request->prop_id . '/logo';
            $requestUpload = new Request([
                'logo' => $request->logo,
                'id' => $request->prop_id,
                'savePath' => $path
            ]);
            $this->uploadLogo($requestUpload);
//            $request->logo->move(env('UPLOAD_PATH') . 'property/' . $request->prop_id . '/logo', $featuredname);
            $prop = Properties::where('id', $request->prop_id)
                ->update(array('name' => $request->name,
                    'hotel_contact' => $request->hotel,
                    'email' => $request->email,
//                    'logo' => $featuredname,
                    'short_name' => $request->sname,
                    'short_description' => $request->sdescription,
                    'affiliated_by' => $request->aff,
                    'approved_by' => $request->app,
                    'established_on' => (int)$request->est,
                    'college_type' => $request->college));

            if ($prop) {
                if ($request->hasFile('featured')) {
//                    $featuredname = 'featured_' . time() . '.' . $request->featured->getClientOriginalExtension();
//                    $request->featured->move(env('UPLOAD_PATH') . 'property/' . $request->prop_id . '/gallery/featured', $featuredname);
                    $path = env('UPLOAD_PATH') == "" ? public_path('/property/' . $request->prop_id . '/gallery/featured'):env('UPLOAD_PATH') . '/property/' . $request->prop_id . '/gallery/featured';
                    $req = new Request([
                        'featured' => $request->featured,
                        'id' => $request->prop_id,
                        'savePath' => $path
                    ]);
                    $this->uploadFeatured($req);
//                    ImagesModel::where('property_id', $request->prop_id)->update(array('featured' => $featuredname));
                    return response()->json(['status' => 1]);
                }
                return response()->json(['status' => 1]);
            }
            return response()->json(['status' => 0]);
        }

        $prop = Properties::where('id', $request->prop_id)
            ->update(array('name' => $request->name,
                'hotel_contact' => $request->hotel,
                'email' => $request->email,
                'short_name' => $request->sname,
                'short_description' => $request->sdescription,
                'affiliated_by' => $request->aff,
                'approved_by' => $request->app,
                'established_on' => (int)$request->est,
                'college_type' => $request->college));
        if ($prop) {
            if ($request->hasFile('featured')) {
                $featuredname = 'featured_' . time() . '.' . $request->featured->getClientOriginalExtension();
                $request->featured->move(env('UPLOAD_PATH') . 'property/' . $request->prop_id . '/gallery/featured', $featuredname);
                $image = ImagesModel::where('property_id', $request->prop_id)->update(array('featured' => $featuredname));
                return response()->json(['status' => 1]);
            }
            return response()->json(['status' => 1]);
        }
        return response()->json(['status' => 0]);
    }

    public function updateDescription(Request $request){
        $data = Properties::where('id', $request->prop_id)
            ->update(array('description' => $request->description));
        if($data){
            return response()->json(['status'=>1]);
        }
        return response()->json(['status'=>0]);
    }

    public function updateLocation(Request $request)
    {
        //'program_type'=>$request->program,
//       return $request;
        $check = Locations::where('prop_id', $request->prop_id)->get();
        if (!$check->isEmpty()) {
            $prop = Locations::where('prop_id', $request->prop_id)
                ->update(array('street_name' => $request->street_name,
                    'local_area' => $request->local_area,
                    'pincode' => $request->pincode,
                    'state' => $request->state,
                    'city' => $request->city,
                    'nationality' => $request->nationality));
            if ($prop) {
                return response()->json(['status' => 1]);
            }
            return response()->json(['status' => 0]);
        } else {
            $data = new Locations();
            $data->prop_id = $request->prop_id;
            $data->street_name = $request->street_name;
            $data->local_area = $request->local_area;
            $data->pincode = $request->pincode;
            $data->state = $request->state;
            $data->city = $request->city;
            $data->nationality = $request->nationality;
            $data->save();
            if ($data) {
                return response()->json(['status' => 1]);
            }
            return response()->json(['status' => 0]);
        }
    }

    public function getUserIns(Request $request)
    {
        $user = Auth::loginUsingId($request->user);
        if ($user->hasRole('Editor')) {
            $data = Properties::where('deleted_at', null)->get();
            Auth::logout();
            return $data;
        }
        $data = Properties::where('host', $request->user)->where('deleted_at', null)->get();
        Auth::logout();
        return $data;
    }

    public function searchData(Request $request)
    {
        if ($request->city == "0" && $request->catg == "0") {
            $data = Properties::all();
            foreach ($data as $datas => $value) {
                $data[$datas]['cities'] = CityModel::where('id', $value->city)->get();
                $data[$datas]['states'] = StateModel::where('id', $value->state)->get();
                $data[$datas]['images'] = ImagesModel::where('property_id', $value->id)->get();
                $data[$datas]['review'] = Review::where('property_id', $value->id)->avg('stars') ?: 0.0;
                $data[$datas]['reviews'] = Review::where('property_id', $value->id)->count();
                $data[$datas]['seo'] = SEO::where('property_id', $value->id)->get();
            }
            return $data;
        } else if ($request->city == "0") {
            $data = Properties::where('property_type', $request->catg)->get();
            foreach ($data as $datas => $value) {
                $data[$datas]['cities'] = CityModel::where('id', $value->city)->get();
                $data[$datas]['states'] = StateModel::where('id', $value->state)->get();
                $data[$datas]['images'] = ImagesModel::where('property_id', $value->id)->get();
                $data[$datas]['review'] = Review::where('property_id', $value->id)->avg('stars') ?: 0.0;
                $data[$datas]['reviews'] = Review::where('property_id', $value->id)->count();
                $data[$datas]['seo'] = SEO::where('property_id', $value->id)->get();
            }
            return $data;
        } elseif ($request->catg == "0") {
            $data = Properties::where('city', $request->city)->get();
            foreach ($data as $datas => $value) {
                $data[$datas]['cities'] = CityModel::where('id', $value->city)->get();
                $data[$datas]['states'] = StateModel::where('id', $value->state)->get();
                $data[$datas]['images'] = ImagesModel::where('property_id', $value->id)->get();
                $data[$datas]['review'] = Review::where('property_id', $value->id)->avg('stars') ?: 0.0;
                $data[$datas]['reviews'] = Review::where('property_id', $value->id)->count();
                $data[$datas]['seo'] = SEO::where('property_id', $value->id)->get();
            }
            return $data;
        } else {
            $data = Properties::where('city', $request->city)->where('property_type', $request->catg)->get();
            foreach ($data as $datas => $value) {
                $data[$datas]['cities'] = CityModel::where('id', $value->city)->get();
                $data[$datas]['states'] = StateModel::where('id', $value->state)->get();
                $data[$datas]['images'] = ImagesModel::where('property_id', $value->id)->get();
                $data[$datas]['review'] = Review::where('property_id', $value->id)->avg('stars') ?: 0.0;
                $data[$datas]['reviews'] = Review::where('property_id', $value->id)->count();
                $data[$datas]['seo'] = SEO::where('property_id', $value->id)->get();
            }
            return $data;
        }
    }

    public function getaUser(Request $request)
    {
        $user = Auth::loginUsingId($request->user);
        if ($user->hasRole('Editor')) {
            $data = Properties::where('deleted_at', null)->get();
            foreach ($data as $k => $val) {
                $data[$k]['user'] = User::where('id', $val->host)->get();
                $data[$k]['type'] = $val->property_type != null ? FrontCategories::whereIn('id', json_decode($val->property_type))->get() : [];
//           $data[$k]['rooms'] = Rooms::where('property_id',$val->id)->get();
                $data[$k]['stat'] = Status::where('id', $val->status)->get();
            }
            Auth::logout();
            return $data;
        } elseif ($user->hasRole('SAdmin')) {
            $data = Properties::where('deleted_at', null)->get();
            foreach ($data as $k => $val) {
                $data[$k]['user'] = User::where('id', $val->host)->get();
                $data[$k]['type'] = $val->property_type != null ? FrontCategories::whereIn('id', json_decode($val->property_type))->get() : [];
//           $data[$k]['rooms'] = Rooms::where('property_id',$val->id)->get();
                $data[$k]['stat'] = Status::where('id', $val->status)->get();
            }
            return $data;
        }
        $data = Properties::where('host', $request->user)->where('deleted_at', null)->get();
        foreach ($data as $k => $val) {
            $data[$k]['user'] = User::where('id', $val->host)->get();
            $data[$k]['type'] = Categories::where('id', $val->property_type)->get();
//           $data[$k]['rooms'] = Rooms::where('property_id',$val->id)->get();
            $data[$k]['stat'] = Status::where('id', $val->status)->get();
        }
        return $data;
    }

    public function getSEO(Request $request)
    {
        $data = Properties::find($request->prop_id);
        return $data->seo;
    }

    public function updateSEO(Request $request)
    {
        Str::macro('readDuration', function (...$text) {
            $totalWords = str_word_count(implode(" ", $text));
            $minutesToRead = round($totalWords / 200);

            return (int)max(1, $minutesToRead);
        });

        $seo = SEO::where('id', $request->seo_id)
            ->update(array('permalink' => $request->slug, 'title' => $request->title,
                'canonical' => $request->canonical,
                'description' => $request->description,
                'primary_focus_keyword' => $request->focus,
                'json_schema' => $request->schema,
                'estimated_reading_time_minutes' => Str::readDuration($request->input('sdescription'))));
        return $seo;
    }

    public function details(Request $request)
    {
        $data = Properties::where('id', $request->id)->with('seo')->with('location')->get()->toArray();
        $data[0]['category'] = Categories::where('id', $data[0]['property_type'])->get('name');
        foreach ($data[0]['location'] as $p => $val) {
            $data[0]['cities'] = CityModel::where('id', $val['city'])->get('name');
            $data[0]['states'] = StateModel::where('id', $val['state'])->get('name');
        }
        $data[0]['image'] = ImagesModel::where('property_id', $data[0]['id'])->get();
        $data[0]['course'] = Course::where('prop_id', $data[0]['id'])->count();
        $data[0]['reviews'] = Review::where('property_id', $data[0]['id'])->avg('stars');

        return $data;
    }

    public function getImages(Request $request)
    {
        $data = ImagesModel::where('property_id', $request->prop_id)->get('images');
        if ($data->isEmpty()) {
            return response()->json(['success' => 0]);
        }
        return response()->json(['success' => 1, 'images' => $data]);
    }

    public function getPlacements(Request $request)
    {
        $data = ImagesModel::where('property_id', $request->prop_id)->get('placements');
        if ($data->isEmpty()) {
            return response()->json(['success' => 0]);
        }
        return response()->json(['success' => 1, 'placement' => $data]);
    }

    public function uploadImages(Request $request)
    {
        $image = [];
        $file = $request->file('photos');
        foreach ($file as $g => $k) {
//            $filen = 'image_' . $g . "_" . time() . '.' . $k->getClientOriginalExtension();
//            $image[] = $filen;
            $path = env('UPLOAD_PATH') == "" ? public_path('/property/' . $request->id . '/gallery/images'):env('UPLOAD_PATH') . '/property/' . $request->id . '/gallery/images';
            $this->uploadGallery(new Request([
                'gallery' => $k,
                'savePath' => $path,
                'id' => $request->id
            ]));
//            $k->move(env('UPLOAD_PATH') . 'property/' . $request->id . '/gallery/images', $filen);
        }
//        $data = ImagesModel::where('property_id', $request->id)->get();
//
//        if ($data[0]->images != null) {
//            $array = array_merge(json_decode($data[0]->images), $image);
//            ImagesModel::where('property_id', $request->id)->update(array('images' => $array));
//        } else {
//            ImagesModel::where('property_id', $request->id)->update(array('images' => $image));
//        }
    }

    public function deleteImage(Request $request)
    {
        $data = ImagesModel::where('property_id', $request->id)->get();
        $i = 0;
        $dat = json_decode($data[0]->images, true);
        foreach ($dat as $element) {
            //check the property of every element
            if ($request->image == $element) {
                $extensionArray = ["-xl.png", "-xl.jpg", "-xl.jpeg", "-xl.webp", "-lg.webp", "-md.webp", "-sm.webp", "-sm-350x200.webp", "-md-350x200.webp", "-lg-350x200.webp", "-xl.gif"];
                $image_path = "property/" . $data[0]->property_id . "/gallery/images/" . $element;  // Value is not URL but directory file path
//                if (File::exists(env('UPLOAD_PATH') . $image_path . '-xl.webp')) {
                foreach ($extensionArray as $e => $val) {
                    $path = env('UPLOAD_PATH') == "" ? public_path($image_path . $val) : env('UPLOAD_PATH') . $image_path . $val;
                    File::delete($path);
                }
//                }
                \array_splice($dat, $i, 1);
            }
            $i++;
        }
        if ($dat == [] || $dat == null) {
            $check = ImagesModel::where('property_id', $request->id)->update(array('images' => null));
            if ($check) {
                return 1;
            }
            return 0;
        } else {
            $check = ImagesModel::where('property_id', $request->id)->update(array('images' => $dat));
            if ($check) {
                return 1;
            }
            return 0;
        }
    }

    public function deletePlacement(Request $request)
    {
        $data = ImagesModel::where('property_id', $request->id)->get();
        $i = 0;
        $dat = json_decode($data[0]->placements);
        foreach ($dat as $element) {
            //check the property of every element
            if ($request->image == $element) {
                $extensionArray = ["-xl.png", "-xl.jpg", "-xl.jpeg", "-xl.webp", "-lg.webp", "-md.webp", "-sm.webp", "-sm-350x200.webp", "-md-350x200.webp", "-lg-350x200.webp", "-xl.gif"];
                $image_path = "/property/" . $data[0]->property_id . "/placement/images/" . $element;  // Value is not URL but directory file path
//                if (File::exists(env('UPLOAD_PATH') . $image_path . '-xl.webp')) {
                foreach ($extensionArray as $e => $val) {
                    $path = env('UPLOAD_PATH') == "" ? public_path($image_path . $val) : env('UPLOAD_PATH') . $image_path . $val;
                    File::delete($path);
                }
//                }
                \array_splice($dat, $i, 1);
            }
            $i++;
        }
        if ($dat == [] || $dat == null) {
            $check = ImagesModel::where('property_id', $request->id)->update(array('placements' => null));
            if ($check) {
                return 1;
            }
            return 0;
        } else {
            $check = ImagesModel::where('property_id', $request->id)->update(array('placements' => $dat));
            if ($check) {
                return 1;
            }
            return 0;
        }
    }

    public function uploadPlacement(Request $request)
    {
        $image = [];
        $file = $request->file('photos');
        foreach ($file as $g => $k) {
            $filen = 'placement_' . $g . "_" . time() . '.' . $k->getClientOriginalExtension();
            $image[] = $filen;
            $path = env('UPLOAD_PATH') == "" ? public_path('/property/' . $request->id . '/placement/images'):env('UPLOAD_PATH').'/property/' . $request->id . '/placement/images';
            return $this->uploadPlacementO(new Request([
                'gallery' => $k,
                'savePath' => $path,
                'id' => $request->id
            ]));
//            $k->move(env('UPLOAD_PATH') . 'property/' . $request->id . '/placement/images', $filen);
        }
//        $data = ImagesModel::where('property_id', $request->id)->get();
//        if ($data[0]->placements == null) {
//            ImagesModel::where('property_id', $request->id)->update(array('placements' => $image));
//        } else {
//            $array = array_merge(json_decode($data[0]->placements), $image);
//            ImagesModel::where('property_id', $request->id)->update(array('placements' => $array));
//        }
    }

    public function searchFilter(Request $request)
    {
//        return $request;
        $course = [];
        $city = [];
        $ids = [];
        $state = [];
        $ptype = [];
        $courseD = [];

        if (sizeof(json_decode($request->data))) {
            foreach (json_decode($request->data) as $d => $val) {
                if (explode('_', $val->id)[0] == "city")
                    $city[] = $val->value;
                if (explode('_', $val->id)[0] == "courses")
                    $course[] = $val->value;
                if (explode('_', $val->id)[0] == "state")
                    $state[] = $val->value;
                if (explode('_', $val->id)[0] == "ptype")
                    $ptype[] = $val->value;
                if (explode('_', $val->id)[0] == "coursed")
                    $courseD[] = $val->value;
            }

            $sta = StateModel::whereIn('id', $state)->get();

            $cit = CityModel::whereIn('id', $city)->get();

            $cours = Course::whereIn('id', $course)->get();
            foreach ($cours as $c => $cal) {
                $ids[] = $cal->prop_id;
            }
            $coursP = Course::whereIn('program_type', $ptype)->get();
            foreach ($coursP as $c => $cal) {
                $ids[] = $cal->prop_id;
            }
            $coursed = Course::whereIn('year', $courseD)->get();
            foreach ($coursed as $c => $cal) {
                $ids[] = $cal->prop_id;
            }
            foreach ($cit as $ci => $v) {
                $loc = Locations::where('city', $v->id)->get();
                foreach ($loc as $l => $lal) {
                    $ids[] = $lal->prop_id;
                }
            }
            foreach ($sta as $si => $vs) {
                $loc = Locations::where('state', $vs->id)->get();
                foreach ($loc as $l => $lal) {
                    $ids[] = $lal->prop_id;
                }
            }

            $prop = Properties::where('deleted_at', null)->whereIn('id', $ids)->where('status', 1)->with('seo')->with('images')->with('location')->with('courses')->get();
            return $prop;
        } else {
            $prop = Properties::where('deleted_at', null)->with('seo')->where('status', 1)->with('images')->with('location')->with('courses')->get();
            return $prop;
        }
    }

    public function addCourse(Request $request)
    {
        $data = new Course();
        $data->prop_id = $request->prop_id;
        $data->category = $request->catg;
        $data->stream = $request->stream;
        $data->sub_stream = $request->substream;
        $data->type = $request->type;
        $data->price = $request->price;
        $data->program_type = $request->progType;
        $data->year = $request->years;
        $data->eligibility = $request->eligibility;
        if ($request->hasFile('file')) {
            $fileName = "brochure_" . time() . $request->prop_id . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(env('UPLOAD_PATH') . 'property/' . $request->prop_id . '/brochure', $fileName);
            $data->brochure = $fileName;
        }
        $data->brochure = null;
        $data->save();
        if ($data) {
            return 1;
        }
        return 0;
    }

    public function updateCourse(Request $request)
    {
//        return $request;
        $data = Course::where('id', $request->course_id)
            ->update(array(
                'category' => $request->catg,
                'stream' => $request->stream,
                'sub_stream' => $request->substream,
                'type' => $request->type,
                'price' => (int)$request->price,
                'program_type' => $request->progType,
                'year' => $request->years,
                'eligibility' => $request->eligibility,
            ));
        if ($data) {
            return 1;
        }
        return 0;
    }

    public function getAllCourse(Request $request)
    {
        $data = Course::where('prop_id', $request->prop_id)->with('catg')->with('streams')->with('substream')->get();
        return $data;
    }

    public function addScholarShip(Request $request)
    {
        $data = new Scholarship();
        $data->prop_id = $request->prop;
        $data->content = $request->text;
        $data->status = 1;
        $data->save();
        if ($data) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getScholarShip(Request $request)
    {
        $data = Scholarship::where('prop_id', $request->prop)->with('statuse')->get();
        return $data;
    }

    public function deleteProp(Request $request)
    {
        $data = Properties::where('id', $request->prop)->update(array('deleted_at' => Carbon::now()));
        return 1;
    }

    public function dashboardData()
    {
        $date = \Carbon\Carbon::today()->subDays(7);
        $stat = [];
        $data = [];
        $stat[0]['count'] = Properties::where('created_at', '>=', $date)->count();
        $stat[0]['teacher'] = Teacher::where('created_at', '>=', $date)->count();
        $stat[0]['gallery'] = ImagesModel::where('created_at', '>=', $date)->count();
        $stat[0]['course'] = Course::where('created_at', '>=', $date)->count();
        $stat[0]['hostel'] = Hostel::where('created_at', '>=', $date)->count();

        $data = array(
            Properties::whereDate('created_at', Carbon::today()->subDays(7))->count(),
            Properties::whereDate('created_at', Carbon::today()->subDays(6))->count(),
            Properties::whereDate('created_at', Carbon::today()->subDays(5))->count(),
            Properties::whereDate('created_at', Carbon::today()->subDays(4))->count(),
            Properties::whereDate('created_at', Carbon::today()->subDays(3))->count(),
            Properties::whereDate('created_at', Carbon::today()->subDays(2))->count(),
            Properties::whereDate('created_at', Carbon::today()->subDays(1))->count(),
        );

        $stat[0]['series'][] = array('name' => 'College Added', 'data' => $data);

        return $stat;
    }

    public function getData()
    {
        $data['count'] = Properties::where('deleted_at', null)->count();
//        $date = Carbon::now()->subDays(7);
        $prop = array(
            Properties::whereDate('created_at', Carbon::today()->subDays(7))->count(),
            Properties::whereDate('created_at', Carbon::today()->subDays(6))->count(),
            Properties::whereDate('created_at', Carbon::today()->subDays(5))->count(),
            Properties::whereDate('created_at', Carbon::today()->subDays(4))->count(),
            Properties::whereDate('created_at', Carbon::today()->subDays(3))->count(),
            Properties::whereDate('created_at', Carbon::today()->subDays(2))->count(),
            Properties::whereDate('created_at', Carbon::today()->subDays(1))->count(),
        );

        $course = array(
            Course::whereDate('created_at', Carbon::today()->subDays(7))->count(),
            Course::whereDate('created_at', Carbon::today()->subDays(6))->count(),
            Course::whereDate('created_at', Carbon::today()->subDays(5))->count(),
            Course::whereDate('created_at', Carbon::today()->subDays(4))->count(),
            Course::whereDate('created_at', Carbon::today()->subDays(3))->count(),
            Course::whereDate('created_at', Carbon::today()->subDays(2))->count(),
            Course::whereDate('created_at', Carbon::today()->subDays(1))->count(),
        );
        $props = Properties::get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('W');
            });
        $propertyViewData = [];
        $i = 0;
        foreach ($props as $d => $va) {
            foreach ($va as $v => $val) {
                $propertyViewData[$i] = $val->views;
            }
            $i++;
        }

        $topCollege = Properties::orderBy('views', 'desc')->get();

        $data['topCollege'] = array(array('name' => $topCollege[0]->name, 'data' => $topCollege[0]->views));
        $data['propSeries'] = array(array('name' => 'Property Added', 'data' => $prop));
        $data['courseSeries'] = array(array('name' => 'Course Added', 'data' => $course));
        $data['viewSeries'] = array(array('name' => 'Views', 'data' => $propertyViewData));

        $data['views'] = (int)Properties::where('deleted_at', null)->sum('views');
        $data['blogV'] = (int)Tales::where('deleted_at', null)->sum('views');
        $data['enquiry'] = Enquiries::where('deleted_at', null)->count();
        $data['blog'] = Tales::where('deleted_at', null)->count();
        $data['courses'] = Course::count();
        $com = Properties::where('deleted_at', null)->where('status', 1)->count();
        $pro = Properties::where('deleted_at', null)->where('status', 5)->count();
        $data['property'] = array(
            'completed' => $com,
            'process' => $pro,
            'series' => [floor(100 - (($pro / $com) * 100))]
        );
        $data['cyber'] = Cyber::count();
        $data['exams'] = Exam::count();

        return $data;
    }

    public function bankDetails(Request $request)
    {
        $data = Banks::where('id', $request->id)->get();
    }

    public function deleteCourse(Request $request)
    {
        $data = Course::where('id', $request->id)->delete();
        if ($data) {
            return response()->json(['status' => 1]);
        }
        return response()->json(['status' => 0]);
    }

    public function getLocation(Request $request)
    {
        $data = Locations::where('prop_id', $request->prop_id)->with('states')->with('cities')->get();
        if (!$data->isEmpty()) {
//        return $data;
            $data[0]['stat'] = array('label' => $data[0]->states[0]->name, 'id' => $data[0]->states[0]->id);
            $data[0]['cit'] = array('label' => $data[0]->cities[0]->name, 'id' => $data[0]->cities[0]->id);
            return $data;
        }
        return 0;
    }

    public function getCourse(Request $request)
    {
        $data = Course::where('id', $request->id)->with('streams')->with('catg')->get();
        return $data;
    }

    public function uploadLogo(Request $request)
    {
        $sizeArray = [0.2, 0.5, 0.7, 1];
        $i = [];
        $time = time();
        $fileMain = 'logo-' . $request->id . '-' . $time;
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
            $filename = 'logo-' . $request->id . '-' . $time . '-' . $valName;
            $extension = 'png';
            $size = getimagesize($request->logo);
            $newWidth = $val * $size[0];
            $newHeight = $val * $size[1];
            $savePath = $request->savePath;
            if (!file_exists($savePath)) {
                mkdir($savePath, 0755, true);
            }
            if ($val == 1) {
                Image::make(file_get_contents($request->logo))->save($savePath . '/' . $filename . '.' . $extension);
                Image::make(file_get_contents($request->logo))->encode('webp', 100)->save($savePath . '/' . $filename . '.webp');
            } else {
                Image::make(file_get_contents($request->logo))
                    ->encode('webp', 20)
                    ->resize($newWidth, $newHeight)
                    ->save($savePath . '/' . $filename . '.webp');
            }
        }
        Properties::where('id', $request->id)
            ->update(array('logo' => $fileMain));
//            return response()->json(['status' => 1,'image'=>$fileMain]);
    }

    public function uploadLogoPlugin(Request $request)
    {
        $sizeArray = [0.2, 0.5, 0.7, 1];
        $i = [];
        $time = time();
        $fileMain = 'logo-' . $request->id . '-' . $time;
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
            $filename = 'logo-' . $request->id . '-' . $time . '-' . $valName;
            $extension = $request->logo->getExtension();
            $size = getimagesize($request->logo);
            $newWidth = $val * $size[0];
            $newHeight = $val * $size[1];
            $savePath = $request->savePath;
            if (!file_exists($savePath)) {
                mkdir($savePath, 0755, true);
            }
            if ($val == 1) {
                Image::make(file_get_contents($request->logo))->save($savePath . '/' . $filename . '.' . $extension);
                Image::make(file_get_contents($request->logo))->encode('webp', 100)->save($savePath . '/' . $filename . '.webp');
            } else {
                Image::make(file_get_contents($request->logo))
                    ->encode('webp', 20)
                    ->resize($newWidth, $newHeight)
                    ->save($savePath . '/' . $filename . '.webp');
            }
        }
        Properties::where('id', $request->id)
            ->update(array('logo' => $fileMain));
//            return response()->json(['status' => 1,'image'=>$fileMain]);
    }

    public function uploadFeatured(Request $request)
    {
        $sizeArray = [0.2, 0.5, 0.7, 1];
        $i = [];
        $time = time();
        $img = $request->file('featured');
        $fileMain = 'featured-' . $request->id . '-' . $time;
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
            $filename = 'featured-' . $request->id . '-' . $time . '-' . $valName;
            $extension = $img->getClientOriginalExtension();
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
        $check = ImagesModel::where('property_id', $request->id)->get();
        if ($check->isNotEmpty()) {
            ImagesModel::where('property_id', $request->id)
                ->update(array('featured' => $fileMain));
        } else {
            $gallery = new ImagesModel();
            $gallery->property_id = $request->id;
            $gallery->featured = $fileMain;
            $gallery->status = 1;
            $gallery->save();
        }
    }

    public function uploadFeaturedPlugin(Request $request)
    {
        $sizeArray = [0.2, 0.5, 0.7, 1];
        $i = [];
        $time = time();
        $img = $request->featured;
        $fileMain = 'featured-' . $request->id . '-' . $time;
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
            $filename = 'featured-' . $request->id . '-' . $time . '-' . $valName;
            $extension = $img->getExtension();
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
        $check = ImagesModel::where('property_id', $request->id)->get();
        if ($check->isNotEmpty()) {
            ImagesModel::where('property_id', $request->id)
                ->update(array('featured' => $fileMain));
        } else {
            $gallery = new ImagesModel();
            $gallery->property_id = $request->id;
            $gallery->featured = $fileMain;
            $gallery->status = 1;
            $gallery->save();
        }
    }

    public function uploadGallery(Request $request)
    {
        $sizeArray = [0.2, 0.5, 0.7, 1];
        $i = [];
        $time = time();
        $img = $request->gallery;
        $fileMain = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . $request->id . '-' . $time;
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
            $filename = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . $request->id . '-' . $time . '-' . $valName;
            $extension = $img->getClientOriginalExtension();
            $size = getimagesize($img);
            $newWidth = $val * $size[0];
            $newHeight = $val * $size[1];
            $savePath = $request->savePath;
            if (!file_exists($savePath)) {
                mkdir($savePath, 666, true);
            }
            if ($val == 1) {
                Image::make($img)->save($savePath . '/' . $filename . '.' . $extension);
                Image::make($img)->encode('webp', 100)->save($savePath . '/' . $filename . '.webp');
            } else {
                Image::make($img)
                    ->encode('webp', 20)
                    ->resize($newWidth, $newHeight)
                    ->save($savePath . '/' . $filename . '.webp');
                Image::make($img)
                    ->encode('webp', 20)
                    ->fit(200, 200)
                    ->save($savePath . '/' . $filename . '-350x200' . '.webp');
            }
        }
        $check = ImagesModel::where('property_id', $request->id)->get();
        if ($check->isNotEmpty()) {
            if ($check[0]->images != null) {
                $get = ImagesModel::where('property_id', $request->id)->get();
                $array = json_decode($get[0]->images,true);
                array_push($array, $fileMain);
                ImagesModel::where('property_id', $request->id)
                    ->update(array('images' => $array));
            } else {
                ImagesModel::where('property_id', $request->id)
                    ->update(array('images' => array($fileMain)));
            }
        } else {
            $gallery = new ImagesModel();
            $gallery->property_id = $request->id;
            $gallery->images = array($fileMain);
            $gallery->status = 1;
            $gallery->save();
        }
//            return response()->json(['status' => $fileMain]);
    }

    public function uploadGalleryPlugin(Request $request)
    {
        $sizeArray = [0.2, 0.5, 0.7, 1];
        $i = [];
        $time = time();
        $img = $request->gallery;
        $fileMain = 'image' . '-' . $request->id . '-' . $time;
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
            $filename = 'image' . '-' . $request->id . '-' . $time . '-' . $valName;
            $extension = $img->getExtension();
            $size = getimagesize($img);
            $newWidth = $val * $size[0];
            $newHeight = $val * $size[1];
            $savePath = $request->savePath;
            if (!file_exists($savePath)) {
                mkdir($savePath, 666, true);
            }
            if ($val == 1) {
                Image::make($img)->save($savePath . '/' . $filename . '.' . $extension);
                Image::make($img)->encode('webp', 100)->save($savePath . '/' . $filename . '.webp');
            } else {
                Image::make($img)
                    ->encode('webp', 20)
                    ->resize($newWidth, $newHeight)
                    ->save($savePath . '/' . $filename . '.webp');
                Image::make($img)
                    ->encode('webp', 20)
                    ->fit(200, 200)
                    ->save($savePath . '/' . $filename . '-350x200' . '.webp');
            }
            $imageArray[] = $filename;
        }
        $check = ImagesModel::where('property_id', $request->id)->get();
        if ($check->isNotEmpty()) {
            if ($check[0]->images != null) {
                $get = ImagesModel::where('property_id', $request->id)->get();
                $array = json_decode($get[0]->images, true);
                array_push($array, $fileMain);
                ImagesModel::where('property_id', $request->id)
                    ->update(array('images' => $array));
            } else {
                ImagesModel::where('property_id', $request->id)
                    ->update(array('images' => array($fileMain)));
            }
        } else {
            $gallery = new ImagesModel();
            $gallery->property_id = $request->id;
            $gallery->images = array($fileMain);
            $gallery->status = 1;
            $gallery->save();
        }
//            return response()->json(['status' => $fileMain]);
    }

    public function uploadPlacementO(Request $request)
    {
        $sizeArray = [0.2, 0.5, 0.7, 1];
        $i = [];
        $time = time();
        $img = $request->gallery;
        $fileMain = 'placement' . '-' . $request->id . '-' . $time;
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
            $filename = 'placement' . '-' . $request->id . '-' . $time . '-' . $valName;
            $extension = $img->getClientOriginalExtension();
            $size = getimagesize($img);
            $newWidth = $val * $size[0];
            $newHeight = $val * $size[1];
            $savePath = $request->savePath;
            if (!file_exists($savePath)) {
                mkdir($savePath, 666, true);
            }
            if ($val == 1) {
                Image::make($img)->save($savePath . '/' . $filename . '.' . $extension);
                Image::make($img)->encode('webp', 100)->save($savePath . '/' . $filename . '.webp');
            } else {
                Image::make($img)
                    ->encode('webp', 20)
                    ->resize($newWidth, $newHeight)
                    ->save($savePath . '/' . $filename . '.webp');
                Image::make($img)
                    ->encode('webp', 20)
                    ->fit(200, 200)
                    ->save($savePath . '/' . $filename . '-350x200' . '.webp');
            }
            $imageArray[] = $filename;
        }
        $check = ImagesModel::where('property_id', $request->id)->get();
        if ($check->isNotEmpty()) {
            if ($check[0]->placements != null) {
                $get = ImagesModel::where('property_id', $request->id)->get();
                $array = json_decode($get[0]->placements, true);
                array_push($array, $fileMain);
                ImagesModel::where('property_id', $request->id)
                    ->update(array('placements' => $array));
            } else {
                ImagesModel::where('property_id', $request->id)
                    ->update(array('placements' => array($fileMain)));
            }
        } else {
            $gallery = new ImagesModel();
            $gallery->property_id = $request->id;
            $gallery->placements = array($fileMain);
            $gallery->status = 1;
            $gallery->save();
        }
        echo 'Done';
//            return response()->json(['status' => $fileMain]);
    }

    public function uploadPlacementPlugin(Request $request)
    {
        $sizeArray = [0.2, 0.5, 0.7, 1];
        $i = [];
        $time = time();
        $img = $request->gallery;
        $fileMain = 'placement' . '-' . $request->id . '-' . $time;
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
            $filename = 'placement' . '-' . $request->id . '-' . $time . '-' . $valName;
            $extension = $img->getExtension();
            $size = getimagesize($img);
            $newWidth = $val * $size[0];
            $newHeight = $val * $size[1];
            $savePath = $request->savePath;
            if (!file_exists($savePath)) {
                mkdir($savePath, 666, true);
            }
            if ($val == 1) {
                Image::make($img)->save($savePath . '/' . $filename . '.' . $extension);
                Image::make($img)->encode('webp', 100)->save($savePath . '/' . $filename . '.webp');
            } else {
                Image::make($img)
                    ->encode('webp', 20)
                    ->resize($newWidth, $newHeight)
                    ->save($savePath . '/' . $filename . '.webp');
                Image::make($img)
                    ->encode('webp', 20)
                    ->fit(200, 200)
                    ->save($savePath . '/' . $filename . '-350x200' . '.webp');
            }
            $imageArray[] = $filename;
        }
        $check = ImagesModel::where('property_id', $request->id)->get();
        if ($check->isNotEmpty()) {
            if ($check[0]->placements != null) {
                $get = ImagesModel::where('property_id', $request->id)->get();
                $array = json_decode($get[0]->placements, true);
                array_push($array, $fileMain);
                ImagesModel::where('property_id', $request->id)
                    ->update(array('placements' => $array));
            } else {
                ImagesModel::where('property_id', $request->id)
                    ->update(array('placements' => array($fileMain)));
            }
        } else {
            $gallery = new ImagesModel();
            $gallery->property_id = $request->id;
            $gallery->placements = array($fileMain);
            $gallery->status = 1;
            $gallery->save();
        }
//            return response()->json(['status' => $fileMain]);
    }

    public function convertAll()
    {
        ini_set('max_execution_time', 2280);
        $data = Properties::where('deleted_at', null)->get();
        $featured = [];
        $gallery = [];
        $logo = [];
        $placement = [];
        foreach ($data as $i => $item) {
            $featuredPath = 'property/' . $item->id . '/gallery/featured';
            $fD = Storage::disk('public_folder')->files($featuredPath);
            ImagesModel::where('property_id', $item->id)->update(array('featured' => null));
            foreach ($fD as $f) {
                File::deleteDirectory(public_path('property/' . $item->id . '/gallery/featured/temp-files'));
                $image = $this->createFileObject(public_path('property/' . $item->id . '/gallery/featured/' . str_replace($featuredPath . '/', '', $f)));
                $request = new Request([
                    'featured' => $image,
                    'id' => $item->id,
                    'savePath' => 'property2/' . $item->id . '/gallery/featured'
                ]);
                $this->uploadFeaturedPlugin($request);
//                $featured[$item->id][] = array('featured' => str_replace($featuredPath . '/', '', $f));
            }
            $galleryPath = 'property/' . $item->id . '/gallery/images';
            $fD = Storage::disk('public_folder')->files($galleryPath);
            ImagesModel::where('property_id', $item->id)->update(array('images' => null));
            foreach ($fD as $f) {
                File::deleteDirectory(public_path('property/' . $item->id . '/gallery/images/temp-files'));
                $image = $this->createFileObject(public_path('property/' . $item->id . '/gallery/images/' . str_replace($galleryPath . '/', '', $f)));
                $request = new Request([
                    'gallery' => $image,
                    'id' => $item->id,
                    'savePath' => 'property2/' . $item->id . '/gallery/images'
                ]);
                echo $this->uploadGalleryPlugin($request);
//                $gallery[$item->id][] = array('image' => str_replace($galleryPath . '/', '', $f));
            }
            $logoPath = 'property/' . $item->id . '/logo';
            $fD = Storage::disk('public_folder')->files($logoPath);
            Properties::where('id', $item->id)->update(array('logo' => null));
            foreach ($fD as $f) {
                File::deleteDirectory(public_path('property/' . $item->id . '/logo/temp-files'));
                if ($item->id != 69 && $item->id != 82) {
                    $image = $this->createFileObject(public_path('property/' . $item->id . '/logo/' . str_replace($logoPath . '/', '', $f)));
                    $request = new Request([
                        'logo' => $image,
                        'id' => $item->id,
                        'savePath' => 'property2/' . $item->id . '/logo'
                    ]);
                    $this->uploadLogoPlugin($request);
                }
//                $logo[$item->id][] = array('logo' => str_replace($logoPath . '/', '', $f));
            }
            $placementPath = 'property/' . $item->id . '/placement/images';
            $fD = Storage::disk('public_folder')->files($placementPath);
            ImagesModel::where('property_id', $item->id)->update(array('placements' => null));
            foreach ($fD as $j => $f) {
                File::deleteDirectory(public_path('property/' . $item->id . '/placement/images/temp-files'));
                $image = $this->createFileObject(public_path('property/' . $item->id . '/placement/images/' . str_replace($placementPath . '/', '', $f)));
                $request = new Request([
                    'gallery' => $image,
                    'id' => $item->id,
                    'savePath' => 'property2/' . $item->id . '/placement/images'
                ]);
                $this->uploadPlacementPlugin($request);
//                $placement[$item->id][] = array('placement' => str_replace($placementPath . '/', '', $f));
            }
        }
//        $image = $this->createFileObject(public_path('property/14/gallery/featured/' . $featured['14'][0]['featured']));
//
//        $request = new Request([
//            'featured' => $image,
//            'id' => 1002,
//            'savePath' => 'property/1002/gallery/featured'
//        ]);
//        $this->uploadFeaturedPlugin($request);
//        return compact('featured', 'gallery', 'logo', 'placement');
    }

    public function createFileObject($url)
    {

        $path_parts = pathinfo($url);

        $newPath = $path_parts['dirname'] . '/tmp-files/';
        if (!is_dir($newPath)) {
            mkdir($newPath, 0777);
        }

        $newUrl = $newPath . $path_parts['basename'];
        copy($url, $newUrl);
        $imgInfo = getimagesize($newUrl);

        $file = new UploadedFile(
            $newUrl,
            $path_parts['basename'],
            $imgInfo['mime'],
            filesize($url),
            true,
            TRUE
        );

        return $file;
    }


    public function searchCollege($search=""){
        if($search == "0"){
            $data = Properties::limit(100)->get();
            if($data->isNotEmpty()){
                return $data;
            }
        }
        $data = Properties::where('name','LIKE','%'.$search.'%')->get();
        if($data->isNotEmpty()){
            return $data;
        }
        return \response()->json(['message'=>"No Search String Provided"]);
    }
}
