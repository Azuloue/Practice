<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">Edit post</h1>
        <div class="content">
            <form action="/posts/{{$post->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="content__title">
                <h2>タイトル</h2>
                <input type="text" name="post[title]" value="{{$post->title}}"
            </div>
            <p class="title__error" style="color:red">
                {{ $errors->first('post.title') }}
            </p>
            <div class="content__body">
                <h2>本文</2><br>
                <input type ='text' name=post[body]" value="{{$post->body}}">
            </div>
            <p class="body__error" style="color:red">
                {{$errors->first('post.body')}}
            </p>
            <input type="submit" value="Update"/>
            </form>
        </div>
        <div class="footer">
            <a href="/posts/{{$post->id}}">back</a>
        </div>
    </body>
</html>