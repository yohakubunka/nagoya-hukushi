# クライアント名・プロジェクト名

| クライアント名   | 名古屋福祉協同組合                                                        |
| :--------------- | :------------------------------------------------------------------------ |
| 顧客番号         | 0072                                                                      |
| デザイン担当者   | 〇〇                                                                      |
| 初期構築         | 〇〇                                                                      |
| CMS              | WordPress                                                                 |
| ドメイン         | example.com                                                               |
| ドメイン管理     | ドメイン管理会社,ドメイン管理サービス名                                   |
| 本番サーバー     | 本番サーバー管理会社、サービス名                                          |
| 本番サーバー状態 | 状態報告                                                                  |
| テストサーバー   | http://yohakutest.xsrv.jp/clientname/                                     |
| Bitbucket        | https://bitbucket.org/yohaku_shimizu/clientname/src/master/               |
| NAS              | share > 制作中の案件 > 0000_clientname                                    |
| GoogleDrive      | https://drive.google.com/drive/x/x/folders/XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX |

## 案件概要

名古屋福祉協同組合のサイト作成です。
リニューアル目的はデザインの一新と求人ページの作成を行い、求人問い合わせを増やすことです。  
現在本番環境では HTML のみで作成(Dreamweaber)されたサイトが稼働しています。  
リニューアルでは一部お知らせを WordPress へ移動させます。  
納品予定先のサーバーはクライアントが管理しているさくらサーバーです。  
PHP・MySQL・Apache のバージョンは WordPress の必要要件を満たしているのを確認済みです。

## 必須プラグイン

- Advanced Custom Fields(無償版)
- All-in-One WP Migration
- Custom Post Type UI
- ContactForm 7
- Smart Custom Fields

## 投稿

- News/Column

## お客様更新

- スライド
- 固定ページ（メインビジュアル）
- 注釈文
- FQA
- FLOW

## 注意事項

例:セクション毎の余白が乱調です。フロントコーディングの際は注意してクラスの作成を行ってください。詳しいデザインの仕様は GoogleDrive 内の仕様書を確認してください。  
https://drive.google.com/drive/x/x/folders/XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

### セクションクラスの命名規則

セクションセレクタのクラス名は命名規則に従って付与してください。  
`.section-init`を必ずつけセクションの余白毎に`.pad-y-50`のようなクラスをつけてください。

```
// HTML記述例

<section class="section-init pad-y-50">
{{content}}
</section>
```

```
// SCSS記述

.section-init {
  // sectionの共通設定
  max-width: $break-point_xl;
  margin: auto;
  padding: 16px;

  // 上下50pxの場合
  &.pad-y-50 {
    padding-top: 50px;
    padding-bottom: 50px;
  }

  // 上下100pxの場合
  &.pad-y-100 {
    padding-top: 100px;
    padding-bottom: 100px;
  }

  // 上50px、下100pxの場合
  &.pad-t-50-b-100 {
    padding-top: 50px;
    padding-bottom: 100px;
  }
}
```

## 修正などの対応記録

| 年月日     | 実施者 | 内容                                                                                                          |
| :--------- | :----- | :------------------------------------------------------------------------------------------------------------ |
| 2021/05/20 | 清水   | 例:TOP ページ ○○ セクションの写真の差し替え。<br>フッターメニューの会社概要の変更。○○ 株式会社 => △△ 株式会社 |
| 2021/05/13 | 清水   | 例:お客様アカウントのパスワード更新。                                                                         |
| 2021/04/25 | 清水   | 例:最新情報のタグフィルタリングのバグ修正。<br>原因:WP_Query の記述ミス。                                     |
