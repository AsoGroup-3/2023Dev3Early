const result_vm = new Vue({
  el: '#sr_app',
  data: {
    s_threads: {}, // 初期値
  },
  mounted() { // ページが読み込まれた時にデータを取得する関数を呼び出す
    if(this.checkQueryParamExists('keyword')){
      this.fetchSearchThreads(this.getQueryParam('keyword')); // ページが読み込まれた時にデータを取得する関数を呼び出す
    }
  },
  methods: {
    fetchSearchThreads(keyword) {
      var url = "http://witty-kusu-4276.hippy.jp/2023Dev3Early/back/src/searchThreadUrl.php?keyword="+keyword;
      const timestamp = new Date().getTime(); // 毎回違うアドレスで検索するためのタイムスタンプ
      axios
        .get(`${url}&timestamp=${timestamp}`)
        .then((response) => {
          console.log(response.data);
          this.s_threads = response.data; // 取得したデータをthreadsに代入
          console.log(this.s_threads);
        })
        .catch((error) => {
          console.log(error); // エラーが発生した場合はエラーメッセージをコンソールに表示
        });
    },
    // 特定のGETパラメータが存在するかどうかを確認する関数
    checkQueryParamExists(paramName) {
      const searchParams = new URLSearchParams(window.location.search);
      return searchParams.has(paramName);
    },
    //特定のGETパラメータを取得する関数
    getQueryParam(paramName) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(paramName);
    }
  },
  computed: {
  }
});