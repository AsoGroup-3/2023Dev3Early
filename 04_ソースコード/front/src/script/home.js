const vm = new Vue({
    el: '#app',
    data: {
      threads: {}, // 初期値
      keyword:"",
    },
    mounted() {
      this.fetchThreads(); // ページが読み込まれた時にデータを取得する関数を呼び出す
    },
    methods: {
      fetchThreads() {
        const url = "https://taketake0506.boo.jp/2023Dev3Early/back/src/threadUrl.php";
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
      fetchSearchThreads() {
        var url = "https://taketake0506.boo.jp/2023Dev3Early//front/src/searchResult.php?keyword="+this.keyword;
        window.location.assign(url);
      },
    },
    computed: {
    }
  });