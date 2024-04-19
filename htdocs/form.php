<?php
// 데이터베이스 연결

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title> </title>

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
        function check_input(){
            if($("#author").val() == ""){
                alert("아이디 입력하세요!");
                $("#author").focus();
                return false;
            }
            if(!document.board.pass.value){
                alert(" 비밀번호를 입력하세요!");
                document.board.pass.value.focus();
                return;
            }
            if(!document.board.title.value){
                alert("제목을 입력하세요!");
                document.board.title.value.focus();
                return;
            }
            if(!document.board.content.value){
                alert("내용을 입력하세요!");
                document.board.content.value.focus();
                return;
            }

            document.board.submit();
        }
    </script>

</head>

<body class="index">
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
                <h1>공지사항 글쓰기 페이지 입니다.</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <table class="tg">
                <form name="board" action="insert.php" method="post">

                    <ul>
                        <li>
                            <span>이름 :  </span>
                            <span> <input type="text" id="author" name="author"></span>
                        </li>
                        <li>
                            <span>비밀번호 :  </span>
                            <span> <input type="password" id="pass"  name="pass"></span>
                        </li>
                        <li>
                            <span>제목 :  </span>
                            <span> <input type="text" id="title" name="title"></span>
                        </li>
                        <li>
                            <span>내용:  </span>
                            <span> <input id="content" name="content" ></span>
                        </li>

                    </ul>
                </form>

            </table>

            <div>
                <button type="button" onclick="check_input()">저장하기</button>
                <button type="button" onclick="location.href='/index.php'">목록</button>
            <!--    <input type="submit" value="저장하기"> -->

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


