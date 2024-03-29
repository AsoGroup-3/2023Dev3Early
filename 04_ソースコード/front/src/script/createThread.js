const vm = new Vue({
  el: '#app',
  data: {
    thread_title: '', // 初期値
    thread_detail: '',
  },
    methods: {
        createThread() {
          /** 現在のDateオブジェクト作成 */
          var d = new Date();
          /** 日付を文字列にフォーマットする */
          var formatted = `
${d.getFullYear()}-${(d.getMonth()+1).toString().padStart(2, '0')}-${d.getDate().toString().padStart(2, '0')} ${d.getHours().toString().padStart(2, '0')}:
${d.getMinutes().toString().padStart(2, '0')}:${d.getSeconds().toString().padStart(2, '0')}
            `.replace(/\n|\r/g, '');
        
          const url = "http://witty-kusu-4276.hippy.jp/2023Dev3Early/back/src/threadCreate.php";
          const data = new FormData();
          data.append('thread_title', this.thread_title);
          data.append('thread_detail', this.thread_detail);
          data.append('create_date', formatted);
          
          axios.post(url, data)
            .then(response => {
              // レスポンスを処理するコード
              console.log(response.data); 
              window.location.assign("http://witty-kusu-4276.hippy.jp/2023Dev3Early//front/src/threadMain.php?thread_id=" + response.data); 
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