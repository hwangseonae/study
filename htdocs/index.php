<?php
//phpinfo();
//  db 호출 후 값 가져와서 테이블안에 값 밀어 넣기 .

$conn = new mysqli('localhost', 'root', '', 'study');
// select 는 테이블을 조회하는 쿼리,
$query = "SELECT * FROM board";
//p($query);
$result = $conn->query($query);
$list = $result->fetch_all(MYSQLI_ASSOC);

//print_r($list);
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


</head>
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
               <!--     <span>Menu</span> -->
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
                <h1>공지사항 게시판 입니다</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <table class="tg">
                <thead>
                <tr>
                    <th width="70">번호</th>
                    <th width="500">제목</th>
                    <th width="120">글쓴이</th>
                    <th width="100">작성일</th>
                </tr>
                </thead>

                <!--$list를 포문 돌려서 해댕 값을 아래 테이블에 넣으면 조회는 끝-->
                <?php
                if (is_array($list)) {
                    if (!empty($list)) {
                   //  $no = $total-$offset;
                        foreach ($list as $value) {
                            $no = $value['id'];                                   // 번호
                            $author = $value['author'];                           // 글쓴이
                            $title = $value['title'];                             // 제목
                            $content = $value['content'];                         // 내용

                            $created_at = date('Y-m-d', strtotime($value['created_at']));  // 작성일
                            echo <<<END
                        <tr>             
                            <td width="70">{$no}</td>
                            <td width="500"><a href="./view.php?id={$no}">{$title}</a></td>
                            <td width="120"><a href="">{$author}</a></td>
                            <td width="100"><a href="">{$created_at}</a></td>
                        </tr>
END;
                            $no --;
                        }                    }else{
                        echo <<<END
                            <tr>
                                <td colspan="20">게시글이 없습니다.</td>
                            </tr>
END;
                    }
                }
                ?>
                </tbody>
            </table>

            <div>
                <a href="./form.php">
                    <button>글쓰기</button>
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


