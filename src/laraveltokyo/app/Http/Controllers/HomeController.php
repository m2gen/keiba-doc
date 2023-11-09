<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // 必要な処理が入った変数をホーム画面に渡す
    public function index()
    {
        $user = auth()->user();
        $posts = Post::where('user_id', $user['id'])->get();
        // 日別
        $today = Carbon::today();
        $day = Post::where('user_id', $user['id'])->whereDate('date', $today)->get();
        // 週別
        $sevenDaysAgo = Carbon::today()->subDays(7);
        $week = Post::where('user_id', $user['id'])->whereBetween('date', [$sevenDaysAgo, $today])->get();
        // 月別
        $monthStart = Carbon::now()->startOfMonth();
        $monthEnd = Carbon::now()->endOfMonth();
        $month = Post::where('user_id', $user['id'])->whereBetween('date', [$monthStart, $monthEnd])->get();
        // 収支各データの変数と計算
        $PurchaseTotal = 0;
        $RefundTotal = 0;
        $winCount = 0;
        $defeatCount = 0;
        $sameCount = 0;

        foreach ($posts as $post) {
            $Purchase = $post['purchase'];
            $Refund = $post['refund'];
            if ($Refund > $Purchase) {
                $winCount++;
            } elseif ($Purchase > $Refund) {
                $defeatCount++;
            } else {
                $sameCount++;
            }
            $PurchaseTotal += $Purchase;
            $RefundTotal += $Refund;
        }

        $totalNum = $RefundTotal - $PurchaseTotal;
        $recovery = round($RefundTotal / $PurchaseTotal * 100);
        $registerCount = count($posts);

        return view('home', compact('user', 'posts', 'day', 'week', 'month', 'totalNum', 'PurchaseTotal', 'RefundTotal', 'recovery', 'registerCount', 'winCount', 'defeatCount', 'sameCount'));
    }

    // 必要な処理が入った変数をリストに渡す
    public function list()
    {
        $user = auth()->user();
        $posts = Post::where('user_id', $user['id'])->orderBy('updated_at', 'DESC')->get();
        return view('list', compact('user', 'posts'));
    }

    // フォームから送られてきた値をデータベースに保存する処理
    public function store(PostRequest $request)
    {

        $posts = new Post();
        $posts->date = $request->date;
        $posts->horse_track = $request->horse_track;
        $posts->purchase = $request->purchase;
        $posts->refund = $request->refund;
        $posts->memo = $request->memo;
        $posts->user_id = auth()->user()->id;
        $posts->save();

        return redirect()->route('home')->with('success', '登録が完了しました');
    }

    // 必要な処理が入った変数を編集画面に渡す
    public function edit($id)
    {
        $user = auth()->user();
        $posts = Post::where('user_id', $user['id'])->where('id', $id)->get();

        return view('edit', compact('user', 'posts'));
    }

    // 編集画面から更新する処理
    public function update(PostRequest $request, $id)
    {
        $inputs = $request->all();

        Post::where('id', $id)->update([
            'date' => $inputs['date'],
            'horse_track' => $inputs['horse_track'],
            'purchase' => $inputs['purchase'],
            'refund' => $inputs['refund'],
            'memo' => $inputs['memo']
        ]);

        return redirect()->route('list')->with('success', '更新が完了しました');
    }

    // 編集画面から削除する処理
    public function delete(Request $request, $id)
    {
        $user = auth()->user();
        $deletes = $request->all();

        Post::where('user_id', $user['id'])->where('id', $id)->delete($deletes);

        return redirect()->route('list')->with('del', '削除が完了しました');
    }
}
