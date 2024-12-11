new Vue({
    el: '#app',
    data() {
        return {
            number:'',
            password:''
        };
    },
    computed:{
        isInValldNumber(){
            return this.number && this.number.length < 14;
        },

        isInValldPassword(){
            return this.password && this.password.length < 3;
        },

    }
});