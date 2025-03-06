<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller {
    public function register(Request $request) {
        $auth = new User(); //インスタンス化、新しいデータを保存する
        $auth->name = $request->name;
        $auth->email = $request->email; //入力されたタイトルを$authに代入
        $auth->password = Hash::make($request->password); //パスワードをハッシュ化(暗号化)
        $auth->save();

        return redirect('/');
    }

    public function signIn(Request $request) {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect('/');
        } else {
            return redirect('/auth/signIn');
        }
    }

    public function Logout() {
        Auth::logout();
        return redirect('/');
    }
}
