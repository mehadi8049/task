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
                "previous_year_rule"=> "amount*totalYear*2",
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                "code_id"=> "2",
                "from_year"=> "2006-2007",
                "to_year"=> "2008-2009",
                "amount"=> "3000",
                "previous_year_rule"=> "amount*totalYear*2",
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                "code_id"=> "3",
                "from_year"=> "2006-2007",
                "to_year"=> "2008-2009",
                "amount"=> "3000",
                "previous_year_rule"=> "amount*totalYear*2",
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],

            //2008-2009 to 2019-2020
            [
                "code_id"=> "1",
                "from_year"=> "2008-2009",
                "to_year"=> "2019-2020",
                "amount"=> "10000",
                "previous_year_rule"=> "amount*totalYear*2",
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                "code_id"=> "2",
                "from_year"=> "2008-2009",
                "to_year"=> "2019-2020",
                "amount"=> "5000",
                "previous_year_rule"=> "amount*totalYear*2",
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                "code_id"=> "3",
                "from_year"=> "2008-2009",
                "to_year"=> "2019-2020",
                "amount"=> "5000",
                "previous_year_rule"=> "amount*totalYear*2",
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],



            //2019-2020 to 2024-2025
            [
                "code_id"=> "1",
                "from_year"=> "2019-2020",
                "to_year"=> "2024-2025",
                "amount"=> "4000",
                "previous_year_rule"=> "amount*totalYear*2+amount",
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                "code_id"=> "2",
                "from_year"=> "2019-2020",
                "to_year"=> "2024-2025",
                "amount"=> "2000",
                "previous_year_rule"=> "amount*totalYear*2+amount",
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                "code_id"=> "3",
                "from_year"=> "2019-2020",
                "to_year"=> "2024-2025",
                "amount"=> "2000",
                "previous_year_rule"=> "amount*totalYear*2+amount",
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]
        ];

        RenewalFee::insert($renewal_fees);
    }
}
