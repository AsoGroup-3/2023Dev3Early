const vm = new Vue({
    el: '#app',
    data: {
      threads: {}, // 初期値
    },
    mounted() {
      this.fetchThreads(); // ページが読み込まれた時にデータを取得する関数を呼び出す
    },
    methods: {
      fetchThreads() {
        const url = "http://localhost/2023Dev3Early/04_ソースコード/back/src/threadUrl.php";
        const timestamp = new Date().getTime(); // 毎回違うアドレスで検索するためのタイムスタンプ
        axios
          .get(`${url}?timestamp=${timestamp}`)
          .then((response) => {
            this.threads = response.data; // 取得したデータをthreadsに代入
          })
          .catch((error) => {
            console.log(error); // エラーが発生した場合はエラーメッセージをコンソールに表示
          });
      },
    },
    computed: {
    }
  });