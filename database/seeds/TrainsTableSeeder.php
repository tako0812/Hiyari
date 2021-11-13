<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        //
        DB::table('trains')->insert([
            'train_id' => '511',
            'station' => '豊橋',
            'arrival' => '',
            'departure'=>'13:50',
        ]);
        DB::table('trains')->insert([
            'train_id' => '511',
            'station' => '名古屋',
            'arrival' => '14:30',
            'departure'=>'14:31',
        ]);
        DB::table('trains')->insert([
            'train_id' => '511',
            'station' => '岐阜',
            'arrival' => '15:30',
            'departure'=>'',
        ]);

        DB::table('trains')->insert([
            'train_id' => '512',
            'station' => '豊橋',
            'arrival' => '',
            'departure'=>'14:50',
        ]);
        DB::table('trains')->insert([
            'train_id' => '512',
            'station' => '名古屋',
            'arrival' => '15:30',
            'departure'=>'15:31',
        ]);
        DB::table('trains')->insert([
            'train_id' => '512',
            'station' => '岐阜',
            'arrival' => '16:30',
            'departure'=>'',
        ]);


        DB::table('trains')->insert([
            'train_id' => '513',
            'station' => '豊橋',
            'arrival' => '',
            'departure'=>'15:50',
        ]);
        DB::table('trains')->insert([
            'train_id' => '513',
            'station' => '名古屋',
            'arrival' => '16:30',
            'departure'=>'16:31',
        ]);
        DB::table('trains')->insert([
            'train_id' => '513',
            'station' => '岐阜',
            'arrival' => '16:30',
            'departure'=>'',
        ]);


    }
}
