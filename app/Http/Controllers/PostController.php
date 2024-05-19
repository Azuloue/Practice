<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。

//Post一覧を表示する
 
 //@param Post Poseモデル
 //@return array Postモデルリスト


    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        //blade内で使う変数'posts'と設定。'posts'の中身にgetを使いインスタンス化した$postを代入。
        //$postの中身を戻り値にする。
        return view('posts.index')->with('posts',$post->getPaginateByLimit());
        //①return view('posts.index')->with('post',$post->getPaginateByLimit());
        //②return view('posts.index')->with('post',$post);
    }
    
        /**
     * 特定IDのpostを表示する
     *
     * @params Object Post // 引数の$postはid=1のPostインスタンス
     * @return Reposnse post view
     */
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function create()
    {
        return view('posts.create');
     
    }

    public function store(PostRequest $request, Post $post)
    {   

        $input = $request['post'];
        $post->title = $input["title"];
        $post->body = $input["body"];
        $post->save();
        //47〜50行目$post->fill($input)->save();でも可
        //$post->create($input)でも可
        return redirect('/posts/' . $post->id);
        //ルーティングの{id}部分は上記のように記載
    }
}