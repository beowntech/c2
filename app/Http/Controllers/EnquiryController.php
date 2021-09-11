<?php

namespace App\Http\Controllers;

use App\{
    Enquiry,
    Enquiries,
    Properties,
    Review,
    Status,
    Testimonial,
    User,
    Cyber,
    Excel,
    DynamicEnquiry,
    DynamicPage,
    InformationForm
};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    //
    public function list(Request $request)
    {
        $list = Enquiry::where('prop_id', $request->prop)->get();
        return $list;
    }

    public function reviewlist(Request $request)
    {
        $list = Review::where('property_id', $request->prop)->get();
        foreach ($list as $i => $val) {
            $list[$i]['prop'] = Properties::where('id', '=', $val->property_id)->get();
            $list[$i]['user'] = User::where('id', '=', $val->user_id)->get();
            $list[$i]['stat'] = Status::where('id', '=', $val->status)->get();
        }
        return $list;
    }

    public function testlist()
    {
        $test = Testimonial::all();
        foreach ($test as $i => $val) {
            $test[$i]['stat'] = Status::where('id', $val->status)->get();
            $test[$i]['user'] = User::where('id', $val->user_id)->get();
        }
        return $test;
    }

    public function callerEnquiry(Request $request)
    {
        if($request->user == null){
            $data = Enquiries::all();
            foreach ($data as $d => $val) {
                $data[$d]['formatDate'] = date('d M g:i A', strtotime($val->created_at));
                $data[$d]['assigned'] = User::where('id',$val->assigned_to)->get('name');
                if ($val->prop_id != null) {
                    $data[$d]['prop'] = Properties::where('id', $val->prop_id)->get('name');
                }
            }
            return $data;
        }
        $data = Enquiries::where('assigned_to',$request->user)->get();
        foreach ($data as $d => $val) {
            $data[$d]['formatDate'] = date('d M Y', strtotime($val->created_at));
            if ($val->prop_id != null) {
                $data[$d]['prop'] = Properties::where('id', $val->prop_id)->get('name');
            }
        }
        return $data;
    }

    public function dynamicEnquiry(Request $request){
        $data = DynamicEnquiry::all();
        foreach ($data as $d => $val){
            $main = DynamicPage::where('id',$val->d_page_id)->get();
            $data[$d]['prop'] = $main[0]->name;
        }
        return $data;
    }

    public function cyberEnquiry(Request $request)
    {
        $data = Cyber::all();
        foreach ($data as $d => $val) {
            $data[$d]['formatDate'] = date('d M Y', strtotime($val->created_at));
        }
        return $data;
    }


    public function enquiryDetail(Request $request)
    {
        $arr = [];
        $data = Enquiries::where('enq_id', $request->enq)->get('enq_status');
        foreach (json_decode($data[0]->enq_status) as $item => $val) {
            $arr[] = array(
                'date' => date('d M Y', strtotime($val->datetime)),
                'reason' => $val->reason,
            );
        }
        return $arr;
    }

    public function reasonAdd(Request $request)
    {
        $data = Enquiries::where('enq_id', $request->id)->get('enq_status');
        if ($data[0]->enq_status != null) {
            $arr = json_decode($data[0]->enq_status, true);
            $arr[] = ['datetime' => Carbon::now(), 'reason' => $request->reason,'user'=>$request->user_id];
            $json = json_encode($arr);
            $check = Enquiries::where('enq_id', $request->id)->update(array('enq_status' => $json));
            if ($check) {
                return 1;
            }
            return 0;
        } else {
            $arr[] = ['datetime' => Carbon::now(), 'reason' => $request->reason,'user'=>$request->user_id];
            $json = json_encode($arr);
            $check = Enquiries::where('enq_id', $request->id)->update(array('enq_status' => $json));
            if ($check) {
                return 1;
            }
            return 0;
        }
    }

    public function reasonAddDynamic(Request $request)
    {
        $data = DynamicEnquiry::where('id', $request->id)->get('status_progress');
        if ($data[0]->status_progress != null) {
            $arr = json_decode($data[0]->status_progress, true);
            $arr[] = ['datetime' => Carbon::now(), 'reason' => $request->reason,'user'=>$request->user_id];
            $json = json_encode($arr);
            $check = Enquiries::where('id', $request->id)->update(array('status_progress' => $json));
            if ($check) {
                return 1;
            }
            return 0;
        } else {
            $arr[] = ['datetime' => Carbon::now(), 'reason' => $request->reason,'user'=>$request->user_id];
            $json = json_encode($arr);
            $check = DynamicEnquiry::where('id', $request->id)->update(array('status_progress' => $json));
            if ($check) {
                return 1;
            }
            return 0;
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Enquiries::where('enq_id', $request->id)->update(array('status' => $request->status));
        return 1;
    }

    public function updatedynamicStatus(Request $request){
        $data = DynamicEnquiry::where('id', $request->id)->update(array('status' => $request->status));
        return 1;
    }

    public function importExcel(Request $request)
    {
//        return $request;
        if ($request->has('data')) {
            foreach (json_decode($request->data) as $val) {
                Excel::create([
                    'student_name' => $val->student_name ?? null,
                    'email' => $val->email ?? null,
                    'phone' => $val->phone ?? null,
                    'fathers_name' => $val->fathers_name ?? null,
                    'subject_1' => $val->subject_1 ?? null,
                    'subject_2' => $val->subject_2 ?? null,
                    'subject_3' => $val->subject_3 ?? null,
                    'subject_4' => $val->subject_4 ?? null,
                    'subject_5' => $val->subject_5 ?? null,
                    'subject_6' => $val->subject_6 ?? null,
                    'state' => $val->state ?? null,
                    'district' => $val->district ?? null,
                    'school' => $val->school ?? null,
                    'source' => $val->source ?? null,
                ]);
            }
            return 1;
        }
        return 0;
    }

    public function getExcel(Request $request)
    {
        $data = Excel::all();
        return $data;
    }

    public function excelDetail(Request $request)
    {
        $arr = [];
        $data = Excel::where('id', $request->enq)->get('excel_status');
        if ($data[0]->excel_status != null) {
            foreach (json_decode($data[0]->excel_status) as $item => $val) {
                $arr[] = array(
                    'date' => date('d M Y', strtotime($val->datetime)),
                    'reason' => $val->reason
                );
            }
            return $arr;
        }
        return response()->json([],200);
    }

    public function reasonAddExcel(Request $request)
    {
        $data = Excel::where('id', $request->id)->get('excel_status');
        if ($data[0]->excel_status != null) {
            $arr = json_decode($data[0]->excel_status, true);
            $arr[] = ['datetime' => Carbon::now(), 'reason' => $request->reason];
            $json = json_encode($arr);
            $check = Excel::where('id', $request->id)->update(array('excel_status' => $json));
            if ($check) {
                return 1;
            }
            return 0;
        } else {
            $arr[] = ['datetime' => Carbon::now(), 'reason' => $request->reason];
            $json = json_encode($arr);
            $check = Excel::where('id', $request->id)->update(array('excel_status' => $json));
            if ($check) {
                return 1;
            }
            return 0;
        }
    }

    public function updateExcelStatus(Request $request)
    {
        $data = Excel::where('id', $request->id)->update(array('status' => $request->status));
        return 1;
    }

    public function dynamicPageEnquiry(Request $request){
        $data = new DynamicEnquiry();
        $data->name = $request->name;
        $data->contact = $request->contact;
        $data->email = $request->email;
        $data->d_page_id = $request->page;
        $data->course = $request->course;
        $data->save();
        if($data){
            return 1;
        }
        return 0;
    }

    public function listClicks(){
        $data = DB::table('button_stats')->get();
        foreach ($data as $d => $val){
            $data[$d]->created = date('d-m-Y',strtotime($val->created_at));
            $data[$d]->time = date('g:i a',strtotime($val->created_at));
        }
        return $data;
    }

    public function enquiryDynamicDetail(Request $request){
        $arr = [];
        $data = DynamicEnquiry::where('id', $request->id)->get('status_progress');
        foreach (json_decode($data[0]->status_progress) as $item => $val) {
            $arr[] = array(
                'date' => date('d M Y', strtotime($val->datetime)),
                'reason' => $val->reason,
            );
        }
        return $arr;
    }

    public function informationForm(Request $request){
        if($request->name != null) {
            $data = new InformationForm();
            $data->name = $request->name;
            $data->email = $request->email;
//            $data->location = $request->location;
            $data->contact = $request->contact;
            $data->course = $request->course;
//            $data->program_type = $request->program;
            $data->from_page = $request->url;
            $data->save();
            if ($data) {
                $this->mail($request);
                return back()->with('informationSuccess', 'Form has been Submitted. Thank you for your Enquiry!');
            }
            return back()->with('informationError', 'Problem While Submitting');
        }
        return response()->json(['status'=>'No Details Provided']);
    }

    public function informationFormEnquiries(){
        $data = InformationForm::all();
        return $data;
    }


    public function mail(Request $request)
    {

        $data = array(
            'email' => $request->email,
            'subject' => 'Detail Page Enquiry',
            'name' => $request->name,
            'mailbody' => '
                Full Name: '.$request->name. '
                Email: ' . $request->input('email') . '
                Phone Number: ' . $request->input('contact') . '
                Course: ' . $request->input('course')
        );
        $emails = explode(',', env('RECEIVE_EMAIL'));
        Mail::send([], [], function ($message) use ($emails, $data) {
            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
            $message->to($emails);
            $message->subject($data['subject'] . " from " . $data['name']);
            $message->setBody($data['mailbody']);
        });
        Mail::send("emails.user_email",['data'=>$data], function($message) use ($data) {
            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
            $message->to($data['email'])->subject("Welcome to Admission Jockey");
        });
        return response()->json(['status' => 1]);
    }

}
