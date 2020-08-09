require('./bootstrap');

import router from './routes';
import Onboarding from './pages/layouts/Onboarding';
import Dashboard from './pages/layouts/Dashboard';

const app = new Vue({
    el: '#app',
    router,
    components: { Onboarding, Dashboard }
});