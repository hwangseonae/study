<?php
// MySQL 데이터베이스 연결
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'study';
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// 데이터베이스 연결 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// POST 데이터 수신
$title = $_POST['title'];
$content = $_POST['content'];


// 게시글 데이터 삽입
$sql = "INSERT INTO board (title, content) VALUES ('$title', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "게시글이 성공적으로 작성되었습니다.";

    // todo 목록으로 보내기 해야함 index로 다시 보내기
} else {
    echo "게시글 작성 중 오류가 발생했습니다: " . $conn->error;
    // todo 글쓰기 화면이나 index 화면으로 보내기 .
}

// 데이터베이스 연결 해제
$conn->close();





?>

