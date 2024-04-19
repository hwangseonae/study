<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

// 데이터베이스 연결
$conn = new mysqli('localhost', 'root', '', 'study');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 게시글 ID 수신
$id = isset($_GET['id']) ? $_GET['id'] : '';
$id = $conn->real_escape_string($id);

// 게시물 정보 조회
$query = "SELECT * FROM board WHERE id = '$id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $author = $row['author'];
    $pass = $row['pass'];
    $title = $row['title'];
    $content = $row['content'];
} else {
    echo "게시글을 찾을 수 없습니다.";
    exit;
}

// 데이터베이스 연결 종료
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
    <title></title>
    <meta name="description"
          content="XAMPP is an easy to install Apache distribution containing MariaDB, PHP and Perl."/>
    <meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution"/>
    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css"/>
    <link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css"/>
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>
    <link href="/dashboard/images/favicon.png" rel="icon" type="image/png"/>

    <script>
        function check_password(mode, id){
           //mode : modify(수정) delete(삭제), id
            window.open("password_from.php?mode="+mode+"&id="+id,"pass_check", "left=700, top=300, whith=550, height=150,scrollbars=no,resizable=yes");
        }
    </script>

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
                <h1><img src="/dashboard/images/xampp-logo.svg"/>공지사항 상세페이지 입니다.</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">


            <div class="row">
                <div class="large-12 columns">
                    <table class="tg">
                        <form name="board" action="modify_from.php?id=<?php echo $id; ?>" method="post" >

                            <ul>
                                <li>
                                    <span>이름 :  </span>
                                    <span> <input type="text" id="author" name="author" value="<?php echo $author; ?>"></span>
                                </li>
                                <li>
                                    <span>비밀번호 :  </span>
                                    <span> <input type="password" id="pass"  name="pass"  value="<?php echo $pass; ?>"></span>
                                </li>
                                <li>
                                    <span>제목 :  </span>
                                    <span> <input type="text" id="title" name="title" value="<?php echo $title; ?>" ></span>
                                </li>
                                <li>
                                    <span>내용:  </span>
                                    <textarea id="content" name="content" rows="4" cols="50"><?php echo $content; ?></textarea><br><br>
                                </li>
                                <li>
                                    <a href="/list.php"><button type="button">목록</button></a>
                                    <input type="submit" value="수정">
                                    <a href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('정말로 삭제하시겠습니까?');"><button type="button">삭제하기</button></a>
                                </li>
                            </ul>
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


