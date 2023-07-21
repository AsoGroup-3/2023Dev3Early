<!DOCTYPE html>
<html lang="ja">

<?php
require "../components/header.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/searchResult.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    <title>スレッド検索画面</title>
</head>

<body class="background">
    <div id="sr_app">
        <div v-for="(item, i) in s_threads" class="container text-left " style="margin-left: 0px;">
            <a v-bind:href="item.thread_url">
                <div class="row" style="padding-left: 5%; margin-top: 4%;">
                    <div class="col-10 text-truncate">
                        <div class="titleText">{{item.thread_name}}</div>
                    </div>
                    <div class="col-1">
                        <span class="commentCount">({{item.thread_count}})</span>
                    </div>
                    <div class="col-1">
                        <span class="icon"></span>
                    </div>
                    <div class="col-4">
                        <span class="createDate">{{item.thread_create_date}}</span>
                    </div>
                </div>
            </a>
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
    <script src="./script/searchThread.js"></script>
    <script src="./script/searchResult.js"></script>
</body>


</html>