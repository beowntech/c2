<?php

namespace App\Http\Controllers;

use App\BestHotelForm;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = BestHotelForm::create($request->all());
        if($data){
            return back()->with('success','Form Submitted Successfully');
        }
        return back()->with('error','Error in Form Submitting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BestHotelForm  $bestHotelForm
     * @return \Illuminate\Http\Response
     */
    public function show(BestHotelForm $bestHotelForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BestHotelForm  $bestHotelForm
     * @return \Illuminate\Http\Response
     */
    public function edit(BestHotelForm $bestHotelForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BestHotelForm  $bestHotelForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BestHotelForm $bestHotelForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BestHotelForm  $bestHotelForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(BestHotelForm $bestHotelForm)
    {
        //
    }
}
