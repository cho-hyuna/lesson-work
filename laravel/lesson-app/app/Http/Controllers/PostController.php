<?php

namespace App\Http\Controllers; //이 파일의 주소를 지정. App\Http\Controllers 폴더 안에 있는 파일

use App\Models\Post; //데이터베이스의 posts테이블과 연결된 post 모델을 이 파일에서 사용하겠다고 선언
use Illuminate\Http\Request; //사용자가 입력한 폼 데이터(제목, 내용)를 다루기 위해 Request클래스 가져옴

class PostController extends Controller
{
    public function index(Request $request)
{
    $keyword = $request->query('keyword');
    // URL 주소창에서 ?keywork=검색어 형식으로 들어온 값을 읽어옴(없으면 null)

    $posts = Post::query()
        ->when($keyword, function ($query, $keyword) { // $keyword에 값이 있을 때만 이 안의 쿼리(조건) 추가
            $query->where('title', 'like', '%' . $keyword . '%');
            // 제목(title)에 검색어가 포함된 것(%검색어%)만 찾기(LIKE 검색)
        })
        ->latest() //최신순으로 정렬
        ->paginate(5) //get()이 아닌 paginate(5)는 한 페이지에 5건만 가져옴
        ->withQueryString();
        //->get(); //최종 결과 DB에서 가져오기

    return view('posts.index', compact('posts', 'keyword'));
    //가져온 게시글 목록($posts)과 사용자가 입력했던 검색어($keyword)를 화면에 넘겨줌
}


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->save();

        return redirect('/posts')->with('message', '投稿を保存しました。');
    }
    
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

     public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'=>['required', 'max:255'],
            'body'=>['required'],
        ]);

        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->save();

        return redirect('/posts/' . $post->id)->with('message', '投稿を更新しました。');
    }
    
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts')->with('message', '投稿を削除しました。');
    }
}