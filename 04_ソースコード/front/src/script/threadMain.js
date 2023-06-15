// const vm = new Vue({
//     el: '#app',
//     data: {
//         //初期値
//         results: {},
//     },
//     //ページが読み込まれた時に動く処理
//     mounted() {
//         axios
//                 //timestamp=${new Date().getTime()}を入れることで毎回違うアドレスで検索が出来るから以前のキャッシュを読み込まない
//                 .get("http://localhost/web/2023Dev3Early/04_ソースコード/back/src/threadCommentDisplay.php")
//                 .then((response) => (this.results = response.data))
//                 .catch((error) => console.log(error));
//     },
//     methods: {
//     },

//     computed: {
//     }

// });

const vm = new Vue({
    el: '#app',
    data: {
      results: {}, // 初期値
    },
    mounted() {
      this.fetchResults(); // ページが読み込まれた時にデータを取得する関数を呼び出す
    },
    methods: {
      fetchResults() {
        const url = "http://localhost/web/2023Dev3Early/04_ソースコード/back/src/threadCommentDisplay.php";
        const timestamp = new Date().getTime(); // 毎回違うアドレスで検索するためのタイムスタンプ
        axios
          .get(`${url}?timestamp=${timestamp}`)
          .then((response) => {
            this.results = response.data; // 取得したデータをresultsに代入
          })
          .catch((error) => {
            console.log(error); // エラーが発生した場合はエラーメッセージをコンソールに表示
          });
      },
    },
    computed: {
    }
  });