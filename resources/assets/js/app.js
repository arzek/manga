import './bootstrap';
import './uikit';
import VueRouter from 'vue-router';
import routes from './routes.js';
import MainComponent from './components/MainComponent';


window.Vue = require('vue');

const router = new VueRouter({
    routes
});

Vue.use(VueRouter);

Vue.component('main-component', MainComponent);

const app = new Vue({
    el: '#app',
    router
});
