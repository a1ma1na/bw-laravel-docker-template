# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
SELECT * FROM `todos`;


### Todoモデルのallメソッドの返り値は何か
Illuminate\Database\Eloquent\Collectionクラスのインスタンス

Illuminate\Database\Eloquent\Collection {#261 ▼
  #items: array:2 [▼
    0 => App\Todo {#262 ▶}
    1 => App\Todo {#263 ▶}
  ]
}


### 配列の代わりにCollectionクラスを使用するメリットは
便利なメソッドが豊富、可読性と保守性の向上、安全性・堅牢性の向上

### view関数の第1・第2引数の指定と何をしているか
resources/views/ 配下のHTMLファイルを指定し、HTMLを返す。

### index.blade.phpの$todos・$todoに代入されているものは何か
todo = new Todo();


## Todo作成機能

### Requestクラスのallメソッドは何をしているか
フォームから送信された値を個別ではなく一括で取得する


### fillメソッドは何をしているか
Todoインスタンスの各プロパティに一括で代入


### $fillableは何のために設定しているか
一括代入には脆弱性があり、対策をせずに使用すると悪意のあるユーザに攻撃されてしまう恐れがあるため。


### saveメソッドで実行しているSQLは何か
INSERT INTO todo(content)


### redirect()->route()は何をしているか
todo.index のルートにページを移動させる


## その他

### テーブル構成をマイグレーションファイルで管理するメリット
データベースのスキーマ変更(データベースの構造を修正)をバージョン管理し、チーム内で効率的に共有できる


### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか
up()...php artisan migrate, php artisan db:migrate
down()...php artisan migrate:rollback, php artisan db:migrate:rollback


### Seederクラスの役割は何か
レコードの作成を担う


### route関数の引数・返り値・使用するメリット
('todo.create') ・ http://localhost:8080/todo/create ・ ルート名からそのルートで設定したURLを生成することができる


### @extends・@section・@yieldの関係性とbladeを分割するメリット
関係性...3つが組み合わさることで、レイアウトの再利用と、各ページで異なる部分を挿入できるようになる。
メリット...コードの再利用性の向上、保守性の向上、構造の整理、そして読みやすさの向上


### @csrfは何のための記述か
WebアプリケーションでCSRF攻撃を対策するための記述


### {{ }}とは何の省略系か
変数や値をHTMLに表示するための省略系