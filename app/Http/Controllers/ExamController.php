<?php

namespace App\Http\Controllers;

use App\FrontCategories;
use App\SEO;
use Illuminate\Http\Request;
use App\Exam;
use Illuminate\Support\Facades\File;

class ExamController extends Controller
{
    //

    public function index(Request $request,$catg = ""){
        if($catg != ""){
            $seo = SEO::where('permalink',$catg)->get();
            if(!$seo->isEmpty()) {
                if ($seo[0]->exams->isEmpty()) {
                    return abort(404);
                }else {
                    $data = $seo[0]->exams;
                    return view('front.exam.details', compact('data'));
                }
            }else{
                $ct = FrontCategories::where('name', $catg)->get('id');
                if ($request == null || $request == []) {
                    $data = Exam::where('exam_category', $ct[0]->id)->get();
                    return view('front.exam.index', compact('data'));
                } else {
                    $type = $request->type == "National" ? 1 : 0;
                    $mode = $request->mode == "Online" ? 1 : 0;
                    $app = $request->application == "Online" ? 1 : null;
                    $data = Exam::where('exam_category', $ct[0]->id)->when($type, function ($q) use ($type) {
                        return $q->where('exam_type', $type);
                    })->when($mode, function ($q) use ($mode) {
                        return $q->where('exam_mode', $mode);
                    })->get();
                    return view('front.exam.index', compact('data'));
                }
            }
        }else {
            if ($request == null || $request == []) {
                $data = Exam::all();
                return view('front.exam.index', compact('data'));
            } else {
                $type = $request->type == "National" ? 1 : 0;
                $mode = $request->mode == "Online" ? 1 : 0;
                $app = $request->application == "Online" ? 1 : null;
                $data = Exam::when($type, function ($q) use ($type) {
                    return $q->where('exam_type', $type);
                })->when($mode, function ($q) use ($mode) {
                    return $q->where('exam_mode', $mode);
                })->get();
                return view('front.exam.index', compact('data'));
            }
        }
    }

    public function addExam(Request $request)
    {
//        return $request;
        $check = Exam::where('id', $request->examId)->first();
//        return $check;
        if ($check == null) {
//            $data = new Exam();
            $data = Exam::updateOrCreate(
                ['id' => $request->examId],
                ['exam_name' => $request->name,
                    'exam_category' => $request->catg,
                    'exam_course' => $request->course,
                    'exam_description' => $request->description,
                    'exam_type' => $request->type,
                    'exam_mode' => $request->online == true ? 1 : 0,
                    'exam_from_to' => json_encode(array('from' => $request->examFrom, 'to' => $request->examTo)),
                    'exam_application_from_to' => $request->app]
            );
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
            $data = Exam::where('id', $request->examId)->update(array('exam_name' => $request->name,
                'exam_category' => $request->catg,
                'exam_course' => $request->course,
                'exam_description' => $request->description,
                'exam_type' => $request->type,
                'exam_mode' => $request->online == true ? 1 : 0,
                'exam_from_to' => json_encode(array('from' => $request->examFrom, 'to' => $request->examTo)),
                'exam_application_from_to' => $request->app));
            if ($data) {
                $check = Exam::where('id',$request->examId)->get();
//                return $check[0]->seo;
                $check[0]->seo[0]->title = $request->name;
                $check[0]->seo[0]->save();
                return response()->json(['success' => 1, 'data' => (int)$request->examId], 200);
            }
            return response()->json(['success' => 0], 200);
        }
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('photo')) {
            $check = Exam::where('id', $request->id)->first();
            if ($check != null) {
                $name = 'exam_' . $request->id . '.' . $request->photo->getClientOriginalExtension();
                $request->photo->move(public_path('exams/'), $name);
                $data = Exam::where('id', $request->id)->update(array('exam_image' => $name));
                if ($data) {
                    return $request->id;
                } else {
                    return 2;
                }
            }else{
                $data = new Exam();
                $data->save();
                if($data){
                    $name = 'exam_' . $data->id . '.' . $request->photo->getClientOriginalExtension();
                    $request->photo->move(public_path('exams/'), $name);
                    Exam::where('id',$data->id)->update(array('exam_image'=>$name));
                    return $data->id;
                }
            }
        }
        return 0;
    }

    public function deleteImage(Request $request){
//        return $request;
        $data = Exam::where('id',$request->id)->get('exam_image');
        $image_path = public_path("/exams/".$data[0]->exam_image);  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        return 1;
    }

    public function allExam(Request $request){
        $data = Exam::all();
        return $data;
    }
}
