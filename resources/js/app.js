require('./bootstrap');

import router from './routes';
import store from './store/index';
import App from './views/layouts/App';
import Auth from './views/layouts/Auth';

const app = new Vue({
    el: '#app',
    router,
    store,
    components: { App, Auth }
});