<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿フォーム</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="app-body">
    <main class="page-shell narrow-shell">
        <section class="card stack-lg">
            <div class="stack-sm">
                <p class="eyebrow">第4章</p>
                <h1 class="page-title">投稿フォーム</h1>
                <p class="page-text">タイトルと本文を入力して、投稿データを保存します。</p>
            </div>

            @if (session('message'))
                <div class="alert success-alert">{{ session('message') }}</div>
            @endif

            @if ($errors->any())
                <ul class="alert error-alert stack-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="/posts" method="POST" class="stack-md">
                @csrf

                <div class="field">
                    <label class="field-label" for="title">タイトル</label>
                    <input class="field-input" id="title" type="text" name="title" value="{{ old('title') }}">
                </div>

                <div class="field">
                    <label class="field-label" for="body">本文</label>
                    <textarea class="field-input field-textarea" id="body" name="body">{{ old('body') }}</textarea>
                </div>

                <div class="actions">
                    <button class="primary-button" type="submit">送信</button>
                    <a class="button-link secondary-button" href="/posts">一覧へ戻る</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>