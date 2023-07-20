const search_vm = new Vue({
  el: '#s_app',
  data: {
    keyword:"",
    s_threads: {}, // 初期値
  },
  mounted() { // ページが読み込まれた時にデータを取得する関数を呼び出す
  },
  methods: {
    fetchSearchThreads() {
      var url = "http://localhost/2023Dev3Early/04_ソースコード/back/src/searchThreadUrl.php?keyword="+this.keyword;
      const timestamp = new Date().getTime(); // 毎回違うアドレスで検索するためのタイムスタンプ
      axios
        .get(`${url}&timestamp=${timestamp}`)
        .then((response) => {
          console.log(response.data);
          this.s_threads = response.data; // 取得したデータをthreadsに代入
          console.log(this.s_threads);
          this.$emit('search_result', this.s_threads);
          window.location.assign("http://localhost/2023Dev3Early/04_%E3%82%BD%E3%83%BC%E3%82%B9%E3%82%B3%E3%83%BC%E3%83%89/front/src/searchResult.php");
        })
        .catch((error) => {
          console.log(error); // エラーが発生した場合はエラーメッセージをコンソールに表示
        });
    },
  },
  computed: {
  }
});

export default search_vm;