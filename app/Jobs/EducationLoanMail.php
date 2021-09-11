<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EducationLoanMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $mobile;
    protected $time;
    protected $loan;
    protected $status;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name,$email,$mobile,$time,$loan,$status)
    {
        $this->name = $name;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->loan = $loan;
        $this->time = $time;
        $this->status = $status;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = array(
            'email' => $this->email,
            'subject' => 'Enquiry from Loan Form',
            'name' => $this->name,
            'mailbody' => '
                Full Name: '.$this->name. '
                Email: ' . $this->email . '
                Phone Number: ' . $this->mobile . '
                Time of Study: ' . $this->time . '
                Loan Amount: ' . $this->loan . '
                AdmissionStatus: ' . $this->status
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
    }
}
