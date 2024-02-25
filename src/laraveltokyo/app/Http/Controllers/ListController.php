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
        $news = Post::where('user_id', $user['id'])->orderBy('date', 'DESC')->orderBy('updated_at', 'DESC')->paginate(14);

        return view('lists.list', compact('user', 'news'));
    }

    // 古い順
    public function listOld()
    {
        $user = auth()->user();
        $olds = Post::where('user_id', $user['id'])->orderBy('date', 'ASC')->paginate(14);

        return view('lists.old', compact('user', 'olds'));
    }

    // 更新順
    public function listUpdate()
    {
        $user = auth()->user();
        $updates = Post::where('user_id', $user['id'])->orderBy('updated_at', 'DESC')->paginate(14);

        return view('lists.update', compact('user', 'updates'));
    }

    // 購入金額降順
    public function listPurchase()
    {
        $user = auth()->user();
        $maxPurchases = Post::where('user_id', $user['id'])->orderBy('purchase', 'DESC')->paginate(14);

        return view('lists.maxP', compact('user', 'maxPurchases'));
    }

    // 払戻金額降順
    public function listRefund()
    {
        $user = auth()->user();
        $maxRefunds = Post::where('user_id', $user['id'])->orderBy('refund', 'DESC')->paginate(14);

        return view('lists.maxR', compact('user', 'maxRefunds'));
    }
}
