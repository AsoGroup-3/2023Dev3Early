<!DOCTYPE html>
<html lang="ja">

<?php
require_once "../components/header.php";
require_once "../components/thread_create_buton.php";
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
    <div id="app">
        <div class="img_center">
            <a href=""><img class="home_icon_img" src="../assets/img/icon.png"> </a>
        </div>

        <div class="explanation">
            <p>「レスバ」から「レスバ」までを手広くレスバするレスバ専用</p>
            <p>専用掲示板群「レスバ・オブザ・リング」へようこそ！</p>
            <p>「レスバ」って何？という方はウィキペディアをご覧ください</p>
        </div>

        <div class="input-group" style="width:300px;">
            <input type="text" class="form-control" placeholder="" v-model="keyword">
            <span class="input-group-btn">
                <button type="button" class="btn btn-default" @click="fetchSearchThreads()">
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

        <div class="container">
            <div class="row align-items-center">
                <div v-for="(item, i) in threads" class="col-md-6">
                    <a v-bind:href="item.thread_url">{{item.thread_name}}</a>
                    <p>{{item.thread_create_date}}</p>
                    <p>{{item.created_date_time}}日</p>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- vue.jsのCDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- JSONを扱うためのCDN -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- axiosを扱うためのCDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- JSの読み込み -->
    <script src="./script/home.js"></script>
    <script src="./script/searchThread.js"></script>
</body>

</html>
