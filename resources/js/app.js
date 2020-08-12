require('./bootstrap');
require('./components');

import router from './routes';
import store from './store';
import Onboarding from './pages/layouts/Onboarding';
import Dashboard from './pages/layouts/Dashboard';

const app = new Vue({
    el: '#app',
    store,
    router,
    components: { Onboarding, Dashboard }
});
