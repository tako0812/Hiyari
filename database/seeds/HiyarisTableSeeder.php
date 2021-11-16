<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HiyarisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hiyari')->insert([
            'work_id' => '52',
            'train_id' => '521',
            'user_id'=>'m214983',
            'title' => '第１３９２列車担当時足が滑った',
            'text' => '第１３９２列車担当時に足が滑りました。本当に滑りやすいため、慎重に移動してください。',
            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '1',
            'jobs_id' => '2',
            'place' => '神宮前駅',
            'operation_id' => '1',
            'measures' => '対処済み',
        ]);
        DB::table('hiyari')->insert([
            'work_id' => '52',
            'train_id' => '522',
            'user_id'=>'m214983',
            'title' => '乗降が多くヒヤリ',
            'text' => '〇〇駅での乗降が非常に多く確認しづらいため、慎重なドア確認を行う必要があります。ITVを確認してゆっくりとドアを閉めてください。',

            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '2',
            'jobs_id' => '1',
            'place' => '神宮前駅',
            'operation_id' => '2',
            'measures' => '対処済み',
        ]);
        DB::table('hiyari')->insert([
            'work_id' => '52',
            'train_id' => '523',
            'user_id'=>'m214983',
            'title' => '降りるときに段差があるためヒヤリ',
            'text' => '電車から降りるときに注意してください。段差が大きくなっていますので、躓く可能性があります。',

            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '3',
            'jobs_id' => '1',
            'place' => '神宮前駅',
            'operation_id' => '3',
            'measures' => '対処済み',
        ]);
    }
}
