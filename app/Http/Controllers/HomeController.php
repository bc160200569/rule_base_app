<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Navigation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $data = array(
        //     'navigations'=>Navigation::all()
        // );

        // $nav = navbar();
        // foreach($nav['navigations'] as $i){
        // {
        //     echo $i->icon;
        // }
        // exit();
    //     echo $i['name'];
    // }
    //     dd($i);


        return view('home');
    }
}
