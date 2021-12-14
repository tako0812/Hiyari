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
            'work_id' => '1',
            'train_id' => '11',
            'train_time' => '13:32',
        ]);
        DB::table('works')->insert([
            'work_id' => '1',
            'train_id' => '12',
            'train_time' => '15:12',
        ]);
        DB::table('works')->insert([
            'work_id' => '1',
            'train_id' => '13',
            'train_time' => '16:43 ',
        ]);
        DB::table('works')->insert([
            'work_id' => '1',
            'train_id' => '14',
            'train_time' => '16:43',
        ]);
        DB::table('works')->insert([
            'work_id' => '1',
            'train_id' => '15',
            'train_time' => '16:45',
        ]);
        DB::table('works')->insert([
            'work_id' => '1',
            'train_id' => '16',
            'train_time' => '16:46',
        ]);

        DB::table('works')->insert([
            'work_id' => '2',
            'train_id' => '21',
            'train_time' => '13:32',
        ]);
        DB::table('works')->insert([
            'work_id' => '2',
            'train_id' => '22',
            'train_time' => '15:12',
        ]);
        DB::table('works')->insert([
            'work_id' => '2',
            'train_id' => '23',
            'train_time' => '16:43 ',
        ]);
        DB::table('works')->insert([
            'work_id' => '2',
            'train_id' => '24',
            'train_time' => '17:32',
        ]);
        DB::table('works')->insert([
            'work_id' => '2',
            'train_id' => '25',
            'train_time' => '17:12',
        ]);
        DB::table('works')->insert([
            'work_id' => '2',
            'train_id' => '26',
            'train_time' => '17:43',
        ]);


        DB::table('works')->insert([
            'work_id' => '3',
            'train_id' => '31',
            'train_time' => '13:32',
        ]);
        DB::table('works')->insert([
            'work_id' => '3',
            'train_id' => '32',
            'train_time' => '15:12',
        ]);
        DB::table('works')->insert([
            'work_id' => '3',
            'train_id' => '33',
            'train_time' => '16:43 ',
        ]);
        DB::table('works')->insert([
            'work_id' => '3',
            'train_id' => '34',
            'train_time' => '17:32',
        ]);
        DB::table('works')->insert([
            'work_id' => '3',
            'train_id' => '35',
            'train_time' => '17:12',
        ]);
        DB::table('works')->insert([
            'work_id' => '3',
            'train_id' => '36',
            'train_time' => '17:43 ',
        ]);
    }
}
