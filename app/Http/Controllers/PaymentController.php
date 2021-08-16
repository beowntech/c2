<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    //

    public function payment(Request $request)
    {
       $book = new Booking();
       $book->user_id = $request->user_id;
        $book->property_id = $request->prop_id;
        $book->room_id = $request->room_id;
        $book->price = $request->price;
        $book->from_date = $request->from_date;
        $book->to_date = $request->to_date;
        $book->guests = $request->guests;
        $book->status = 6;
        $book->save();
        if($book) {
            return response()->json(['status'=>1]);
        }
    }
}
