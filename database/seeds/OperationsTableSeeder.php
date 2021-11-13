<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OperationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('operations')->insert([
            'operation_name' => '運転中'
        ]);
        DB::table('operations')->insert([
            'operation_name' => '車掌業務中'
        ]);
        DB::table('operations')->insert([
            'operation_name' => '出場中'
        ]);
    }
}
