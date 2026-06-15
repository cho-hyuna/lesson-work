<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void //php artisan db:seed명령어 입력시 run()안의 코드 자동으로 실행
    {
        $posts = [
            [
                'title' => 'Laravelのルートを確認する',
                'body' => 'routes/web.php を読み、URLとControllerのつながりを確認します。',
            ],
            [
                'title' => 'Controllerの役割を整理する',
                'body' => 'Controllerはリクエストを受け取り、必要なデータを用意してViewへ渡します。',
            ],
            [
                'title' => 'Bladeで一覧を表示する',
                'body' => 'Bladeでは @forelse を使うと、データがある場合と空の場合を分けて表示できます。',
            ],
            [
                'title' => 'バリデーションを確認する',
                'body' => '入力値を保存する前に、空欄や長すぎる文字を防ぎます。',
            ],
            [
                'title' => '検索機能の準備をする',
                'body' => '複数の投稿があると、キーワード検索の動きを確認しやすくなります。',
            ],
            [
                'title' => 'ページネーションを試す',
                'body' => 'データが増えたときは、1ページに表示する件数を分けると見やすくなります。',
            ],
            [
                'title' => 'テストを実行する',
                'body' => 'php artisan test で、変更後もCRUDが壊れていないか確認します。',
            ],
            [
                'title' => '公開前チェックを残す',
                'body' => 'APP_DEBUGや.envなど、公開前に確認する項目を整理します。',
            ],
        ];

        foreach ($posts as $postData) { //데이터를 DB에 저장하는 반복문foreach
            $post = new Post(); //새로운 게시글(Post) 인스턴스 만들고
            $post->title = $postData['title']; //준비된 데이터의 title 집어넣고
            $post->body = $postData['body']; //준비된 데이터의 body 집어넣은 뒤
            $post->save(); //데이터베이스에 최종 저장insert
        }
    }
}