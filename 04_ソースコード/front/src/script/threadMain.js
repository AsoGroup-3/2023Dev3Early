const vm = new Vue({
    el: '#app',
    data: {
      comments: {}, // 初期値
    },
    mounted() {
      this.fetchComments(); // ページが読み込まれた時にデータを取得する関数を呼び出す
    },
    methods: {
      fetchComments() {
        const url = "http://localhost/web/2023Dev3Early/04_ソースコード/back/src/threadCommentDisplay.php";
        const timestamp = new Date().getTime(); // 毎回違うアドレスで検索するためのタイムスタンプ
        axios
          .get(`${url}?timestamp=${timestamp}`)
          .then((response) => {
            this.comments = response.data; // 取得したデータをcommentsに代入
          })
          .catch((error) => {
            console.log(error); // エラーが発生した場合はエラーメッセージをコンソールに表示
          });
      },
    },
    computed: {
    }
  });