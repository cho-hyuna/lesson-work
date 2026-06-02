<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿一覧</title>
</head>
<body>
    <h1>投稿一覧</h1>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <p><a href="/posts/create">新しい投稿を作る</a></p>

    @forelse ($posts as $post)
        <article>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->body }}</p>
        </article>
        <hr>
    @empty
        <p>まだ投稿がありません。</p>
    @endforelse
</body>
</html>
