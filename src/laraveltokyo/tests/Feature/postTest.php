<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testPost()
    {
        // ユーザー作成
        $user = User::factory()->create([
            'password' => Hash::make('test_password'),
        ]);

        // ログイン
        $this->actingAs($user);

        // レコード新規作成
        $post = new Post;
        $post->date = '2024-03-03';
        $post->horse_track = '東京競馬場';
        $post->purchase = 1000;
        $post->refund = 2000;
        $post->types = '単勝';
        $post->multi2 = true;
        $post->memo = 'テストメモ';
        $post->user_id = $user->id;
        $post->save();

        // SELECT
        $readPost = Post::where('user_id', $user->id)->first();
        $this->assertNotNull($readPost); // データが取得できたかテスト
        $this->assertEquals('2024-03-03', $readPost->date);
        $this->assertEquals('東京競馬場', $readPost->horse_track);
        $this->assertEquals(1000, $readPost->purchase);
        $this->assertEquals(2000, $readPost->refund);
        $this->assertEquals('単勝', $readPost->types);
        $this->assertEquals(true, $readPost->multi2);
        $this->assertEquals('テストメモ', $readPost->memo);
    }
}
