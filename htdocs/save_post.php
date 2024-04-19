<?php
// 데이터베이스 연결
$conn = new mysqli('localhost', 'root', '', 'study');

// POST 데이터 수신
$title = $_POST['title'];
$content = $_POST['content'];

// 게시글 데이터 삽입
$sql = "INSERT INTO board (title, content) VALUES ('$title', '$content')";
//
//if ($conn->query($sql) === TRUE) {
//    echo "게시글이 성공적으로 작성되었습니다.";
//    // 글쓰기 페이지로 리다이렉트 또는 다른 페이지로 이동
//   // header("Location: write_post.php");
//    exit;
//} else {
//    echo "게시글 작성 중 오류가 발생했습니다: " . $conn->error;
//}

// 데이터베이스 연결 해제
$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Welcome to XAMPP</title>

    <meta name="description"
          content="XAMPP is an easy to install Apache distribution containing MariaDB, PHP and Perl."/>
    <meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution"/>

    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css"/>
    <link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css"/>
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>

    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>


    <link href="/dashboard/images/favicon.png" rel="icon" type="image/png"/>


</head>

<body class="index">
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=277385395761685";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<header class="header contain-to-grid">
    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="toggle-topbar menu-icon">
                <a href="#">
                    <span>Menu</span>
                </a>
            </li>
        </ul>

        <section class="top-bar-section">
            <!-- Left Nav Section -->
            <!--
                <ul class="left">
                 <li class="item "><a href="/dashboard/howto.html">게시판 리스트_목록</a></li>
                    <li class="item "><a href="">게시판 리스트_목록</a></li>
                   <li class="item "><a href="">게시판 리스트_글쓰기</a></li>
                   <li class="item "><a target="_blank" href="">게시판 리스트_3</a></li>
                   <li class="item "><a href="">게시판 리스트_4</a></li>
            </ul>
            -->
        </section>
    </nav>
</header>

<div class="wrapper">
    <div class="hero">
        <div class="row">
            <div class="large-12 columns">
                <h1><img src="/dashboard/images/xampp-logo.svg"/>공지사항 글쓰기 페이지 입니다.</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <table class="tg">
                <form action="save_post.php" method="post">
                <!--    <form action="save_post.proc.php" method="post">-->
                    <label for="title">제목:</label><br>
                    <input type="text" id="title" name="title"><br>
                    <label for="content">내용:</label><br>
                    <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>
                    <label for="author">작성자:</label><br>
                    <input type="text" id="author" name="author"><br><br>
                    <input type="submit" value="게시글 작성">

                </form>

            </table>

            <div>
                <a href="/index.php">
                    <button>목록</button>
                </a>
            </div>
        </div>
    </div>

</div>

<footer class="footer row">
    <div class="columns">
    </div>
</footer>

<!-- JS Libraries -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="/dashboard/javascripts/all.js" type="text/javascript"></script>
</body>
</html>


