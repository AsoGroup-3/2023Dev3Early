<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

  <title>Battlefield</title>
</head>

<body>
  <div id="app">

    <body class="background">

      <div class="left_nawa">
        <img src="../assets/img/tatenawa.png" width="200px" height="10000px">
      </div>

      <div class="right_nawa">
        <img src="../assets/img/tatenawa.png" width="200px" height="10000px">

      </div>




      <div id="nawa_bottom">
        <img src="../assets/img/nawa.png" width="1650" height="200" alt="Nawa">
      </div>
    </body>

    <h1 style="text-align:center">{{ring_name}}</h1>



    <!-- コメント表示エリア -->
    <div v-for="(item, i) in comments">
      <!-- 自分の書き込みの場合 -->
      <div <?php
            if (!isset($_SESSION)) {
              session_start();
            }
            print "v-if=\"item.user_id == '" . $_SESSION['user']['user_id'] . "'\"";
            ?>>

        <div class="resuba_eria_right">
          <!-- ユーザー情報・日付表示エリア -->
          <div style="margin-bottom: 10px;">
            <div class="user_name">{{item.user_name}}</div>
            <span style="padding-right: 100px;">{{item.user_id}}</span>
            <span>{{item.create_at}}</span>
          </div>

          <!-- コメント本文 -->
          <p>{{item.comment}}</p>
        </div>

      </div>
      <div v-else>

        <div class="resuba_eria_left">
          <!-- ユーザー情報・日付表示エリア -->
          <div style="margin-bottom: 10px;">
            <div class="user_name">{{item.user_name}}</div>
            <span style="padding-right: 100px;">{{item.user_id}}</span>
            <span>{{item.create_at}}</span>
          </div>

          <!-- コメント本文 -->
          <p>{{item.comment}}</p>
        </div>

      </div>

    </div>

    <div class="ko">
      <img src="../assets/img/KO2.png" aligin="center" width="800px" height="400px">
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
  <!-- JSの読み込み -->
  <script src="./script/ringMain.js"></script>
</body>

</html>