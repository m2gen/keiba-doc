<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 必要な処理が入った変数をホーム画面に渡す
    public function index()
    {
        $user = auth()->user();
        $posts = Post::where('user_id', $user['id'])->get();
        // グラフ用データ
        $graphPosts = Post::where('user_id', $user['id'])->orderBy('date', 'DESC')->take(14)->get()->sortBy('date');
        // 最初の日付と最後の日付
        $firstDate = Post::where('user_id', $user['id'])->orderBy('date', 'ASC')->value('date');
        $lastDate = Post::where('user_id', $user['id'])->orderBy('date', 'DESC')->value('date');
        // 日別
        $today = Carbon::today();
        $dayPosts = Post::where('user_id', $user['id'])->whereDate('date', $today)->get();
        // 週別
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $weekPosts = Post::where('user_id', $user['id'])->whereBetween('date', [$startOfWeek, $endOfWeek])->get();
        // 月別
        $monthStart = Carbon::now()->startOfMonth();
        $monthEnd = Carbon::now()->endOfMonth();
        $monthPosts = Post::where('user_id', $user['id'])->whereBetween('date', [$monthStart, $monthEnd])->get();
        // calculateで計算をして返す
        $totalData = $this->calculate($posts);
        $dayData = $this->calculate($dayPosts);
        $weekData = $this->calculate($weekPosts);
        $monthData = $this->calculate($monthPosts);

        return view('home', compact('graphPosts', 'firstDate', 'lastDate', 'totalData', 'dayData', 'weekData', 'today', 'monthData', 'startOfWeek', 'endOfWeek', 'monthStart', 'monthEnd'));
    }

    // 各期間に共通する必要な処理を計算
    private function calculate($posts)
    {
        $purchaseTotal = 0;
        $refundTotal = 0;
        $winCount = 0;
        $defeatCount = 0;
        $sameCount = 0;
        $maxPurchase = 0;
        $maxRefund = 0;
        $refundCount = 0;

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
            $purchaseTotal += $Purchase;
            $refundTotal += $Refund;
            $maxPurchase = max($maxPurchase, $Purchase);
            $maxRefund = max($maxRefund, $Refund);
            if ($Refund > 0) {
                $refundCount++;
            }
        }

        $totalNum = $refundTotal - $purchaseTotal;
        $recovery = $purchaseTotal != 0 ? round($refundTotal / $purchaseTotal * 100) : 0;
        $registerCount = count($posts);
        $winRate = $registerCount != 0 ? round(($refundCount) / $registerCount * 100) : 0;

        return compact('totalNum', 'purchaseTotal', 'refundTotal', 'recovery', 'registerCount', 'winCount', 'defeatCount', 'sameCount', 'winRate', 'maxPurchase', 'maxRefund');
    }

    // フォームから送られてきた値をデータベースに保存する処理
    public function store(PostRequest $request)
    {

        $user = auth()->user();
        $limits = Post::where('user_id', $user['id'])->count();

        if ($limits >= 500) {
            return redirect()->back()->withErrors(['success' => 'データの登録は500個までです']);
        }

        $posts = new Post();
        $posts->date = $request->date;
        $posts->horse_track = $request->horse_track;
        $posts->purchase = $request->purchase;
        $posts->refund = $request->refund;
        $posts->types = $request->types;
        $posts->multi2 = $request->has('multi2');
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
        $inputs['multi2'] = $request->has('multi2') ? 1 : 0;

        Post::where('id', $id)->update([
            'date' => $inputs['date'],
            'horse_track' => $inputs['horse_track'],
            'purchase' => $inputs['purchase'],
            'refund' => $inputs['refund'],
            'types' => $inputs['types'],
            'multi2' => $inputs['multi2'],
            'memo' => $inputs['memo']
        ]);

        return redirect()->route('lists.list')->with('success', '更新が完了しました');
    }

    // 編集画面から削除する処理
    public function delete(Request $request, $id)
    {
        $user = auth()->user();
        $deletes = $request->all();

        Post::where('user_id', $user['id'])->where('id', $id)->delete($deletes);

        return redirect()->route('lists.list')->with('success', '削除が完了しました');
    }
}
