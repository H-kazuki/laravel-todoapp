## 名称
**TodoApp**

## 概要
基本的にCRUD機能を備えたToDoアプリ。  
優先度を指定することができ、優先度又は作成日時により並べ替えが可能。  
優先度によってソートできるToDoアプリが欲しいと思ったので作成しました。  

## アプリケーションの機能一覧
1. 新規登録機能
2. ログイン・ログアウト機能
3. タスクの表示・追加・削除
4. 優先度の指定
5. 並べ替え機能
6. ページネーション機能

## 環境
+ PC ・・・ Windows
+ 言語 ・・・　PHP(8.0.0)
+ フレームワーク　・・・　Laravel(6.20.8)
+ データベース　・・・　MySQL
+ テスト用データベース　・・・　SQLite

## アプリケーションの使い方
+ 「新規作成」から新規作成ページへ行き、タスクを作成する。  詳細は空欄可。
+ 優先度は「普通」を選択した場合は何も表示されないが、「優先」または「最優先」を選択した場合はタスクの右上に表示される。
+ 更新したい場合は、タスクの右下の「更新」から更新ページへ。  「新規作成」と同じフォームが表示されます。
+ 削除したい場合は、タスクの右下の「削除」から削除ページへ。  削除の最終確認を行います。
+ タスクの真上の並べ替えはボタンをクリックすることで優先度または作成日時を基準としてタスクを並べ替える。  
デフォルトは優先度。
+ 1ページあたり5つのタスクが表示でき、6つ目以降はページネーションされる。
