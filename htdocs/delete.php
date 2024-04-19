<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$conn = new mysqli("localhost", "root", "", "study");


// 게시글 삭제할 ID 수신
$id = isset($_GET['id']) ? $_GET['id'] : '';

// 게시물 삭제 쿼리
$query = "DELETE FROM board WHERE id = $id";
$result = $conn->query($query);


if ($result === TRUE) {
    echo "게시글이 성공적으로 삭제되었습니다.";
    // 리스트 페이지로 리다이렉트 또는 다른 페이지로 이동
    header("Location: index.php");
    exit;
} else {
    echo "게시글 삭제 중 오류가 발생했습니다: " . $conn->error;
}


?>
