    <div id="com_app">
        <form class="form-inline create_area">
            <div>
                <p class="form-inline">名前：　　　<input type="text" v-model="user_name" class="input_area"></p>

                <p class="form-inline">内容：　　　<input type="text" v-model="comment_detail" class="input_area_lg"></p>

                <div style="text-align: right;"><button type="button" class="btn btn-default" @click="createComment()">作成</button></div>
            </div>
        </form>
    </div>