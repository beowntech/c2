<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Menu::where('page_type','main')->get('menu');
        if($data->isNotEmpty()) {
            return $data[0]->menu;
        }
        return response(1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function footer_index()
    {
        $data = Menu::where('page_type','main')->get('footer');
        if($data->isNotEmpty()) {
            return $data[0]->footer;
        }
        return response(1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upper_footer()
    {
        $data = Menu::where('page_type','main')->get('upper_footer');
        if($data->isNotEmpty()) {
            return $data[0]->upper_footer;
        }
        return response(1);
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $check = Menu::where('page_type','main')->get();
        if($check->isNotEmpty()) {
            $data = Menu::where('page_type','main')
                ->update(array(
                    'menu'=>$request->menu
                ));
            return response()->json(['status'=>1]);
        }else{
            $data = new Menu();
            $data->page_type = 'main';
            $data->menu = $request->menu;
            $data->save();
            if($data){
                return response()->json(['status'=>1]);
            }
            return response()->json(['status'=>0]);
        }
    }

    public function create_footer(Request $request)
    {
        $check = Menu::where('page_type','main')->get();
        if($check->isNotEmpty()) {
            $data = Menu::where('page_type','main')
                ->update(array(
                    'footer'=>$request->menu
                ));
            return response()->json(['status'=>1]);
        }else{
            $data = new Menu();
            $data->page_type = 'main';
            $data->footer = $request->menu;
            $data->save();
            if($data){
                return response()->json(['status'=>1]);
            }
            return response()->json(['status'=>0]);
        }
    }

    public function create_upper_footer(Request $request)
    {
        $check = Menu::where('page_type','main')->get();
        if($check->isNotEmpty()) {
            $data = Menu::where('page_type','main')
                ->update(array(
                    'upper_footer'=>$request->menu
                ));
            return response()->json(['status'=>1]);
        }else{
            $data = new Menu();
            $data->page_type = 'main';
            $data->upper_footer = $request->menu;
            $data->save();
            if($data){
                return response()->json(['status'=>1]);
            }
            return response()->json(['status'=>0]);
        }
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
     * @param  \App\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $Menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $Menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $Menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $Menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $Menu)
    {
        //
    }
}
