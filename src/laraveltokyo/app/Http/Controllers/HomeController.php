<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
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
    public function index()
    {
        $user = \Auth::user();
        // 合計
        $posts = Post::where('user_id', $user['id'])->get();
        // 日別
        $today = Carbon::today();
        $day = Post::whereDate('date', $today)->get();
        // 週別
        $sevenDaysAgo = Carbon::today()->subDays(7);
        $week = Post::whereBetween('date', [$sevenDaysAgo, $today])->get();
        // 月別
        $monthStart = Carbon::now()->startOfMonth();
        $monthEnd = Carbon::now()->endOfMonth();
        $month = Post::whereBetween('date', [$monthStart, $monthEnd])->get();

        return view('home', compact('user', 'posts', 'day', 'week', 'month'));
    }

    public function list()
    {
        $user = \Auth::user();
        $posts = Post::where('user_id', $user['id'])->orderBy('updated_at', 'DESC')->get();
        return view('list', compact('user', 'posts'));
    }

    public function store(Request $request)
    {
        $posts = new post();
        $posts->date = $request->date;
        $posts->horse_track = $request->horse_track;
        $posts->purchase = $request->purchase;
        $posts->refund = $request->refund;
        $posts->memo = $request->memo;
        $posts->user_id = auth()->user()->id;
        $posts->save();

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $user = \Auth::user();
        $posts = Post::where('user_id', $user['id'])->where('id', $id)->get();

        return view('edit', compact('user', 'posts'));
    }

    public function update(Request $request, $id)
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

    public function delete(Request $request, $id)
    {
        $deletes = $request->all();

        Post::where('id', $id)->delete($deletes);

        return redirect()->route('list')->with('del', '削除が完了しました');
    }
}
