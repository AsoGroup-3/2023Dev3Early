const vm = new Vue({
    el: '#app',
    data: {
      comments: {}, // 初期値
      thread_name: "スレッド名の取得に失敗しました",
    },
    mounted() {
      if(this.checkQueryParamExists('thread_id')){
        this.fetchComments(this.getQueryParam('thread_id')); // ページが読み込まれた時にデータを取得する関数を呼び出す
        this.fetchThread_name(this.getQueryParam('thread_id'));
      }
    },
    methods: {
      //コメント取得
      fetchComments(thread_id) {
        const url = "https://taketake0506.boo.jp/2023Dev3Early/back/src/threadCommentDisplay.php";
        const timestamp = new Date().getTime(); // 毎回違うアドレスで検索するためのタイムスタンプ
        axios
          .get(`${url}?thread_id=${thread_id}&timestamp=${timestamp}`)
          .then((response) => {
            this.comments = response.data; // 取得したデータをcommentsに代入
          })
          .catch((error) => {
            console.log(error); // エラーが発生した場合はエラーメッセージをコンソールに表示
          });
      },
      //thread取得・今回は名前のみ使用
      fetchThread_name(thread_id) {
        const url = "https://taketake0506.boo.jp/2023Dev3Early/back/src/getThreadName.php";
        const timestamp = new Date().getTime(); // 毎回違うアドレスで検索するためのタイムスタンプ
        axios
          .get(`${url}?thread_id=${thread_id}&timestamp=${timestamp}`)
          .then((response) => {
            this.thread_name = response.data; // 取得したデータをthreadsに代入
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