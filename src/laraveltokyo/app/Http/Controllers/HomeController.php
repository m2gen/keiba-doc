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
        $weekStart = Carbon::now()->startOfWeek();
        $weekEnd = Carbon::now()->endOfWeek();
        $week = Post::whereBetween('date', [$weekStart, $weekEnd])->get();
        // 月別
        $monthStart = Carbon::now()->startOfMonth();
        $monthEnd = Carbon::now()->endOfMonth();
        $month = Post::whereBetween('date', [$monthStart, $monthEnd])->get();

        return view('home', compact('user', 'posts', 'day', 'week', 'month'));
    }

    public function list()
    {
        $user = \Auth::user();
        $posts = Post::where('user_id', $user['id'])->get();
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
