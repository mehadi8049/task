<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Mehadi Hasan',
                'user_id' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('password'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'name' => '101',
                'user_id' => 101,
                'role' => 'user',
                'password' => bcrypt('password'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'name' => '102',
                'user_id' => 102,
                'role' => 'admin',
                'password' => bcrypt('password'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'name' => '103',
                'user_id' => 103,
                'role' => 'admin',
                'password' => bcrypt('password'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]
         ];
         
         User::insert($data);

        
    }
}
