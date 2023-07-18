const vm = new Vue({
    el: '#app',
    data: {
      user_name: '',
      comment_detail: '',
    },
      mounted(){
        this.setUserName();
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
          setUserName(){
            if(this.checkSessionKey("user")){
              this.user_name = this.getSessionValue("user_name");
            }else{
              console.log("test");
            }
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