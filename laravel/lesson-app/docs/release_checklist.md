# 公開前チェックリスト

## 基本確認

- [ ] `php artisan test` が成功する
- [ ] `php artisan route:list` で必要なURLを確認した
- [ ] `php artisan migrate:status` で migration の状態を確認した
- [ ] ブラウザで `/posts` の表示を確認した

## 環境設定

- [ ] `.env` を GitHub に push しない
- [ ] 本番では `APP_DEBUG=false` にする
- [ ] DB接続先を環境ごとに確認する
- [ ] APIキーやパスワードをコードに直接書かない

## 提出前

- [ ] `git status` で意図しないファイルがないことを確認した
- [ ] Pull Request に確認内容とスクリーンショットを載せた
- [ ] テスト結果を書いた