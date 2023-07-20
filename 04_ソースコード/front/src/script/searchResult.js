import search_vm from './searchThread.js';

const result_vm = new Vue({
    el: '#sr_app',
    data: {
      s_threads: {}, // 初期値
    },
    mounted() {// ページが読み込まれた時にデータを取得する関数を呼び出す
        search_vm.$on('search_result', (data) => {
        this.s_threads = data;
      }); 
    },
    methods: {
      
    },
    computed: {
    }
  });

  export default result_vm;
