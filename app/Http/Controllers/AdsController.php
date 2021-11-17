<?php

namespace App\Http\Controllers;

use App\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ads::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->has('id')){
            Ads::where('id',$request->id)->update(array('data'=>$request->ad));
            if ($request->has('image')) {
                $filen = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(env('UPLOAD_PATH') . 'ads/images', $filen);
                Ads::where('id', $request->id)->update(array('image' => $filen));
                return response()->json(['status' => 1]);
            }
            return response()->json(['status' => 1]);
        }
        $data = new Ads();
        $data->data = $request->ad;
        $data->position = $request->position;
        $data->save();
        if ($request->has('image')) {
            $filen = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(env('UPLOAD_PATH') . 'ads/images', $filen);
            Ads::where('id', $data->id)->update(array('image' => $filen));
            return response()->json(['status' => 1]);
        }
        return response()->json(['status' => 1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ads)
    {
        //
    }
}
