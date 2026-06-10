-- Laravel: Post::all();
-- 目的: posts テーブルの全件を取り出す
SELECT * FROM posts;

-- Laravel: Post::find(1);
-- 目的: id が 1 の投稿を1件取り出す
SELECT * FROM posts WHERE id = 1;

-- Laravel: Post::orderBy('created_at', 'desc')->limit(10)->get();
-- 目的: 新しい投稿を10件取り出す
SELECT * FROM posts ORDER BY created_at DESC LIMIT 10;

-- Laravel: Post::count();
-- 目的: 投稿件数を数える
SELECT COUNT(*) FROM posts;

-- Laravel: Post::select('title')->get();
-- 目的: titleカラムだけ取り出す
SELECT title FROM posts;