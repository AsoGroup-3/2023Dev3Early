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
    <div id="app">
        <form class="form-inline create_area">
            <div>
                <p class="form-inline">タイトル：　　<input type="text" v-model="ring_title" class="input_area"></p>

                <p class="form-inline">対戦相手ID：　<input type="text" v-model="invitation_user" class="input_area"></p>

                <p class="form-inline">内容：　　　　<input type="text" v-model="ring_detail" class="input_area_lg"></p>
                <p class="form-inline">レス数：　　　<select v-model="res_num">
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="300">300</option>
                        <option value="500">500</option>
                    </select></p>


                <div style="text-align: right;">
                    <button type="button" class="btn btn-default border border-2 border-dark" @click="createRing()">
                        作成
                    </button>
                </div>
            </div>
        </form>
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
    <!-- JSの読み込み -->
    <script src="./script/createRing.js"></script>
    <script src="./script/searchThread.js"></script>
</body>

</html>