const vm = new Vue({
  el: '#app',
  data: {
    ring_title: '', // 初期値
    ring_detail: '',
    invitation_user: '',
    res_num: '',
    thread_id: '',
  },
    methods: {
        createRing() {
          /** 現在のDateオブジェクト作成 */
          var d = new Date();
          /** 日付を文字列にフォーマットする */
          var formatted = `
${d.getFullYear()}-${(d.getMonth()+1).toString().padStart(2, '0')}-${d.getDate().toString().padStart(2, '0')} ${d.getHours().toString().padStart(2, '0')}:
${d.getMinutes().toString().padStart(2, '0')}:${d.getSeconds().toString().padStart(2, '0')}
            `.replace(/\n|\r/g, '');
        
          const url = "http://localhost/2023Dev3Early/04_ソースコード/back/src/ringCreate.php";
          const data = new FormData();
          data.append('ring_title', this.ring_title);
          data.append('ring_detail', this.ring_detail);
          date.append('invitation_user', this.invitation_user);
          date.append('res_num', this.res_num);
          data.append('create_date', formatted);
          data.append('thread_id', this.this.getQueryParam("thread_id"));

          
          axios.post(url, data)
            .then(response => {
              // レスポンスを処理するコード
              console.log(response.data); 
            })
            .catch(error => {
              // エラーハンドリングのコード
              console.error(error);
            });
            window.location.href = 'http://localhost/2023Dev3Early/04_%E3%82%BD%E3%83%BC%E3%82%B9%E3%82%B3%E3%83%BC%E3%83%89/front/src/home.php';
      },
      getQueryParam(paramName) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(paramName);
      },
    },
  computed: {
  }
});