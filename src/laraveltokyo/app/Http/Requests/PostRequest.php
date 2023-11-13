<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'date' => 'required|date',
            'horse_track' => 'required|in:札幌競馬場,函館競馬場,新潟競馬場,福島競馬場,中山競馬場,東京競馬場,中京競馬場,京都競馬場,阪神競馬場,小倉競馬場,帯広競馬場,門別競馬場,盛岡競馬場,水沢競馬場,浦和競馬場,船橋競馬場,大井競馬場,川崎競馬場,金沢競馬場,笠松競馬場,名古屋競馬場,園田競馬場,姫路競馬場,高知競馬場,佐賀競馬場,海外の競馬場',
            'purchase' => 'required|digits_between:3,9|min:0',
            'refund' => 'required|digits_between:0,10|min:0',
            'types' => 'required|in:単勝,複勝,枠連,枠単,馬連,馬単,ワイド,３連複,３連単,WIN5',
            'memo' => 'nullable|string|max:200'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => "日付は必須項目です",
            'horse_track.required' => "競馬場は必須項目です",
            'horse_track.in' => "無効な競馬場が選択されました",
            'purchase.required' => "購入金額は必須項目です",
            'purchase.digits_between' => "金額が大きすぎます",
            'purchase.min' => "購入金額は0以上でなければなりません",
            'refund.required' => "払戻金額は必須項目です",
            'refund.digits_between' => "金額が大きすぎます",
            'refund.min' => "払戻金額は0以上でなければなりません",
            'types.required' => "馬券の種類は必須項目です",
            'types.in' => "無効な馬券の種類が選択されました",
            'memo.max' => "メモは200文字以内で入力してください"
        ];
    }
}
