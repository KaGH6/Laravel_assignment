# 課題：ブログサイト作成

Laravel でブログサイトを作成しました。

## 作成内容
目次：

1. [Model：データベース作成](#anchor1)
2. [View：見栄えの実装](#anchor2)
3. [Controller：機能の実装](#anchor3)


##
<a id="anchor1"></a>
### 1. Model：データベース作成
1. 2025_03_03_101036_create_homes_table.phpを作成。
2. 記事のタイトル(title)、概要(articleAbout)、内容(article)、タグ(tags)、投稿日時、投稿者名(user_name) のデータを管理できるよう設定。
3. 記事にuser_idを持たせるよう設定。

##
<a id="anchor2"></a>
### 2. View：見栄えの実装

1. Viewsフォルダの中に、Home、CreateEdit Article, Article, Sign in, Sign up の計6ページを作成。
2. [RealWorld](https://github.com/gothinkster/realworld/tree/main) のドキュメントを参考に、HTML, CSSで見栄えを実装。
3. 各ページに共通する要素（Head, Header や Footer など）を layout.blade.php にまとめ、Views > components ディレクトリで管理。
4. 各ページに layout.blade.php の内容が反映されるようタグ付け。
5. public > add.css を作成し、ホーム画面の Create ボタンの見栄えを調整。

各Viewファイルについて

| ファイル名        | 概要                                                                                                    | 
| :---------------- | ------------------------------------------------------------------------------------------------------- | 
| home.blade.php    | ホーム画面。ブログの一覧が閲覧できる。                                                                  | 
| create.blade.php  | 記事の新規作成画面。ホーム画面のcreateボタンからアクセス可。ここで作成した記事がホームに反映される。    | 
| article.blade.php | ホーム画面で選択した特定の記事を表示する画面。                                                          | 
| edit.blade.php    | 記事の編集画面。ホーム画面で投稿者名をクリック、もしくはarticle画面のEdit Articleボタンからアクセス可。 | 
| signUp.blade.php  | ユーザーの新規登録を行う画面。登録後、ログイン状態でホーム画面に遷移する。                              | 
| signIn.blade.php  | ユーザーのログイン画面。ログイン後、ホーム画面に遷移する。画面右上のLogoutボタンでサインアウト可。      | 




##
<a id="anchor3"></a>
### 3. Controller：機能の実装
#### ルーティング (web.php)：
- 各6ページ分のルーティング処理を記述。

#### コントローラー：

- HomeController.php：
home.blade.php, create.blade.php, edit.blade.php, article.blade.php の動作を制御するコードを記述。
indexメソッド、createメソッド、showメソッド、editメソッド、storeメソッド、updateメソッド、destroyメソッドを定義。

| メソッド名      | 概要                                                                              | 
| --------------- | --------------------------------------------------------------------------------- | 
| indexメソッド   | ホーム画面で記事を５件ずつ取得するよう設定。                                      | 
| createメソッド  | create.blade.php の処理内容をルートファイルに渡す処理を記述。                     | 
| showメソッド    | 記事のidに対応するHomeモデルのデータを取得し、article.blade.phpに返す処理を記述。 | 
| editメソッド    | 記事のidに対応するHomeモデルのデータを取得し、edit.blade.phpに返す処理を記述。    | 
| storeメソッド   | 入力された記事の情報を保存し、保存後にホーム画面へ遷移するよう設定。              | 
| updateメソッド  | 記事の変更内容を保存し、保存後にホーム画面へ遷移するよう設定。                    | 
| destroyメソッド | 指定された記事を削除し、削除後にホーム画面へ遷移するよう設定。                    | 


<br>

- AuthController.php：
signOut.blade.php, signIn.blade.php の動作を制御するコードを記述。

| メソッド名       | 概要                                                                                                   | 
| ---------------- | ------------------------------------------------------------------------------------------------------ | 
| registerメソッド | 新規登録されたユーザー情報を保存するよう設定。                                                         | 
| signInメソッド   | メールアドレスとパスワードの入力でログインできる処理を記述。ログイン後にホーム画面へ遷移するよう設定。 | 
| Logoutメソッド   | ログアウトできる処理を記述。ログアウト後にホーム画面へ遷移するよう設定。                               | 

