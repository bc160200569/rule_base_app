<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubNavigation;

use Illuminate\Support\Facades\View;

class SubNavigationCont extends Controller
{
    //
    function __construct()
    {
         $this->middleware('permission:subnav-list', ['only' => ['index','show']]);
         $this->middleware('permission:subnav-create', ['only' => ['create','store']]);
         $this->middleware('permission:subnav-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:subnav-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        // echo $request->id;
        // exit;
        $nav_id = $request->id;
        $data = SubNavigation::where('nav_id', $nav_id)->get();
        // foreach($data as $obj){
        //     dd($obj->name);
        // }
        // dd($data['name']);
        // echo '<pre>', $data;
        // exit;
        if (View::exists('navigation/index_sub_navigation')) {
            return View('navigation/index_sub_navigation', ['sub_navigation' => $data, 'nav_id' => $nav_id]);
        } else {
            echo "This view file are not exit";
        }
    }

    public function create(Request $request)
    {
        $nav_id = $request->id;

        //
        // echo $id;
        // exit;
        return view('navigation.create_sub_navigation', ['nav_id' => $nav_id]);
    }
    public function store(Request $request)
    {
        $nav_id = $request->id;
        // echo $nav_id;
        // exit;
        //
        request()->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Navigation Title is Required.',
            ]
        );

        // dd($request->all());
        // Navigation::create($request->all());
        $data = new SubNavigation();
        $data->name = $request->get('name');
        $data->nav_id = $request->id;
        $data->is_show = $request->get('is_show');
        $data->route = $request->get('route');
        $data->status = $request->get('status');
        // dd($data);
        $data->save();

        return redirect()->route('navigation.index')
            ->with('success', 'Sub Navigation created successfully.');
    }
    public function edit(Request $request)
    {
        $subnav_id = $request->id;
        // echo $subnav_id;
        $data = SubNavigation::where('id', $subnav_id)->get();
        // dd($data);
        if (View::exists('navigation/edit_sub_navigation')) {
            return View('navigation/edit_sub_navigation', ['sub_navigation' => $data]);
        } else {
            echo "This view file are not exit";
        }
    }
    public function update(Request $request)
    {
        // dd($request->all());
        // $id = $request->get('id');
        // echo $request->id;
        request()->validate([
            'name' => 'required',
            ],
            [
                'name.required' => 'Navigation Title is Required.',
            ]
        );
    
        $data = SubNavigation::find($request->id);
        $data->name = $request->get('name');
        $data->is_show = $request->get('is_show');
        $data->route = $request->get('route');
        $data->status = $request->get('status');
        $data->save();
        // dd($data);
    
        return redirect()->route('sub_navigation',$data->nav_id)->with('success','Sub Navigation updated successfully');

    }
}
