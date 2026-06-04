<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
</head>
<body>
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>

    <p><a href="/posts/{{ $post->id }}/edit">編集する</a></p>

    <form action="/posts/{{ $post->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">この投稿を削除する</button>
    </form>
    
    <p><a href="/posts">一覧へ戻る</a></p>
</body>
</html>