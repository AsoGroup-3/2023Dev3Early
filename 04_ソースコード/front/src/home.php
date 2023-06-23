<!DOCTYPE html>
<html lang="ja">

<?php
require "../components/header.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    <title>Document</title>
</head>

<body class="background">
    <div class="img_center">
        <a href=""><img class="home_icon_img" src="../assets/img/icon.png"> </a>
    </div>

    <div class="explanation">
        <p>「レスバ」から「レスバ」までを手広くレスバするレスバ専用</p>
        <p>専用掲示板群「レスバ・オブザ・リング」へようこそ！</p>
        <p>「レスバ」って何？という方はウィキペディアをご覧ください</p>
    </div>

    <div class="input-group" style="width:300px;">
        <input type="text" class="form-control" placeholder="">
        <span class="input-group-btn">
            <button type="button" class="btn btn-default" onclick="location.href='./serarchResult.html'">
                <i class="bi bi-search"></i>
            </button>
        </span>
    </div>

    <div class="img_center">
        <img class="home_top_img" src="../assets/img/yanagawa_Vs.png">
    </div>

    <h1>
        <p class="text-center">新着スレ一覧</p>
    </h1>

    <!-- 仮コード　後でVew.jsのループを使ったコードに書き換える -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <a href="">お前らと柳川川下り行きたい1(8)</a>
                <p>2023年05月26日 10:19</p>
                <p>8.0日</p>
            </div>

            <div class="col-md-6">
                <a href="">お前らと柳川川下り行きたい1(8)</a>
                <p>2023年05月26日 10:19</p>
                <p>8.0日</p>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-6">
                <a href="">お前らと柳川川下り行きたい1(8)</a>
                <p>2023年05月26日 10:19</p>
                <p>8.0日</p>
            </div>

            <div class="col-md-6">
                <a href="">お前らと柳川川下り行きたい1(8)</a>
                <p>2023年05月26日 10:19</p>
                <p>8.0日</p>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-6">
                <a href="">お前らと柳川川下り行きたい1(8)</a>
                <p>2023年05月26日 10:19</p>
                <p>8.0日</p>
            </div>

            <div class="col-md-6">
                <a href="">お前らと柳川川下り行きたい1(8)</a>
                <p>2023年05月26日 10:19</p>
                <p>8.0日</p>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-6">
                <a href="">お前らと柳川川下り行きたい1(8)</a>
                <p>2023年05月26日 10:19</p>
                <p>8.0日</p>
            </div>

            <div class="col-md-6">
                <a href="">お前らと柳川川下り行きたい1(8)</a>
                <p>2023年05月26日 10:19</p>
                <p>8.0日</p>
            </div>
        </div>
    </div>
    <!-- 仮コードここまで -->

    <button type="button" class="btn btn-default thread-btn" onclick="location.href='./threadcCreate.html'">スレッド新規作成画面へ</button>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>