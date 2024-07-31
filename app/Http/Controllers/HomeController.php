<?php

namespace App\Http\Controllers;

use App\Models\RenewalFee;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'code_id'=>'required',
            'from_year'=>'required',
            'to_year'=>'required',
            'amount'=>'required',
            'formula'=>'required',
        ]);
        try{
            $new_fee=RenewalFee::create($request->except('_token'));
            RenewalFee::where('code_id',$request->id)->whereNull('parent_id')->update(['parent_id'=>$new_fee->id]);
            $message='Success.';
        } catch (\Exception $e) {
            $message=json_decode($e->getMessage());
        }
        return redirect()->back()->with('message', $message);
    }
}
