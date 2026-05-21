<?php
$name = trim($_POST['name'] ?? ''); //사용자가 폼에 입력해서 전송한 '이름'데이터
//trim(...) 사용자가 실수로 스페이스바만 입력했을 경우를 대비해, 앞뒤 불필요한 공백을 잘라내주는 안전장치 함수
$comment = trim($_POST['comment'] ?? ''); //??(NULL 병합 연산자)-> 만약 페이지에 처음 접속해서 $_POST['name']값이 아예 존재하지 않는 상태라면, 에러를 내는 대신 빈 문자열''을 기본값으로 집어 넣음
$email = trim($_POST['email'] ?? '');
$errors = []; //에러 메시지들을 담아두기 위해 미리 준비한 배열 바구니

if ($_SERVER['REQUEST_METHOD'] === 'POST'){ //사용자가 페이지를 그냥 연 것인지(GET) 제출 버튼을 눌러 데이터를 보낸 것인지(POST) 확인하는 조건문
    if ($name === ''){
        $errors[] = '名前を入力してください。';
    }
    
    if ($comment === ''){
        $errors[] = 'コメントを入力してください。';
    }
    
    if($email === ''){
        $errors[] = 'メールを入力してください。';
    }
}
// 사용자가 입력한 데이터를 받는 서버, 입력 받은 것을 확인하고 에러인지 아닌지 판단, 에러메시지를 준비하는 곳


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHPフォーム受け取り</title>
</head>
<body>
    <h1>PHPフォーム受け取り</h1>

    <?php if ($errors !== []): ?> <!--에러 메시지가 하나라도 담겨있다면 아래 html을 화면에 그리기, :는 HTML과 섞어 쓰기 위한 PHP문법-->
        <ul> <!--HTML의 순서 없는 목록(bullet points)을 시작하는 태그 -->
            <?php foreach ($errors as $error): ?> 
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li> <!--list-->
            <!--htmlspecialchars: 보안 함수, 입력창에 악의적인 자바스크립트 코드를 넣어 해킹을 시도할 때, 이를 단순한 글자 형채로 바꿔서 무력화시키는 대형 필터-->
            <!--$error: 필터 안에 들어갈 알맹이, ENT_QUOTES: 사용자가 입력한 값 중 「'」나「"」가 있으면 해킹 코드로 작동하지 못하게 일반 글자로 바꿈-->
            <?php endforeach; ?> <!--php의 반복문이 끝나고 다시 일반 html 영역이 시작된다고 알려줌-->
        </ul>
    <?php endif; ?>
    <!--서버로부터 결과를 받고 에러가 하나라도 있으면 화면에 에러 메시지를 출력하는 곳-->


    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $errors === []): ?> 
        <p>受け取りました。</p>
        <p>名前: <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>コメント: <?php echo nl2br(htmlspecialchars($comment, ENT_QUOTES, 'UTF-8'));?></p>
        <p>メール: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>
        <!--n12br: 문자열 속 줄바꿈 문자\n을 HTML의 줄바꿈 태그<br />로 알아서 바꿔줌. 사용자가 쓴 대로 줄바꿈이 보이게 해주는 함수. 반드시 htmlspecialchars로 감싼 후 사용-->
    <?php endif; ?>
    <!--사용자가 제출 버튼을 눌렀고 빠뜨린 항목 없이(에러x) 입력했다면, 사용자가 입력했던 결과(데이터)를 화면에 출력하는 역할(전송 성공 화면)-->

    <form action="" method="POST">
        <div>
            <label for="name">名前</label>
            <input id="name" type="text" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">
            <!--name="name": 여기서 정한 이름(name) 그대로 서버에 전달되기 때문에, php코드 쪽에서 $_POST['name']으로 데이터를 꺼내 쓸 수 있는 것-->
            <!--value=... 사용자가 입력했던 값을 입력창에 그대로 남겨두는 역할-->
        </div>
        
        <div>
            <label for="comment">コメント</label>
            <textarea id="comment" name="comment"><?php echo htmlspecialchars($comment, ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>

        <div>
            <label for="email">メール</label>
            <input id="email" type="text" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        
        <button type-"submit">送信する</button> <!--버튼을 누르면 <form> 태그에 설정된 규칙 method="POST"에 따라 사용자가 입력한 데이터를 서버로 전송-->
    </form>
    <!--이름 및 코멘트 다는 부분을 꾸미는 역할-->
</body>
</html>
