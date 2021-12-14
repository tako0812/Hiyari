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
            'password' => bcrypt('19860812') ,
            'role'=>'5'
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
        DB::table('users')->insert([
            'user_id'=>'test3',
            'name' => '田中太郎',
            'jobs_id'=>'1',
            'password' => bcrypt('test3') 
        ]);
        DB::table('users')->insert([
            'user_id'=>'test4',
            'name' => '田中次郎',
            'jobs_id'=>'1',
            'password' => bcrypt('test4') 
        ]);
        DB::table('users')->insert([
            'user_id'=>'test5',
            'name' => '田中次郎',
            'jobs_id'=>'1',
            'password' => bcrypt('test5') 
        ]);
        DB::table('users')->insert([
            'user_id'=>'admin1',
            'name' => '太郎（管理者）',
            'jobs_id'=>'1',
            'password' => bcrypt('admin1') ,
            'role'=>'5'
        ]);
        DB::table('users')->insert([
            'user_id'=>'admin2',
            'name' => '太郎（管理者）',
            'jobs_id'=>'1',
            'password' => bcrypt('admin2') ,
            'role'=>'5'
        ]);
        DB::table('users')->insert([
            'user_id'=>'admin3',
            'name' => '太郎（管理者）',
            'jobs_id'=>'1',
            'password' => bcrypt('admin3') ,
            'role'=>'5'
        ]);
        DB::table('users')->insert([
            'user_id'=>'admin4',
            'name' => '太郎（管理者）',
            'jobs_id'=>'1',
            'password' => bcrypt('admin4') ,
            'role'=>'5'
        ]);
        DB::table('users')->insert([
            'user_id'=>'admin5',
            'name' => '太郎（管理者）',
            'jobs_id'=>'1',
            'password' => bcrypt('admin5') ,
            'role'=>'5'
        ]);
    }
}
