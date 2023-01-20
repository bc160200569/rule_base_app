<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use App\Models\TemplateFormFields;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list_data = TemplateFormFields::where('form_id', 1)->where('show_in_listing', 1)->orderBy('position_id', 'asc')->get();
        $officer_data = Officer::get();
        // dd($officer_data);
        if (View::exists('officer/index')) {
            return view('officer/index', compact('list_data','officer_data'));
        } else {
            echo "This viwe file are not exist";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $form_data = TemplateFormFields::where('form_id', 1)->where('is_active', 1)->orderBy('position_id', 'asc')->get();
        // dd($form_data);
        if (View::exists('officer/create')) {
            return view('officer/create', compact('form_data'));
        } else {
            echo "This viwe file are not exist";
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
        // dd($request->all());
        // echo "store";
        // exit;
        // $input_data = $request->all();
        // foreach($input_data as $data)
        // request()->validate([

        // ]);
        // foreach($request->all() as $req)
        // {
        //     echo $req;
        //     echo '<br>';
        // }
        // dd($request->all());

        // Officer::create($request->all());
        $list_data = TemplateFormFields::where('form_id', 1)->where('is_active', 1)->orderBy('show_in_listing', 'asc')->get('name');
        // dd($list_data);
        // foreach($list_data as $list);
        // dd($list->name);
        $table = new Officer();
        foreach($list_data as $value){
            // dd($value->name);
            $list = $value->name;
            $table->$list = $request->get($list);
        }
        // dd($table);
        $table->save();
        return redirect()->route('officer.index')
            ->with('success', 'Officer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function show(Officer $officer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function edit(Officer $officer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Officer $officer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Officer $officer)
    {
        //
    }
    public function show_icp_chart(Request $request)
    {
        $officer_id = $request->id;
        //
        $check_list = TemplateFormFields::where('form_id', 1)->where('show_in_icp_chart', 1)->orderBy('show_in_listing', 'asc')->get();
        $officer_data = Officer::where('id',$officer_id)->get();
        if (View::exists('officer/icp_chart')) {
            return view('officer/icp_chart', compact('officer_data','check_list'));
        } else {
            echo "This viwe file are not exist";
        }
    }
}
