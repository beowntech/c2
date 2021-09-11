<?php

namespace App\Http\Controllers;

use App\BestHotelForm;
use App\Jobs\HostelFormMail;
use App\Jobs\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BestHotelFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = BestHotelForm::create($request->all());
        if ($data) {
            dispatch(new HostelFormMail(
                $request->first_name,
                $request->email,
                $request->mobile_number,
                $request->admission_status
            ));
//            $this->mail($request);
            return back()->with('success', 'Form Submitted Successfully');
        }
        return back()->with('error', 'Error in Form Submitting');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\BestHotelForm $bestHotelForm
     * @return \Illuminate\Http\Response
     */
    public function show(BestHotelForm $bestHotelForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\BestHotelForm $bestHotelForm
     * @return \Illuminate\Http\Response
     */
    public function edit(BestHotelForm $bestHotelForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\BestHotelForm $bestHotelForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BestHotelForm $bestHotelForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\BestHotelForm $bestHotelForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(BestHotelForm $bestHotelForm)
    {
        //
    }


    public function mail(Request $request)
    {

        $data = array(
            'email' => $request->email,
            'subject' => 'Hostel Form Enquiry',
            'name' => $request->first_name,
            'mailbody' => '
                Full Name: '.$request->first_name.' '.$request->last_name. '
                Email: ' . $request->input('email') . '
                Phone Number: ' . $request->input('mobile_number') . '
                AdmissionStatus: ' . $request->input('admission_status')
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
