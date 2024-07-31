<?php

namespace Database\Seeders;

use App\Models\RenewalFee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RenewalFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $renewal_fees=[
            //2006-2007 to 2008-2009
            [
                "code_id"=> "1",
                "from_year"=> "2006-2007",
                "to_year"=> "2008-2009",
                "amount"=> "6000",
                "formula"=> "6000*totalYear*2",
                "parent_id" => 4,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                "code_id"=> "2",
                "from_year"=> "2006-2007",
                "to_year"=> "2008-2009",
                "amount"=> "3000",
                "formula"=> "3000*totalYear*2",
                "parent_id" => 5,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                "code_id"=> "3",
                "from_year"=> "2006-2007",
                "to_year"=> "2008-2009",
                "amount"=> "3000",
                "parent_id" => 6,
                "formula"=> "3000*totalYear*2",
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],

            //2009-2010 to 2019-2020
            [
                "code_id"=> "1",
                "from_year"=> "2009-2010",
                "to_year"=> "2019-2020",
                "amount"=> "10000",
                "formula"=> "10000*totalYear*2",
                "parent_id" => 7,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                "code_id"=> "2",
                "from_year"=> "2009-2010",
                "to_year"=> "2019-2020",
                "amount"=> "5000",
                "formula"=> "5000*totalYear*2",
                "parent_id" => 8,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                "code_id"=> "3",
                "from_year"=> "2009-2010",
                "to_year"=> "2019-2020",
                "amount"=> "5000",
                "formula"=> "5000*totalYear*2",
                "parent_id" => 9,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],



            //2019-2020 to 2024-2025
            [
                "code_id"=> "1",
                "from_year"=> "2020-2021",
                "to_year"=> "2024-2025",
                "amount"=> "4000",
                "formula"=> "4000*totalYear*2+4000",
                "parent_id" => null,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                "code_id"=> "2",
                "from_year"=> "2020-2021",
                "to_year"=> "2024-2025",
                "amount"=> "2000",
                "formula"=> "2000*totalYear*2+2000",
                "parent_id" => null,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                "code_id"=> "3",
                "from_year"=> "2020-2021",
                "to_year"=> "2024-2025",
                "amount"=> "2000",
                "formula"=> "2000*totalYear*2+2000",
                "parent_id" => null,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]
        ];

        RenewalFee::insert($renewal_fees);
    }
}
