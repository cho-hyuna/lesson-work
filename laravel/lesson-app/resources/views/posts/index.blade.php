<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿一覧</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="app-body">
    <main class="page-shell">
        <section class="card stack-lg">
            <div class="heading-row">
                <div class="stack-sm">
                    <p class="eyebrow">第5章〜第8章</p>
                    <h1 class="page-title">投稿一覧</h1>
                    <p class="page-text">保存した投稿を一覧で確認し、詳細、編集、削除へ進める画面です。</p>
                </div>

                <div class="actions">
                    <a class="button-link secondary-button" href="/about">Aboutページ</a>
                    <a class="button-link" href="/posts/create">新しい投稿を作る</a>
                </div>
            </div>

            @if (session('message'))
                <div class="alert success-alert">{{ session('message') }}</div>
            @endif

            <div class="post-list">
                @forelse ($posts as $post)
                    <article class="post-card stack-sm">
                        <h2 class="post-title">
                            <a class="post-link" href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                        <p class="post-body">{{ $post->body }}</p>
                    </article>
                    <hr class="divider">
                @empty
                    <div class="empty-state">まだ投稿がありません。</div>
                @endforelse
            </div>
        </section>
    </main>
</body>
</html>