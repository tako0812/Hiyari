<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ages')->insert([
            'age_name' => '１０代'
        ]);
        DB::table('ages')->insert([
            'age_name' => '２０代'
        ]);
        DB::table('ages')->insert([
            'age_name' => '３０代'
        ]);
        DB::table('ages')->insert([
            'age_name' => '４０代'
        ]);
        DB::table('ages')->insert([
            'age_name' => '５０代'
        ]);
        DB::table('ages')->insert([
            'age_name' => '６０代'
        ]);
    }
}
