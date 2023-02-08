<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Navigation;
use App\Models\SubNavigation;
use Illuminate\Support\Facades\View;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:navigation-list', ['only' => ['index','show']]);
    //      $this->middleware('permission:navigation-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:navigation-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:navigation-delete', ['only' => ['destroy']]);
    // }
    public function index()
    {
        //
        $navigations = Navigation::all();
        return view('navigation.index_navigation',compact('navigations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('navigation.create_navigation');
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
        request()->validate([
            'name' => 'required',
        ],
        [
            'name.required' => 'Navigation Title is Required.',
        ]
    );
    
    // dd($request->all());
        // Navigation::create($request->all());
        $user = new Navigation();
        $user->name = $request->get('name');
        $user->icon = $request->get('icon');
        $user->sub_nav = $request->get('sub_nav');
        $user->is_show = $request->get('is_show');
        $user->route = $request->get('route');
        $user->status = $request->get('status');
        $user->save();
    
        return redirect()->route('navigation.index')
                        ->with('success','Navigation created successfully.');
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
        $data = Navigation::find($id);
        // echo '<pre>', $data;
        // exit;
        if (View::exists('navigation/edit_navigation')) {
            return View('navigation/edit_navigation', ['navigation' => $data]);
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
        // echo $id;
        // exit;
        //
        request()->validate([
            'name' => 'required',
            ],
            [
                'name.required' => 'Navigation Title is Required.',
            ]
        );
    
        $data = Navigation::find($id);
        $data->name = $request->get('name');
        $data->icon = $request->get('icon');
        $data->sub_nav = $request->get('sub_nav');
        $data->is_show = $request->get('is_show');
        $data->route = $request->get('route');
        $data->status = $request->get('status');
        $data->save();
    
        return redirect()->route('navigation.index')->with('success','Navigation updated successfully');
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
    public function get_sub_navigation(Request $request)
    {
        $data['sub_nav'] = SubNavigation::where("nav_id", $request->navigation_id)
        ->get(["name", "id"]);

        return response()->json($data);
    }
}
