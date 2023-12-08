<?php

namespace App\Http\Controllers;

use App\Models\Post;


class ListController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // 必要な処理が入った変数をリストに渡す
    public function list()
    {
        $user = auth()->user();
        $news = Post::where('user_id', $user['id'])->orderBy('date', 'DESC')->get();

        return view('lists.list', compact('user', 'news'));
    }

    public function listOld()
    {
        $user = auth()->user();
        $olds = Post::where('user_id', $user['id'])->orderBy('date', 'ASC')->get();

        return view('lists.old', compact('user', 'olds'));
    }

    public function listUpdate()
    {
        $user = auth()->user();
        $updates = Post::where('user_id', $user['id'])->orderBy('updated_at', 'DESC')->get();

        return view('lists.update', compact('user', 'updates'));
    }

    public function listPurchase()
    {
        $user = auth()->user();
        $maxPurchases = Post::where('user_id', $user['id'])->orderBy('purchase', 'DESC')->get();

        return view('lists.maxP', compact('user', 'maxPurchases'));
    }

    public function listRefund()
    {
        $user = auth()->user();
        $maxRefunds = Post::where('user_id', $user['id'])->orderBy('refund', 'DESC')->get();

        return view('lists.maxR', compact('user', 'maxRefunds'));
    }
}
