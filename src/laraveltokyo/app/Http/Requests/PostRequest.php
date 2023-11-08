<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'date' => 'required|date',
            'horse_track' => 'required',
            'purchase' => 'required|digits_between:3,9',
            'refund' => 'required|digits_between:0,10',
            'memo' => 'nullable|string|max:200'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => "日付は必須項目です",
            'horse_track.required' => "競馬場は必須項目です",
            'purchase.required' => "購入金額は必須項目です",
            'purchase.digits_between' => "金額が大きすぎます",
            'refund.required' => "払戻金額は必須項目です",
            'refund.digits_between' => "金額が大きすぎます",
            'memo.max' => "メモは200文字以内で入力してください"
        ];
    }
}
