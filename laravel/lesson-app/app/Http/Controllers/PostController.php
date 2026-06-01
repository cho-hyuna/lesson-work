<?php

namespace App\Http\Controllers; //이 파일의 주소를 지정. App\Http\Controllers 폴더 안에 있는 파일

use App\Models\Post; //데이터베이스의 posts테이블과 연결된 post 모델을 이 파일에서 사용하겠다고 선언
use Illuminate\Http\Request; //사용자가 입력한 폼 데이터(제목, 내용)를 다루기 위해 Request클래스 가져옴

class PostController extends Controller//라라벨의 기본 컨트롤러 기능들을 상속받아 PostController라는 이름의 새로운 컨트롤러 정의
{
    public function create() //create메서드는 뷰 파일을 화면에 띄워 줌
    {
        return view('posts.create');
    }

    public function store(Request $request) //사용자가 작성한 폼 데이터를 &request변수로 받아서 저장 처리를 하는 store함수를 시작
    {
        $validated = $request->validate([ //사용자가 입력한 데이터가 올바른지 유효성 검사를 하고 통과한 데이터만 $validated 변수에 담음
            'title' => ['required', 'max:255'], //title은 필수 입력(required), 쵀대 255자까지 허용
            'body' => ['required'], //body본문은 필수 입력
        ]);

        $post = new Post(); //데이터베이스에 새로운 글을 저장하기 위해 Post모델의 비어있는 새로운 객체(인스턴스) 생성
        $post->title = $validated['title']; //방금 검사를 마친 안전한 제목과 본문을 title, body컬럼에 집어넣음
        $post->body = $validated['body'];
        $post->save(); //설정된 데이터들을 데이터베이스에 실제로 저장(SQL의 insert)

        return redirect('/posts/create')->with('message', '投稿を保存しました。'); 
        //저장이 끝나면 다시 글 작성 페이지(/posts/create)로 화면을 리다이렉트시키면서 성공 메시지를 세션에 임시로 저장자(with)
    }
}