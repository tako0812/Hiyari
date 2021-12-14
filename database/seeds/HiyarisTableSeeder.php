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
            'work_id' => '2',
            'train_id' => '21',
            'user_id'=>'m214983',
            'title' => '標版が見えにくい場所がある',
            'text' => '草が多くて標版が見えにくいです。伐採をお願いします',
            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '1',
            'jobs_id' => '2',
            'place' => '〇〇駅',
            'operation_id' => '1',
            'measures' => '対処済み',
            'day_of_week'=>'1',
        ]);
        DB::table('hiyari')->insert([
            'work_id' => '2',
            'train_id' => '22',
            'user_id'=>'test1',
            'title' => 'お客さまに声をかけられて気を取られてヒヤリ',
            'text' => 'お客さまに声をかけられて、業務に集中できずにヒヤリとしました。人が多く質問されることが多いので注意しましょう。',

            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '2',
            'jobs_id' => '1',
            'place' => '〇〇駅',
            'operation_id' => '2',
            'measures' => '対処済み',
            'day_of_week'=>'1',
        ]);
        DB::table('hiyari')->insert([
            'work_id' => '2',
            'train_id' => '23',
            'user_id'=>'test2',
            'title' => '階段を急いでおりていたら、転びそうになった',
            'text' => '階段を急いでおりていたら、転びそうになりました。時間に余裕をもって行動しましょう。',

            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '3',
            'jobs_id' => '1',
            'place' => '〇〇駅',
            'operation_id' => '3',
            'measures' => '対処済み',
            'day_of_week'=>'2',
        ]);

        DB::table('hiyari')->insert([
            'work_id' => '1',
            'train_id' => '11',
            'user_id'=>'test3',
            'title' => '駅を歩いているときに足を滑らせた',
            'text' => '列車担当時に足が滑りました。本当に滑りやすいため、慎重に移動してください。',
            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '1',
            'jobs_id' => '2',
            'place' => '〇〇駅',
            'operation_id' => '1',
            'measures' => '対処済み',
            'day_of_week'=>'1',
        ]);
        DB::table('hiyari')->insert([
            'work_id' => '1',
            'train_id' => '12',
            'user_id'=>'test4',
            'title' => '乗降が多くヒヤリ',
            'text' => '〇〇駅での乗降が非常に多く確認しづらいため、慎重なドア確認を行う必要があります。ITVを確認してゆっくりとドアを閉めてください。',

            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '2',
            'jobs_id' => '1',
            'place' => '〇〇駅',
            'operation_id' => '2',
            'measures' => '対処済み',
            'day_of_week'=>'1',
        ]);
        DB::table('hiyari')->insert([
            'work_id' => '1',
            'train_id' => '13',
            'user_id'=>'test5',
            'title' => '降りるときに段差があるためヒヤリ',
            'text' => '電車から降りるときに注意してください。段差が大きくなっていますので、躓く可能性があります。',

            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '3',
            'jobs_id' => '1',
            'place' => '〇〇駅',
            'operation_id' => '3',
            'measures' => '対処済み',
            'day_of_week'=>'2',
        ]);
        DB::table('hiyari')->insert([
            'work_id' => '3',
            'train_id' => '31',
            'user_id'=>'admin1',
            'title' => '駅を歩いているときに足を滑らせた',
            'text' => '列車担当時に足が滑りました。本当に滑りやすいため、慎重に移動してください。',
            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '1',
            'jobs_id' => '2',
            'place' => '〇〇駅',
            'operation_id' => '1',
            'measures' => '対処済み',
            'day_of_week'=>'1',
        ]);
        DB::table('hiyari')->insert([
            'work_id' => '3',
            'train_id' => '32',
            'user_id'=>'admin2',
            'title' => '乗降が多くヒヤリ',
            'text' => '〇〇駅での乗降が非常に多く確認しづらいため、慎重なドア確認を行う必要があります。ITVを確認してゆっくりとドアを閉めてください。',

            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '2',
            'jobs_id' => '1',
            'place' => '〇〇駅',
            'operation_id' => '2',
            'measures' => '対処済み',
            'day_of_week'=>'1',
        ]);
        DB::table('hiyari')->insert([
            'work_id' => '3',
            'train_id' => '33',
            'user_id'=>'admin3',
            'title' => '二段ベッドの梯子が外れかけている',
            'text' => '二段ベッドの梯子がはずれかけています。注意した方が良いです。',

            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '3',
            'jobs_id' => '1',
            'place' => '〇〇駅',
            'operation_id' => '3',
            'measures' => '対処済み',
            'day_of_week'=>'2',
        ]);
        DB::table('hiyari')->insert([
            'work_id' => '3',
            'train_id' => '33',
            'user_id'=>'admin4',
            'title' => '二段ベッドの梯子が外れかけている',
            'text' => '二段ベッドの梯子がはずれかけています。注意した方が良いです。',

            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '3',
            'jobs_id' => '1',
            'place' => '〇〇駅',
            'operation_id' => '3',
            'measures' => '対処済み',
            'day_of_week'=>'2',
        ]);
        DB::table('hiyari')->insert([
            'work_id' => '3',
            'train_id' => '33',
            'user_id'=>'admin5',
            'title' => '二段ベッドの梯子が外れかけている',
            'text' => '二段ベッドの梯子がはずれかけています。注意した方が良いです。',

            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '3',
            'jobs_id' => '1',
            'place' => '〇〇駅',
            'operation_id' => '3',
            'measures' => '対処済み',
            'day_of_week'=>'2',
        ]);
        DB::table('hiyari')->insert([
            'work_id' => '3',
            'train_id' => '33',
            'user_id'=>'m214983',
            'title' => '二段ベッドの梯子が外れかけている',
            'text' => '二段ベッドの梯子がはずれかけています。注意した方が良いです。',

            'time' => '10:25',
            'day'=>'2021-10-2',
            'age_id' => '3',
            'jobs_id' => '1',
            'place' => '〇〇駅',
            'operation_id' => '3',
            'measures' => '対処済み',
            'day_of_week'=>'2',
        ]);


    }
}
