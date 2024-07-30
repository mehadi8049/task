<?php

namespace Database\Seeders;

use App\Models\Code;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codes = [
            [
                'code' => 101,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], 
            [
                'code' => 102,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], 
            [
                'code' => 103,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        Code::insert($codes);
    }
}
