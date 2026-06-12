<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿を編集する</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="app-body">
    <main class="page-shell narrow-shell">
        <section class="card stack-lg">
            <div class="stack-sm">
                <p class="eyebrow">第7章</p>
                <h1 class="page-title">投稿を編集する</h1>
                <p class="page-text">今ある投稿の内容を直して、更新処理の流れを確認します。</p>
            </div>

            @if ($errors->any())
                <ul class="alert error-alert stack-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="/posts/{{ $post->id }}" method="POST" class="stack-md">
                @csrf
                @method('PUT')

                <div class="field">
                    <label class="field-label" for="title">タイトル</label>
                    <input class="field-input" id="title" type="text" name="title" value="{{ old('title', $post->title) }}">
                </div>

                <div class="field">
                    <label class="field-label" for="body">本文</label>
                    <textarea class="field-input field-textarea" id="body" name="body">{{ old('body', $post->body) }}</textarea>
                </div>

                <div class="actions">
                    <button class="primary-button" type="submit">更新する</button>
                    <a class="button-link secondary-button" href="/posts/{{ $post->id }}">詳細へ戻る</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>