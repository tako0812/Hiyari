<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jobs')->insert([
            'job_name' => '車掌'
        ]);
        DB::table('jobs')->insert([
            'job_name' => '運転士'
        ]);

    }
}
