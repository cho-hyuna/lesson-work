<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LessonCrudFlowTest extends TestCase
{
    use RefreshDatabase; //테스트를 시작할 때 데이터베이스를 초기화하고, 테스트가 끝나면 입력했던 데이터를 전부 지워줌

    public function test_post_crud_flow_works(): void
    {
        $createResponse = $this->post('/posts', [ //생성create 검증
            'title' => '最初の投稿',
            'body' => 'LaravelのCRUDを確認する本文です。',
        ]);

        $createResponse->assertRedirect('/posts'); // /posts페이지로 리다이렉트 되었는지 확인
        $post = Post::query()->firstOrFail(); // DB에 방금 만든 게시물이 실제로 저장되었는지 확인

        $this->get('/posts') //목록 및 상세 조회Read 검증
            ->assertOk() //상태코드 200(정상)확인
            ->assertSee('最初の投稿'); //화면에 방금 만든 제목이 보이는지 확인

        $this->get('/posts/' . $post->id)
            ->assertOk()
            ->assertSee('LaravelのCRUDを確認する本文です。'); //상세 페이지에 본문이 보이는지 확인

        $updateResponse = $this->put('/posts/' . $post->id, [ //수정update 검증
            'title' => '更新後の投稿',
            'body' => '更新後の本文です。',
        ]);

        $updateResponse->assertRedirect('/posts/' . $post->id); //상세 페이지로 리다이렉트 확인

        $this->get('/posts/' . $post->id)
            ->assertOk()
            ->assertSee('更新後の投稿') //바뀐 제목이 보이는지 확인
            ->assertSee('更新後の本文です。'); //바뀐 본문이 보이는지 확인

        $deleteResponse = $this->delete('/posts/' . $post->id); //삭제delete 검증

        $deleteResponse->assertRedirect('/posts'); //목록 페이지로 리다이렉트 확인

        $this->get('/posts')
            ->assertOk()
            ->assertDontSee('更新後の投稿'); //목록에서 삭제된 글이 "안 보이는지" 확인
    }

    public function test_title_is_required_when_creating_post(): void //유효성validation 검증
    {
        $response = $this->post('/posts', [
            'title' => '', //일부러 제목을 비워둠
            'body' => 'タイトルなしの投稿です。',
        ]);

        $response->assertSessionHasErrors('title'); //title 필드에 에러가 발생했는지 확인
    }
}