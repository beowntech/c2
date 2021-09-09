<?php

namespace App\Http\Controllers;

use App\EducationLoanForm;
use Illuminate\Http\Request;

class EducationLoanFormController extends Controller
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
        $data = EducationLoanForm::create($request->all());
        if($data){
            return back()->with('success','Form Submitted Successfully');
        }
        return back()->with('error','Error in Form Submitting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EducationLoanForm  $educationLoanForm
     * @return \Illuminate\Http\Response
     */
    public function show(EducationLoanForm $educationLoanForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EducationLoanForm  $educationLoanForm
     * @return \Illuminate\Http\Response
     */
    public function edit(EducationLoanForm $educationLoanForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EducationLoanForm  $educationLoanForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationLoanForm $educationLoanForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EducationLoanForm  $educationLoanForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationLoanForm $educationLoanForm)
    {
        //
    }
}
