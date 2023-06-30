const vm = new Vue({
  el: '#app',
  data: {
    thread_title: '', // 初期値
    thread_detail: '',
  },
    methods: {
        createThread() {
          const url = "http://localhost/2023Dev3Early/04_ソースコード/back/src/threadCreate.php";
          const data = new FormData();
          data.append('thread_title', this.thread_title);
          data.append('thread_detail', this.thread_detail);

          axios.post(url, data)
            .then(response => {
              // レスポンスを処理するコード
              console.log(response.data); 
            })
            .catch(error => {
              // エラーハンドリングのコード
              console.error(error);
            });
        },
    },
  computed: {
  }
});