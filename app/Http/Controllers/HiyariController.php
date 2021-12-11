<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hiyari;
use App\Work;
use App\Train;
use App\Jobs;
use App\Age;
use App\Weeks;
use App\Operation;
use App\Like;
use App\User;
use Illuminate\Support\Facades\Auth;

class HiyariController extends Controller
{
    private $formItems = ["work_id", "train_id", "title", 'text', 'register', 'day', 'time', 'age_id', 'operation_id', 'place', 'jobs_id', "day_of_week"];

    public function index($id)
    {
        $hiyari = new Hiyari;
        $ret = $hiyari->get_hiyari_by_work_id($id);

        $work = new Work;
        $train_id = $work->get_work_by_train_id($id);
        $userid = $id;

        return view('hiyari', compact('ret', 'train_id', 'hiyari', 'userid'));
    }

    public function detail($id)
    {
        $hiyari = new Hiyari;
        $ret = $hiyari->get_hiyari_by_hiyari_id($id);
        $like = new Like;
        $like_count = $like->LikeCount($id);
        return view('HiyariDetail', compact('ret', 'like_count', 'hiyari'));
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

        $day_of_week = new Weeks();
        $day_of_week = $day_of_week->get_week_name();

        $operation = new Operation;
        $operation_name = $operation->get_operation_name();

        return view('HiyariCreate', compact('work_id', 'train_id', 'job_name', 'age_name', 'operation_name', 'day_of_week'));
    }




    public function post(Request $request)
    {
        $validated = $request->validate(
            [
                'work_id' => 'required|integer',
                'train_id' => 'required|integer',
                'day' => 'required|date',
                'time' => 'required',
                'jobs_id' => 'required|integer',
                'age_id' => 'required|integer',
                'place' => 'required|max:50',
                'title' => 'required|max:100|min:5',
                'text' => 'required|max:10000|min:20',
            ],
            [
                'work_id.required' => '勤務番号を入力してください',
                'work_id.integer' => '勤務番号は数字で入れてください',
                'train_id.required' => '列車番号を入力してください',
                'train_id.integer' => '勤務番号は数字で入れてください',
                'day.required' => '日付は必須です',
                'day.date' => '日付はフォームを使用してください',
                'time.required' => '時刻は必須です',
                'jobs_id.required' => '職種は必須です',
                'jobs_id.integer' => '職種はフォームを使用してください',
                'age_id.required' => '年齢は必須です',
                'age_id.integer' => '年齢はフォームを使用してください',
                'place.required' => '場所は必須です',
                'place.max' => '場所は最大50文字までです',
                'title.required' => 'タイトルは必須です',
                'title.min' => 'タイトルは5文字以上入力してください',
                'title.max' => 'タイトルは最大100文字までです',
                'text.required' => 'ヒヤリハット内容を入力してください',
                'text.min' => 'ヒヤリハット内容は20文字以上入力してください',
                'text.max' => 'ヒヤリハット内容は最大10000文字までです',
            ]
        );

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

        $day_of_week = new Weeks;
        $day_of_week = $day_of_week->get_week_name_by_id($input["day_of_week"]);

    

        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect()->action("HiyariController@create");
        }
        return view("confirm", ["input" => $input, "age_name" => $age_name, "job_name" => $job_name, "operation_name" => $operation_name, "day_of_week" => $day_of_week]);
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
        $user = Auth::user();
        $hiyari->user_id = $user->user_id;
        $hiyari->save();

 

        //セッションを空にする
        $request->session()->forget("form_input");
        return redirect()->action("HiyariController@complete");
    }
    public function complete()
    {
        return view("thankyou");
    }

    //ヒヤリハット新着順平日
    public function hiyarinew()
    {
        $hiyari = new Hiyari;
        $ret = $hiyari->get_hiyari_new();
        return view('HiyariNew', compact('ret'));
    }
    //ヒヤリハット新着休日
    public function HiyariNewHoliday()
    {
        $hiyari = new Hiyari;
        $ret = $hiyari->get_hiyari_new_holiday();
        return view('HiyariNew', compact('ret'));
    }

    //ヒヤリハットランキング平日
    public function hiyariranking()
    {
        $ret = Hiyari::where("day_of_week","1")->withCount('likes')->orderBy('likes_count', 'desc')->paginate(10);
        return view('HiyariRanking', compact('ret'));
    }
    //ヒヤリハットランキング休日
    public function HiyariRankingHoliday()
    {
        $ret = Hiyari::where("day_of_week","2")->withCount('likes')->orderBy('likes_count', 'desc')->paginate(10);
        return view('HiyariRanking', compact('ret'));
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


        $validated = $request->validate(
            [
                'work_id' => 'required|integer',
                'train_id' => 'required|integer',
                'day' => 'required|date',
                'time' => 'required',
                'jobs_id' => 'required|integer',
                'age_id' => 'required|integer',
                'place' => 'required|max:50',
                'title' => 'required|max:100|min:5',
                'text' => 'required|max:10000|min:20',
            ],
            [
                'work_id.required' => '勤務番号を入力してください',
                'work_id.integer' => '勤務番号は数字で入れてください',
                'train_id.required' => '列車番号を入力してください',
                'train_id.integer' => '勤務番号は数字で入れてください',
                'day.required' => '日付は必須です',
                'day.date' => '日付はフォームを使用してください',
                'time.required' => '時刻は必須です',
                'jobs_id.required' => '職種は必須です',
                'jobs_id.integer' => '職種はフォームを使用してください',
                'age_id.required' => '年齢は必須です',
                'age_id.integer' => '年齢はフォームを使用してください',
                'place.required' => '場所は必須です',
                'place.max' => '場所は最大50文字までです',
                'title.required' => 'タイトルは必須です',
                'title.min' => 'タイトルは5文字以上入力してください',
                'title.max' => 'タイトルは最大100文字までです',
                'text.required' => 'ヒヤリハット内容を入力してください',
                'text.min' => 'ヒヤリハット内容は20文字以上入力してください',
                'text.max' => 'ヒヤリハット内容は最大10000文字までです',
            ]
        );

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



    //いいね処理
    public function like(Request $request)
    {

        $user_id = Auth::user()->user_id; //1.ログインユーザーのid取得
        $hiyari_id = $request->hiyari_id; //2.投稿idの取得
        $already_liked = Like::where('user_id', $user_id)->where('hiyari_id', $hiyari_id)->first();

        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Like; //4.Likeクラスのインスタンスを作成
            $like->hiyari_id = $hiyari_id; //Likeインスタンスにreview_id,user_idをセット
            $like->user_id = $user_id;
            $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('hiyari_id', $hiyari_id)->where('user_id', $user_id)->delete();
        }
        //5.この投稿の最新の総いいね数を取得
        $review_likes_count = Hiyari::withCount('likes')->findOrFail($hiyari_id)->likes_count;
        $param = [
            'review_likes_count' => $review_likes_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す
    }
    public function LikeUserRanking()
    {
        $user = new User;
        $user_hiyari_ranking = $user->get_Like_User_ranking();
        return view('LikeUserRanking', ['user_hiyari_ranking' => $user_hiyari_ranking]);
    }



    public function analytics()
    {
        return view('analytics');
    }
}
