<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->insert([
            'work_id' => '51',
            'train_id' => '511',
            'train_time' => '13:32',
        ]);
        DB::table('works')->insert([
            'work_id' => '51',
            'train_id' => '512',
            'train_time' => '15:12',
        ]);
        DB::table('works')->insert([
            'work_id' => '51',
            'train_id' => '513',
            'train_time' => '16:43 ',
        ]);
        DB::table('works')->insert([
            'work_id' => '52',
            'train_id' => '521',
            'train_time' => '13:32',
        ]);
        DB::table('works')->insert([
            'work_id' => '52',
            'train_id' => '522',
            'train_time' => '15:12',
        ]);
        DB::table('works')->insert([
            'work_id' => '52',
            'train_id' => '523',
            'train_time' => '16:43 ',
        ]);
        DB::table('works')->insert([
            'work_id' => '53',
            'train_id' => '531',
            'train_time' => '13:32',
        ]);
        DB::table('works')->insert([
            'work_id' => '53',
            'train_id' => '532',
            'train_time' => '15:12',
        ]);
        DB::table('works')->insert([
            'work_id' => '53',
            'train_id' => '533',
            'train_time' => '16:43 ',
        ]);
    }
}
