<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $start_year=2006;
        $years=[];
        for($i=$start_year; $i<=now()->format('Y'); $i++){
            $years[]= $i ."-". $i+1;
        }
        $years=array_reverse($years);
        return view('home',compact('years'));
    }
}
