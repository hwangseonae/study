<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

// 데이터베이스 연결
$db = new mysqli("localhost", "root", "", "study");
$db->set_charset("utf8");



// 게시글 수정할 ID 수신
$id = isset($_GET['id']) ? $_GET['id'] : '';


// 입력값 가져오기
$author = isset($_POST['author']) ? $_POST['author'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
$title = isset($_POST['title']) ? $_POST['title'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';

// 입력값의 유효성 검사
if (empty($author) || empty($pass) || empty($title) || empty($content)) {
    echo "모든 필드를 입력해주세요.";
    exit;
}

// SQL Injection 방지를 위해 입력값 이스케이프
$author = $db->real_escape_string($author);
$pass = $db->real_escape_string($pass);
$title = $db->real_escape_string($title);
$content = $db->real_escape_string($content);

// 게시물 수정 쿼리 실행
$sql = "UPDATE board SET author = '$author', pass = '$pass', title = '$title', content = '$content' WHERE id = $id";
//$sql = "INSERT INTO board (author, pass, title, content, created_at) VALUES ('$author','$pass','$title', '$content',now())";

//$sql = "UPDATE INTO board (author, pass, title, content, created_at) VALUES ('$author','$pass','$title', '$content',now())";

if ($db->query($sql) === TRUE) {
    echo "게시글이 성공적으로 수정되었습니다.";
// 수정한 페이지로 리다이렉트 또는 다른 페이지로 이동
    header("Location: list.php");
    exit;
} else {
    echo "게시글 수정 중 오류가 발생했습니다: " . $db->error;
}

// 데이터베이스 연결 해제
$db->close();
?>?>