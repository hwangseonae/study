<?php
session_start();
header('Content-Type: text/html; charset=utf-8');


$db = new mysqli("localhost","root","","study");
$db->set_charset("utf8");


// POST 데이터 수신
$author = $_POST['author'];
$pass = $_POST['pass'];
$title = $_POST['title'];
$content = $_POST['content'];

// 게시글 데이터 삽입
$sql = "INSERT INTO board (author, pass, title, content, created_at) VALUES ('$author','$pass','$title', '$content',now())";


if ($db->query($sql) === TRUE) {
    echo "게시글이 성공적으로 작성되었습니다.";
//    // 글쓰기 페이지로 리다이렉트 또는 다른 페이지로 이동
    header("Location: list.php");
   exit;
} else {
    echo "게시글 작성 중 오류가 발생했습니다: " . $db->error;
}

// 데이터베이스 연결 해제
//$con->close();
mysqli_close($db);

// 목록페이지 이동
/*echo "<script>
    location.href = 'list.php'; 
    </script>";*/


?>
