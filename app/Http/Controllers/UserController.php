<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * コンストラクタ定義
     * ポリシーを使用できるようにする
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * マイページ画面表示
     *
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $articles = Article::where('user_id', $user->id)->get();
        return view('user.mypage', compact('user', 'articles'));
    }

    /**
     * ユーザー情報編集画面表示
     *
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * ユーザー情報編集処理
     *
     * @param  App\Http\Requests\UserRequest  $request
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        DB::transaction(function () use ($user, $request) {
            $user->fill($request->all())->save();            
        });

        return redirect()->route('user.show', $user)->with('flashMsg',  'ユーザー情報を編集しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
