<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

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
        $posts = Post::where('user_id', $user['id'])->get();
        return view('home', compact('user', 'posts'));
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

    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
