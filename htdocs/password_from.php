<?php
//phpinfo();
//  db 호출 후 값 가져와서 테이블안에 값 밀어 넣기 .

$id = $_GET['id'];
//
//$conn = new mysqli('localhost', 'root', '', 'study');
//// select 는 테이블을 조회하는 쿼리,
//$query = "SELECT * FROM board WHERE id = {$id}" ;
//$result = $conn->query($query);
//$list = $result->fetch_all(MYSQLI_ASSOC);

//print_r($list);
//
//if(isset($$_GET['mode']))
//    $mode - $_GET["mode"];
//else
//    $mode="";
//
//if(isset($_GET[]))

session_start();
header('Content-Type: text/html; charset=utf-8');


$db = new mysqli("localhost", "root", "", "study");
$db->set_charset("utf8");


$author = $row['author'];
$pass = $_POST['pass'];
$title = $_POST['title'];
$content = $_POST['content'];

// 게시글 데이터 삽입
$sql = "INSERT INTO board (author, pass, title, content, created_at) VALUES ('$author','$pass','$title', '$content',now())";


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
                <h1><img src="/dashboard/images/xampp-logo.svg"/>수정 페이지 입니다.</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
             <div class="row">
                <div class="large-12 columns">
                    <table class="tg">
                        <form action="index.php" method="post">
                            <!-- 게시글 ID를 hidden으로 전달 -->
                            <input type="hidden" name="id" value="<?php echo $no['id']; ?>">
                            <h3>글 작성시 비밀번호를 입력해주세요</h3>
                            <?php
                                if($php_errormsg=="y"){
                                    echo "<p>*비밀번호가 다릅니다. 다시 입력해주세요!!</p>";
                            ?>
                            <label for="title">비밀번호:</label><br>
                            <input type="password" id="pass" name="pass" value="<?php echo $pass; ?>"><br>

                            <input type="submit" value="확인">
                        </form>
                    </table>
                </div>
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