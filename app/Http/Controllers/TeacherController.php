<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //

    public function addTeacher(Request $request){
        $data = new Teacher();
        $data->prop_id = $request->prop;
        $data->name = $request->name;
//        $image = $request->file('image');
//        $imageName = 'teacher_'.time().'.'.$image->getClientOriginalExtension();
//        $image->move(public_path('/images/teachers'), $imageName);
//        $data->image = $imageName;
        $data->qualification = $request->qual;
        $data->designation = $request->design;
        $data->department = $request->depart;
        $data->status = 1;
        $data->save();
        return 1;
    }

    public function updateTeacher(Request $request){
        $data = Teacher::where('id',$request->id)->update(
            array('name'=>$request->name,
                'qualification'=>$request->qual,
                'designation'=>$request->desig,
                'department'=>$request->depart));
        if($data) {
            return 1;
        }
            return 0;
    }

    public function remove(Request $request){
        $data = Teacher::where('id',$request->teacherId)->delete();
        if($data){
            return 1;
        }
        return 0;
    }
}
