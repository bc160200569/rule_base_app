<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\View;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:permission-list', ['only' => ['index','show']]);
         $this->middleware('permission:permission-create', ['only' => ['create','store']]);
         $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        //
        $permissions = Permission::all();
        // return view('navigation.index_navigation',compact('permissions'));
        if (View::exists('permission/index')) {
            return View('permission/index',compact('permissions'));
        } else {
            echo "This view file are not exit";
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
        $navigations=Navigation::all();
        // dd($data);
        if (View::exists('permission/create')) {
            return View('permission/create',compact('navigations'));
        } else {
            echo "This view file are not exit";
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
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'navigation' => 'required'
        ]);
        // $data = $request->all();
        // dd($data);
    
        Permission::create(['name' => $request->input('name'),
                            'navigation_id' => $request->input('navigation'),
                            'sub_navigation_id' => $request->input('sub_navigation'),
                            'route' => $request->input('route')
                        ]);
    
        return redirect()->route('permission.index')
                        ->with('success','permission created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $navigations=Navigation::all();
        $data = Permission::find($id);
        // dd($data);
        // pr$data->
        // echo '<pre>';
        // print_r($data);
        // $get_navigation=Navigation::find($data['navigation_id']);
        // dd($navigations);
        if (View::exists('permission/edit')) {
            return View('permission/edit',compact('data','navigations'));
        } else {
            echo "This view file are not exit";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);
        // $data = $request->all();
        // dd($data);
        $data = Permission::find($id);
        $data->name = $request->get('name');
        $data->navigation_id = $request->get('navigation');
        $data->sub_navigation_id = $request->get('sub_navigation');
        $data->route = $request->get('route');
        $data->save();
        
        return redirect()->route('permission.index')
                        ->with('success','permission update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
