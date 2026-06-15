<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="app-body">
    <main class="page-shell narrow-shell">
        <section class="card stack-lg">
            @if (session('message'))
                <div class="alert success-alert">{{ session('message') }}</div>
            @endif

            <div class="stack-sm">
                <p class="eyebrow">第6章〜第8章</p>
                <h1 class="page-title">{{ $post->title }}</h1>
                <p class="post-body">{{ $post->body }}</p>
            </div>

            <div class="actions">
                <a class="button-link secondary-button" href="/posts/{{ $post->id }}/edit">編集する</a>

                <form class="inline-form" action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="danger-button" type="submit">この投稿を削除する</button>
                </form>
            </div>

            <p><a class="text-link" href="/posts">一覧へ戻る</a></p>
        </section>
    </main>
</body>
</html>
