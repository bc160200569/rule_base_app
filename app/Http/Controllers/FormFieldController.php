<?php

namespace App\Http\Controllers;

use App\Models\FormField;
use App\Models\FormFieldtypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FormFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // if (View::exists('setup_form/setup_form')) {
        //     return View('setup_form/setup_form');
        // } else {
        //     echo "This view file are not exit";
        // }
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\Response
     */
    public function show(FormField $formField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\Response
     */
    public function edit(FormField $formField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormField $formField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormField $formField)
    {
        //
    }
    public function get_form_field_type(Request $request)
    {
        // dd($request->all());
        $data['field_type'] = FormFieldtypes::where("form_field_id", $request->field_type)->get(["field_type", "id"]);
        // dd($data);
        return response()->json($data);
    }
    // public function get_sub_navigation(Request $request)
    // {
    //     $data['sub_nav'] = SubNavigation::where("nav_id", $request->navigation_id)
    //     ->get(["name", "id"]);

    //     return response()->json($data);
    // }
}
