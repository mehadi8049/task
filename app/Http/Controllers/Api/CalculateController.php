<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalculateController extends Controller
{
    /**
     * Display calculated fee.
     *
     * @return \Illuminate\Http\Response
     */
    public function fee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'year' => 'required'
        ]);
        try {
            if($validator->fails()){
                throw new \Exception($validator->errors(),422);
            }
            if(!$validator->fails()){
                return response()->json([
                    'status'=>true,
                    'message'=> 'Fee succesfully retrieved.',
                    'data' => [
                        'fee'=>en2bn(12000)
                    ]
                ],200);
            }else{
                throw new \Exception('Somthing is wrong', 503);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => json_decode($e->getMessage()),
                'data' => [],
            ],$e->getCode());
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
