<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('weeks')->insert([
            'name' => '平日'
        ]);
        DB::table('weeks')->insert([
            'name' => '休日'
        ]);
    }
}
