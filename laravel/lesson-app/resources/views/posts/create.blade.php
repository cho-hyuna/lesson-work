<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿フォーム</title>
</head>
<body>
    <h1>投稿フォーム</h1>

    @if (session('message')) <!--만약 세션에 message 값이 존재하면(컨트롤러에서 .with('message', '...'))-->
        <p>{{ session('message') }}</p> <!--화면에 그 메시지 내용을 텍스트로 보여줌-->
    @endif

    @if ($errors->any()) <!--만약 유효성 검사를 통과하지 못해 에러가 하나라도 존재한다면, 순서 없는 목록 ul만들기 시작-->
        <ul>
            @foreach ($errors->all() as $error) <!--발생한 모든 에러 메시지들을 하나씩 꺼내 반목문 돌려 리스트 항목으로 출력-->
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/posts" method="POST"> <!--/사용자가 작성한 데이터를 /posts라는 주소로, POST방식을 통해 서버로 보내겠다는 폼 태그를 시작-->
        @csrf <!--라라벨에서 가장 중요한 보안 기능. 사이트 간 요청 위조 공격을 막기 위해 라라벨이 자동으로 랜덤한 보안 토큰을 폼 안에 숨겨서 생성해 줌-->

        <div>
            <label for="title">タイトル</label>
            <input id="title" type="text" name="title" value="{{ old('title') }}">
            <!--value="{{old('title')}}"유효성 검사에서 에러가 나서 원래 화면으로 튕겼을 때, 사용자가 방금 전 입력햇던 글자를 그대로 지워지지 않게 유지해 줌-->
        </div>

        <div>
            <label for="body">本文</label>
            <textarea id="body" name="body">{{ old('body') }}</textarea>
        </div>

        <button type="submit">送信</button> <!--버튼 누르면 폼 데이터가 서버로 전송-->
    </form>
</body>
</html>