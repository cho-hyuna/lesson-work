<?php

namespace App\Http\Controllers; //이 파일의 주소를 지정. App\Http\Controllers 폴더 안에 있는 파일

use App\Models\Post; //데이터베이스의 posts테이블과 연결된 post 모델을 이 파일에서 사용하겠다고 선언
use Illuminate\Http\Request; //사용자가 입력한 폼 데이터(제목, 내용)를 다루기 위해 Request클래스 가져옴

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
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
}