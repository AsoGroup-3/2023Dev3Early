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
      var url = "https://taketake0506.boo.jp/2023Dev3Early//front/src/searchResult.php?keyword="+this.keyword;
      window.location.assign(url);
    },
  },
  computed: {
  }
});