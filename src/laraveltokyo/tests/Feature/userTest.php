<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userTest extends TestCase
{
    public function testUser()
    {
        // レコード新規作成
        $user = new User;
        $user->name = "テスト太郎";
        $user->email = "taro@test.com";
        $user->password = Hash::make('test_password');
        $user->save();

        // SELECT
        $readUser = User::where('name', 'テスト太郎')->first();
        $this->assertNotNull($readUser); // データが取得できたかテスト
        $this->assertTrue(Hash::check('test_password', $readUser->password));

        // レコード削除
        User::where('email', 'taro@test.com')->delete();
    }
}
