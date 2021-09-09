<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $request['status'] = 1;
        $data = Comment::create($request->all());
        if($data){
            return back()->with('success','Thank You for Your Comment!');
        }
        return back()->with('error','There is some problem submitting Comment');
    }
}
