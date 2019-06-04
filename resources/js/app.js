
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');
 import Vue from 'vue';

 import VueChatScroll from 'vue-chat-scroll';
 Vue.use(VueChatScroll);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('member-chat-box', require('./components/MemberChatMessages.vue').default);

const app = new Vue({
    el: '#app',
    
    data: {
        messages: [],
        kodePesanan:window.location.href.substring(window.location.href.lastIndexOf('/') + 1),
    },

    mounted() {
        this.fetchMessages();
        console.log('mounted bro');
        window.Echo.private('chat')
        .listen('.PesanTerkirim', (e) => {
            console.log(e);
            this.messages.push(e.pesan);
        });
    },

    methods: {
        fetchMessages() {
            axios.get('/messages/'+this.kodePesanan).then(response => {
                this.messages = response.data;
            });
        },
        addMessage(teks) {
            console.log('addMessage '+teks);
            this.messages.push(teks);

            axios.post('/messages/'+this.kodePesanan, teks).then(response => {});
        }
    }
});

