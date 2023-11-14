import Vue from 'vue/dist/vue.esm';
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-bootstrap.css';
import App from './App.vue';

Vue.use(VueToast);
new Vue({
    el: '#app',
    template: '<App/>',
    components: { App }
})
