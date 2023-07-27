const com_vm = new Vue({
    el: '#com_app',
    data: {
      user_name: '',
      comment_detail: '',
    },
      mounted(){
        this.setUserName();
      },
      methods: {
          createComment() {          
            const url = "https://taketake0506.boo.jp/2023Dev3Early/back/src/commentCreate.php";
            const data = new FormData();
            data.append('user_name', this.user_name);
            data.append('comment_detail', this.comment_detail);
            data.append('thread_id', this.getQueryParam("thread_id"));
            
            axios.post(url, data)
              .then(response => {
                // レスポンスを処理するコード
                console.log(response.data);
                window.location.assign("https://taketake0506.boo.jp/2023Dev3Early//front/src/threadMain.php?thread_id="+this.getQueryParam("thread_id")); 
              })
              .catch(error => {
                // エラーハンドリングのコード
                console.error(error);
              });
          },
          //セッションから取得したユーザー名をテキストボックスにセットする
          setUserName(){
            const url = "https://taketake0506.boo.jp/2023Dev3Early/back/src/getSession.php";
            const timestamp = new Date().getTime(); // 毎回違うアドレスで検索するためのタイムスタンプ
            axios
              .get(`${url}?timestamp=${timestamp}`)
              .then((response) => {
                this.user_name = response.data; // 取得したデータをcommentsに代入
              })
              .catch((error) => {
                console.log(error); // エラーが発生した場合はエラーメッセージをコンソールに表示
              });
          },
          checkSessionKey(key) {
            return sessionStorage.getItem(key) !== null;
          },
          getSessionValue(key) {
            var sessionData = sessionStorage.getItem('user');
            if (sessionData) {
              var sessionObject = JSON.parse(sessionData);
              return sessionObject[key];
            } else {
              return null;
            }
          },
          getQueryParam(paramName) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(paramName);
          },
      },
    computed: {
    }
  });