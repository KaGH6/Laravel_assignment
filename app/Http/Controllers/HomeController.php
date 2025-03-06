<?php
// コントローラーファイルは機能をつけるため
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    // Display a listing of the resource.
    // public function index() {
    //     $homes = Home::all(); //記事を全件取得
    //     return view('home', compact('homes'));
    //     //compact：$homeをviewに渡す。viewでDBの内容が扱えるようになる。
    // }

    public function index() {
        // ページネーションを使用して5件ずつ取得
        $homes = Home::paginate(5);

        // ビューにデータを渡す
        return view('home', compact('homes'));
    }


    // Show the form for creating a new resource.
    public function create() {
        return view('create');
    }

    // Show the article
    public function show($id) {
        $home = Home::find($id);
        return view('article', compact('home'));
    }

    // Show the form for editing the specified resource.
    public function edit($id) {
        $home = Home::find($id);
        return view('edit', compact('home'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request) {
        $home = new Home(); //インスタンス化、新しいデータを保存する
        $home->title = $request->title; //入力されたタイトルを$homeに代入
        $home->articleAbout = $request->articleAbout;
        $home->article = $request->article;
        $home->tags = $request->tags;
        $home->user_id = Auth::id();
        $home->user_name = Auth::user()->name;
        $home->save();

        return redirect('/');
    }

    // update
    public function update(Request $request, string $id) {
        $home = Home::find($id);
        $home->title = $request->title; //変更
        $home->articleAbout = $request->articleAbout;
        $home->article = $request->article;
        $home->tags = $request->tags;

        $home->save(); //指定されたidのデータを保存
        return redirect("/");
        // redirect保存した後のルートの選択
    }

    // delete
    public function destroy(string $id) {
        $home = Home::find($id);
        $home->delete();
        return redirect("/");
    }
}
