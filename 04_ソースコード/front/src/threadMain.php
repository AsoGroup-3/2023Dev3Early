<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<?php
require_once "../components/header.php";
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

        <!-- タイトルエリア -->
        <h2>{{thread_name}}</h2>

        <!-- <button type="button" class="btn btn-danger thread-btn" onclick="location.href='./threadCreate.php'"> -->

        <?php
        print "<button type=\"button\" class=\"btn btn-danger thread-btn\" onclick=\"location.href='./createRing.php?thread_id=" . $_GET['thread_id'] . "'\">";
        ?>

        RESPONSE BUTTLE START
        </button>

        <!-- レス数・バイト数表示エリア -->
        <div class="comment_head">
            <ul>
                <li>レス数</li>
                <li>バイト数</li>
            </ul>
        </div>
        <!-- コメント表示エリア -->
        <div v-for="(item, i) in comments" class="comment_eria">
            <!-- ユーザー情報・日付表示エリア -->
            <div style="margin-bottom: 10px;">
                <div class="user_name">{{item.user_name}}</div>
                <span style="padding-right: 10px;">{{item.user_id}}</span>
                <span>{{item.create_at}}</span>
            </div>

            <!-- コメント本文 -->
            <p>{{item.comment}}</p>
        </div>
    </div>


    <?php
    require_once "../components/comment_create_form.php";
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- vue.jsのCDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- JSONを扱うためのCDN -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- JSの読み込み -->
    <script src="./script/threadMain.js"></script>
    <script src="./script/createComment.js"></script>
    <script src="./script/searchThread.js"></script>
</body>

</html>