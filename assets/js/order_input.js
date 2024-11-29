new Vue({
    el: '#app',
    data() {
        return {
            name:'',
            password:'',
            address:''
        };
    },
    computed:{
        isInValldName(){
            return this.name && this.name.length < 14;
        },

        isInValldPass(){
            return this.password && this.password.length < 8;
        },

    }
});