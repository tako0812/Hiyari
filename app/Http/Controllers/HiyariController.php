<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hiyari;
use App\Work;
use App\Train;
use App\Jobs;
use App\Age;
use App\Operation;

class HiyariController extends Controller
{
    private $formItems = ["work_id", "train_id", "title", 'text', 'register', 'day', 'time', 'age_id', 'operation_id', 'place', 'jobs_id'];

    public function index($id)
    {
        $hiyari = new Hiyari;
        $ret = $hiyari->get_hiyari_by_work_id($id);

        $work = new Work;
        $train_id = $work->get_work_by_train_id($id);
        $userid = $id;

        return view('hiyari', compact('ret', 'train_id', 'userid'));
    }

    public function detail($id)
    {
        $hiyari = new Hiyari;
        $ret = $hiyari->get_hiyari_by_hiyari_id($id);
        return view('HiyariDetail', compact('ret'));
    }
    public function create()
    {

        $work = new Work;
        $work_id = $work->get_work_id();

        $train = new Train;
        $train_id = $train->get_train_id();

        $jobs = new Jobs;
        $job_name = $jobs->get_jobs_name();

        $jobs = new Jobs;
        $job_name = $jobs->get_jobs_name();

        $age = new Age;
        $age_name = $age->get_age_name();

        $operation = new Operation;
        $operation_name = $operation->get_operation_name();

        return view('HiyariCreate', compact('work_id', 'train_id', 'job_name', 'age_name', 'operation_name'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'work_id' => 'required', // requiredというルールを適用
        ]);

        $input = $request->all();
        unset($input['_token']);
        $hiyari = new Hiyari;
        $hiyari->work_id = $request->work_id;
        $hiyari->train_id = $request->train_id;
        $hiyari->title = $request->title;
        $hiyari->text = $request->text;
        $hiyari->register = $request->register;
        $hiyari->day = $request->day;
        $hiyari->time = $request->time;
        $hiyari->age_id = $request->age;
        $hiyari->jobs_id = $request->jobs;
        $hiyari->place = $request->place;
        $hiyari->operation_id = $request->work;
        $hiyari->measures = "未対応";
        $hiyari->save();
        return view('thankyou');
    }

    public function post(Request $request)
    {
        $input = $request->only($this->formItems);
        //セッションに書き込む
        $request->session()->put("form_input", $input);
        return redirect()->action("HiyariController@confirm");
    }

    public function confirm(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");
        $age = new Age;
        $age_name = $age->get_age_name_by_id($input["age_id"]);
        $job = new Jobs;
        $job_name = $job->get_job_name_by_id($input["jobs_id"]);
        $operation = new Operation;
        $operation_name = $operation->get_operation_name_by_id($input["operation_id"]);
        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect()->action("HiyariController@create");
        }
        return view("confirm", ["input" => $input, "age_name" => $age_name, "job_name" => $job_name, "operation_name" => $operation_name]);
    }
    public function send(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");


        //戻るボタンが押された時
        if ($request->has("back")) {
            return redirect()->action("HiyariController@create")
                ->withInput($input);
        }


        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect()->action("HiyariController@store");
        }

        //ここでメールを送信するなどを行う
        $hiyari = new Hiyari;
        $hiyari->fill($input);

        $hiyari->measures = "未対応";
        $hiyari->save();
        // $hiyari->work_id = $input["work_id"];
        // $hiyari->train_id = $input["train_id"];
        // $hiyari->title = $input["title"];
        // $hiyari->text = $input["text"];
        // $hiyari->register= $input["register"];
        // $hiyari->day = $input["day"];
        // $hiyari->time = $input["time"];
        // $hiyari->age_id = $input["age_id"];
        // $hiyari->jobs_id = $input["job_id"];
        // $hiyari->place = $input["place"];
        // $hiyari->operation_id = $input["operation_id"];




        //セッションを空にする
        $request->session()->forget("form_input");
        return redirect()->action("HiyariController@complete");
    }
    public function complete()
    {
        return view("thankyou");
    }

    public function hiyarinew()
    {
        $hiyari = new Hiyari;
        $ret = $hiyari->get_hiyari_new();
        return view('HiyariNew', compact('ret'));
    }
    public function edit($id)
    {
        $hiyari = new Hiyari;
        $ret = $hiyari->get_hiyari_by_hiyari_id($id);

        $work = new Work;
        $work_id = $work->get_work_id();

        $train = new Train;
        $train_id = $train->get_train_id();

        $jobs = new Jobs;
        $job_name = $jobs->get_jobs_name();

        $jobs = new Jobs;
        $job_name = $jobs->get_jobs_name();

        $age = new Age;
        $age_name = $age->get_age_name();

        $operation = new Operation;
        $operation_name = $operation->get_operation_name();

        return view('HiyariEdit', compact('ret', 'work_id', 'train_id', 'job_name', 'age_name', 'operation_name'));
    }
    public function update($id, Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        $hiyari = new Hiyari;
        $hiyari = $hiyari->find($id);
        $hiyari->fill($input);
        $hiyari->save();
        return redirect()->action("HiyariController@edit", compact('id'));
    }

    //ヒヤリハット削除の確認画面処理
    public function delete(Request $request)
    {
        $hiyari = Hiyari::find($request->id);
        return view('HiyariDelete', ['hiyari' => $hiyari]);
    }

    //ヒヤリハットの削除処理
    public function remove(Request $request)
    {
        $hiyari = Hiyari::find($request->id);
        $hiyari->delete();
        return redirect('/');
    }
}
