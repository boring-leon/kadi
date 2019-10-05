import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import routes from './routes';

export default new VueRouter({
    routes: routes,  
    mode: 'history',
    linkActiveClass: 'active-route',
    linkExactActiveClass: 'exact-active-route'
});