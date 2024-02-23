# 競馬ドック 

## ~ 競馬に特化した収支管理アプリ ~

<p align="center">
<img src="https://i.imgur.com/3JQDP1G.png" width="600">
<img src="https://i.imgur.com/nckvVVq.png" width="600">
</p>


### URL  
<https://keiba-doc.net/>

### アプリの概要
競馬ドックとは、地方から中央まで対応したシンプルで使いやすい競馬専用収支アプリです。webブラウザ専用で、メールアドレス、パスワードを設定すればすぐに始めることができます。日付、競馬場、購入金額、払戻金額、馬券の種類、メモまで細かく記録可能。

### このアプリを作成した理由
* 競馬に特化した収支管理アプリは少なかった
* webブラウザ専用の収支管理アプリは少ない
* 必要事項を入力するだけで様々な数値を自動で計算してくれるツールが欲しかった
* アプリをインフラからフロントエンド、バックエンドまで全て自分で作成する経験を経て成長したかった

### 対象のユーザー
* 競馬の収支をwebブラウザで管理したい
* 競馬”専用”収支管理アプリを求めている
* 収支データを細かく分析したい

### 技術スタック
* フロントエンド：HTML、CSS、Bootstrap、JavaScript
* バックエンド：PHP、MySQL
* フレームワーク：Laravel
* その他：Docker、Ubuntu、Apache、AWS(EC2)、git/github、phpmyadmin、Google Chart

### 何故この技術スタックを選んだのか
まずwebアプリを作るならLaravelが最適だと思ったからです。データベースもEloquentで簡単に操作できるのが魅力的でした。Dockerは異なるOSごとで同じ環境を構築できる点、ローカル環境を汚さずに環境を用意できる点、チーム開発でDockerは必須であり、将来的に学んで損はないと思い選択しました。EC2は正直なところ料金的な面と学習的な面が大きいです。ポートフォリオとして公開するだけなので１年間無料の恩恵を受けました。また、世界シェア１位のIaasなので実際に触って操作してみたかった。OSは開発環境、本番環境両方でUbuntuを選択しました。動作が軽く、コマンド操作も覚えればインストールなどが簡単な点が魅力的でした。

### ユーザー機能
* ログイン/新規登録（ユーザー別に収支を管理）
* 日付、競馬場、購入金額、払戻金額、馬券の種類、メモを入力
* 日、週、月、全期間での収支表示
* 収支総額、購入、払戻、的中率、回収率などを期間ごとに表示
* 収支一覧リストを任意の順番で表示
* 収支一覧リストから編集、削除
* 過去最大14日分の積み上げ棒グラフを表示
* ログイン不要の回収率計算ツール
* お問い合わせ

### 作成期間
最初の完成が約2か月。その後、2か月ほど修正を繰り返して合計4ヶ月くらいです。

### 今後の課題と改善
* 手動テストのみで自動テストを行っていないのでバグが存在する可能性がある
* EC2の上にそのままMySQLを載せたが今後はRDBなども使ってみたい
* デザインをBootstrapに頼りすぎている。CSSをもう少し使ってオリジナリティを出したい
* アプリとして簡素すぎる。収支としての機能以外にもシェア機能やアカウント設定機能など一般的なアプリによく見られる機能が備わっていない
* セキュリティが最低限。SSL設定やセキュリティグループ、脆弱性の少ないコードを意識したが、恐らくまだ実際に運用できるようなレベルには達していないのでセキュリティをもっと勉強していきたい
* Dockerの勉強。とあるサイト様のdockerfile,docker-compose.ymlをコピーして自分用に改変しただけなので1からdockerを構築できるようにしたい
* JavaScriptを使ってもう少しサイトに動きを付けたい
* 収支をシェアできて競馬の話ができるユーザー同士の交流の場を設けるのもいいかもしれない
