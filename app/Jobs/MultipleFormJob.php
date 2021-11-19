<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MultipleFormJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $content;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name,$email,$content)
    {
        $this->name = $name;
        $this->email = $email;
        $this->content = $content;
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
            'subject' => 'Welcome to Admission Jockey',
            'name' => $this->name,
            'mailbody' => $this->content
        );

        Mail::send('v2.mail.multi-form', ['data'=>$data], function ($message) use ($data) {
            $message->to(env('RECEIVE_EMAIL'));
            $message->subject($data['subject']);
        });
    }
}
