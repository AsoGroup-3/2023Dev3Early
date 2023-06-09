const vm = new Vue({
    el: '#app',
    data: {
      user_name: '',
      comment_detail: '',
    },
      methods: {
          createComment() {          
            const url = "http://localhost/2023Dev3Early/04_ソースコード/back/src/commentCreate.php";
            const data = new FormData();
            data.append('user_name', this.user_name);
            data.append('comment_detail', this.comment_detail);
            data.append('thread_id', this.getQueryParam("thread_id"));
            
            axios.post(url, data)
              .then(response => {
                // レスポンスを処理するコード
                console.log(response.data);
                window.location.assign("http://localhost/2023Dev3Early/04_%E3%82%BD%E3%83%BC%E3%82%B9%E3%82%B3%E3%83%BC%E3%83%89/front/src/threadMain.php?thread_id="+this.getQueryParam("thread_id")); 
              })
              .catch(error => {
                // エラーハンドリングのコード
                console.error(error);
              });
          },
          getQueryParam(paramName) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(paramName);
          },
      },
    computed: {
    }
  });