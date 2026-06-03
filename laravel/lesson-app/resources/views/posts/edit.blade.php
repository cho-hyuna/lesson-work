<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿を編集する</title>
</head>
<body>
    <h1>投稿を編集する</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/posts/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">タイトル</label>
            <input id="title" type="text" name="title" value="{{ old('title', $post->title) }}">
        </div>

        <div>
            <label for="body">本文</label>
            <textarea id="body" name="body">{{ old('body', $post->body) }}</textarea>
        </div>

        <button type="submit">更新する</button>
    </form>

    <p><a href="/posts/{{ $post->id }}">詳細へ戻る</a></p>
</body>
</html>