<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\RenewalFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            // Split the search year into start and end parts
            [$searchStartYear, $searchEndYear] = explode('-', $request->year);
            $code=Code::select('id')->where('code',$request->code)->first();
        
            $data = RenewalFee::with('parent')
                ->where('code_id',$code->id??'')
                ->where(function($query) use ($searchStartYear, $searchEndYear) {
                    $query->whereRaw("SUBSTRING_INDEX(from_year, '-', -1) <= ?", [$searchStartYear])
                    ->whereRaw("SUBSTRING_INDEX(to_year, '-', 1) >= ?", [$searchEndYear]);
                })
                ->orWhere(function($query) use($code,$request){
                    $query->where('code_id',$code->id??'')->where('from_year',$request->year);
                })
                ->orWhere(function($query) use($code,$request){
                    $query->where('code_id',$code->id??'')->where('to_year',$request->year);
                })->first();
            $total_year=$this->totalYear($request->year,$data->to_year,$data->parent_id);
            $rules=str_replace("totalYear",$total_year,$data->formula);

            $parent = $data->parent;
            
            while (!is_null($parent)) {
                $total_year=$this->totalYear($parent->from_year,$parent->to_year,$parent->parent_id);
                $rules .="+".str_replace("totalYear",$total_year,$parent->formula);
                $parent = $parent->parent;
            }
            $fee = eval("return $rules;");
            return response()->json([
                'status'=>true,
                'message'=> 'Fee succesfully retrieved.',
                'data' => [
                    'fee'=>en2bn($fee)
                ]
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => json_decode($e->getMessage()),
                'data' => [],
            ],$e->getCode());
        }
    }


    protected function totalYear($fromYear,$toYear,$parent_id){
            // Extract the starting year from 'from_year' and the ending year from 'to_year'
            $startYear = (int) substr($fromYear, 0, 4);
            $endYear = (int) substr($toYear, 5, 4);
            // Calculate the total number of years
            $total_year = $parent_id?($endYear - $startYear):($endYear - $startYear-1);
            return $total_year;
    }

    
}
