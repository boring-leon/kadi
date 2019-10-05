require('./bootstrap');

import Vue from 'vue';

if (process.env.MIX_APP_ENV === 'production') {
    Vue.config.devtools = false;
    Vue.config.debug = false;
    Vue.config.silent = true; 
}

import store from './store/store';
import router from './router/router';
import guard from './router/guard';
import filters from './global/filters';
import mixins from './global/mixins';

import App from './views/App.vue';
import Nav from './views/Navbar.vue';
import HeaderCenter from './components/UI/Header.vue';
import createInstance from './createInstance';

Vue.component('HeaderCenter', HeaderCenter);

const app = createInstance({
    el: '#app',
    store,
    router,
    render: h => h(App)
});

const nav = createInstance({
    el: "#nav",
    router,
    render: h => h(Nav)
});
