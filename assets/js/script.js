// JavaScript用ファイル
new Vue({
    el: '#app',
    data() {
        return {
            email1:'',
            password1:'',
            
        };
    },
    computed:{
        error(){
            return this.name1.length<4;
        }
    }
});
// 電話番号の入力規則です　コピペして利用してください
// const regex = new RegExp(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i)
