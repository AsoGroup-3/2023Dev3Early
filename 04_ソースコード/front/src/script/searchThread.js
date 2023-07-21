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
      var url = "http://localhost/2023Dev3Early/04_%E3%82%BD%E3%83%BC%E3%82%B9%E3%82%B3%E3%83%BC%E3%83%89/front/src/searchResult.php?keyword="+this.keyword;
      window.location.assign(url);
    },
  },
  computed: {
  }
});