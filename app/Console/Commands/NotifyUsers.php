<?php

namespace App\Console\Commands;

use App\Booking;
use App\Notification;
use App\Properties;
use App\Rooms;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class NotifyUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $booking = Booking::all();
        foreach ($booking as $book){
            if($book->from_date->isTomorrow()){
                $room = Rooms::where('id',$book->room_id)->get();
                $name = $room[0]->name;
                $prop = Properties::where('id',$book->property_id)->get('host');
                $firebaseToken = User::where('id',$prop[0]->host)->get('device_token');

                $data = new Notification();
                $data->title = "Room booking for Tomorrow";
                $data->content = "$name is booked for Tomorrow";
                $data->user_id = User::where('id',$prop[0]->host)->get('id')[0]->id;
                $data->booking_id = $book->id;
                $data->status = 1;
                $data->save();
                if($data) {

                    $SERVER_API_KEY = 'AAAANFQlu2M:APA91bFpbDUhMZddZp9-KSXQCHBowLKls52QJxy1YlK_Gd9T-zQDewqarAcDIEXqQLUUnHp_aPqg95LkjCmV_AE2KiAJKJPwa_9rXGn-GLDj65Nx_jK6c-OwCGUImZsny2vBWSVL2A9t';

                    $data = [
                        "registration_ids" => $firebaseToken,
                        "notification" => [
                            "title" => "Room Booking for Tomorrow",
                            "body" => "$name is booked for Tomorrow",
                        ]
                    ];
                    $dataString = json_encode($data);

                    $headers = [
                        'Authorization: key=' . $SERVER_API_KEY,
                        'Content-Type: application/json',
                    ];

                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

                    $response = curl_exec($ch);

//        dd($response);
                }
            }
        }
    }
}
