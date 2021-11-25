<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'user_id'=>'m214983',
            'name' => '田原一輝',
            'jobs_id'=>'1',
            'password' => bcrypt('19860812') 
        ]);
        DB::table('users')->insert([
            'user_id'=>'test1',
            'name' => '田中太郎',
            'jobs_id'=>'1',
            'password' => bcrypt('test1') 
        ]);
        DB::table('users')->insert([
            'user_id'=>'test2',
            'name' => '田中次郎',
            'jobs_id'=>'1',
            'password' => bcrypt('test2') 
        ]);
    }
}
