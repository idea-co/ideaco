window.Vue = require('vue');

import VueRouter from 'vue-router';
import Vuex from 'vuex';

Vue.use(VueRouter);
Vue.use(Vuex);

try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
} catch (e) {}

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withCredentials = true;

window.Errors = require('./helpers/Errors');
window.Form = require('./helpers/Form');