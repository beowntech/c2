<?php

namespace App\Http\Controllers;

use App\Enquiries;
use App\Enquiry;
use App\POPEnquiry;
use App\User;
use Illuminate\Http\Request;
use App\EmailTemplate;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emailTemplates = EmailTemplate::all('id', 'name', 'subject');
        return response()->json( $emailTemplates );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'    => 'required|min:1|max:64',
            'subject' => 'required|min:1|max:128',
            'content' => 'required|min:1',
        ]);
        $template = new EmailTemplate();
        $template->name = $request->input('name');
        $template->subject = $request->input('subject');
        $template->content = $request->input('content');
        $template->save();
        return response()->json( ['status' => 'success'] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json( [ 'template' => EmailTemplate::find($id) ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json( [ 'template' => EmailTemplate::find($id) ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'    => 'required|min:1|max:64',
            'subject' => 'required|min:1|max:128',
            'content' => 'required|min:1',
        ]);
        $template = EmailTemplate::find($id);
        $template->name = $request->input('name');
        $template->subject = $request->input('subject');
        $template->content = $request->input('content');
        $template->save();
        return response()->json( ['status' => 'success'] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $template = EmailTemplate::find($id);
        if($template){
            $template->delete();
        }
        return response()->json( ['status' => 'success'] );
    }

    public function prepareSend($id){
        return response()->json( [ 'template' => EmailTemplate::find($id) ] );
    }

    public function send($id, Request $request){
        $validatedData = $request->validate([
            'email'    => 'required|email',
        ]);
        $template = EmailTemplate::find($id);
        Mail::send([], [], function ($message) use ($request, $template)
        {
            $message->to($request->input('email'));
            $message->subject($template->subject);
            $message->setBody($template->content,'text/html');
        });
        return response()->json( ['status' => 'success'] );
    }

    public function mail(Request $request)
    {
        $name = 'Test Mail';

        $mail = new Enquiry();
        $mail->name = $request->name;
        $mail->email = $request->email;
        $mail->contact = $request->contact;
        $mail->service = $request->service;
        $mail->save();
        if($mail) {
            event(new \App\Events\Enquiry($mail->id));
            $data = array(
                'email' => 'technogupdate.com@gmail.com',
                'subject' => 'OK Admission',
                'name' => $request->input('name'),
                'mailbody' => 'Name: ' . $request->input('name') . '<br> Contact:' . $request->input('contact') . '<br> Service:' . $request->input('service') . '<br> Email:' . $request->input('email')
            );

            Mail::send([], [], function ($message) use ($data) {
                $message->to('navalplahha2001@gmail.com');
                $message->subject($data['subject'] . " from " . $data['name']);
                $message->setBody($data['mailbody']);
            });
            return 'Email sent Successfully';
        }
    }

    public function mailPop(Request $request)
    {
        $name = 'Test Mail';

        $mail = new Enquiries();
        $mail->user_name = $request->name;
        $mail->user_email = $request->email;
        $mail->user_contact = $request->contact;
        $mail->user_city = $request->city;
        $mail->interest_course = json_encode($request->categories);
        $mail->send_by = 'guest';
        $mail->form_name = 'property';
        $mail->status = 0;
        $mail->save();
        if($mail) {
            event(new \App\Events\Enquiry($mail->id));
            $data = array(
                'email' => $request->input('email'),
                'subject' => 'OK Admission',
                'name' => $request->input('name'),
                'mailbody' => 'Name: ' . $request->input('name') . '<br> Contact:' . $request->input('contact') . '<br> Service:' . $request->input('categories') . '<br> Email:' . $request->input('email')
            );

            Mail::send([], [], function ($message) use ($data) {
                $message->to($data['email']);
                $message->subject($data['subject'] . " from " . $data['name']);
                $message->setBody($data['mailbody']);
            });
            return back()->withErrors(['status'=>'done']);
        }
    }

    public function enquiryForm(Request $request)
    {
        $name = 'Test Mail';

        $callers = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'Caller');
        })->get('id');
        $check = Enquiries::latest()->first();
        $call = [];
        foreach ($callers as $c) {
            $call[] = $c->id;
        }
        $search = array_search($check->assigned_to, $call);
        $count = count($call) - 1;
        $main = 0;
        if($search == $count){
            $main = $call[0];
        }else{
            $main = $call[$search + 1];
        }

        $mail = new Enquiries();
        $mail->user_name = $request->name;
        $mail->user_email = $request->email;
        $mail->user_contact = $request->contact;
        $mail->user_city = $request->city;
        $mail->interest_course = json_encode($request->course);
        $mail->send_by = 'guest';
        $mail->form_name = 'front';
        $mail->status = 0;
        $mail->assigned_to = $main;
        $mail->save();
        if($mail) {
            event(new \App\Events\Enquiry($mail->id));
            $data = array(
                'email' => $request->input('email'),
                'subject' => 'OK Admission',
                'name' => $request->input('name'),
                'mailbody' => 'Name: ' . $request->input('name') . '<br> Contact:' . $request->input('contact') . '<br> Course:' . json_encode($request->input('course')) . '<br> Email:' . $request->input('email')
            );

            Mail::send([], [], function ($message) use ($data) {
                $message->to($data['email']);
                $message->subject($data['subject'] . " from " . $data['name']);
                $message->setBody($data['mailbody']);
            });
            return back()->withErrors(['status'=>'done']);
        }
    }

    public function enquiryFormDetail(Request $request)
    {
        $name = 'Test Mail';

        $callers = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'Caller');
        })->get('id');
        $check = Enquiries::latest()->first();
        $call = [];
        foreach ($callers as $c) {
            $call[] = $c->id;
        }
        $search = array_search($check->assigned_to, $call);
        $count = count($call) - 1;
        $main = 0;
        if($search == $count){
            $main = $call[0];
        }else{
            $main = $call[$search + 1];
        }

        $mail = new Enquiries();
        $mail->prop_id = $request->prop;
        $mail->user_name = $request->name;
        $mail->user_email = $request->email;
        $mail->user_contact = $request->contact;
        $mail->user_city = $request->city;
        $mail->interest_course = json_encode(array($request->course));
        $mail->send_by = 'guest';
        $mail->form_name = 'property';
        $mail->status = 0;
        $mail->assigned_to = $main;
        $mail->save();

        if($mail) {
            event(new \App\Events\Enquiry($mail->id));
            $data = array(
                'email' => $request->input('email'),
                'subject' => 'OK Admission',
                'name' => $request->input('name'),
                'mailbody' => 'Name: ' . $request->input('name') . '<br> Contact:' . $request->input('contact') . '<br> Course:' . $request->input('course'). '<br> Email:' . $request->input('email')
            );

            Mail::send([], [], function ($message) use ($data) {
                $message->to($data['email']);
                $message->subject($data['subject'] . " from " . $data['name']);
                $message->setBody($data['mailbody']);
            });
            return back()->withErrors(['status'=>'done']);
        }
    }

    public function sendContact(Request $request)
    {
        $name = 'Test Mail';

        $mail = new Enquiries();
        $mail->user_name = $request->name;
        $mail->user_email = $request->email;
        $mail->user_contact = $request->contact;
        $mail->user_city = $request->city;
        $mail->user_message = $request->message;
        $mail->send_by = 'guest';
        $mail->form_name = 'contact';
        $mail->status = 0;
        $mail->save();

        if($mail) {
            event(new \App\Events\Enquiry($mail->id));
            $data = array(
                'email' => $request->input('email'),
                'subject' => 'OK Admission',
                'name' => $request->input('name'),
                'mailbody' => 'Name: ' . $request->input('name') . '<br> Contact:' . $request->input('contact') . '<br> Course:' . $request->input('course'). '<br> Email:' . $request->input('email')
            );

            Mail::send([], [], function ($message) use ($data) {
                $message->to($data['email']);
                $message->subject($data['subject'] . " from " . $data['name']);
                $message->setBody($data['mailbody']);
            });
            return back()->withErrors(['status'=>'done']);
        }
    }

    public function sendCyber(Request $request)
    {
            $data = array(
                'email' => $request->input('email'),
                'subject' => 'Cyber Partner - OK Admission',
                'name' => $request->input('name'),
                'mailbody' => $request->password
            );

            Mail::send([], [], function ($message) use ($data) {
                $message->to($data['email']);
                $message->subject($data['subject'] . " from " . $data['name']);
                $message->setBody($data['mailbody']);
            });
            return back()->withErrors(['status'=>'done']);
    }
}
