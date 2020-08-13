import VueRouter from 'vue-router';

const onBoardingRoutes = [
    {
        path: '/', 
        name: 'Choose a path to get started',
        components:{
            onboarding: require('./pages/Onboarding/Start').default
        }
    },
    {
        path: '/new', 
        name: 'Create a new Idea Space',
        components:{
            onboarding: require('./pages/Onboarding/New').default
        },
    },
    {
        path: '/ideaspace',
        name: 'Tell us the name of your ideaspace',
        components:{
            onboarding: require('./pages/Onboarding/Ideaspace').default,
        }
    },
    {
        path: '/team',
        name: 'Tell us the name of your teams',
        components:{
            onboarding: require('./pages/Onboarding/Team').default
        }
    },
    {
        path: '/login',
        name: 'Create a user name and password',
        components:{
            onboarding: require('./pages/Onboarding/Login').default
        }
    },
    {
        path: '/confirm-email',
        name: 'Confirm your email address to continue',
        components:{
            onboarding: require('./pages/Onboarding/Confirm').default
        }
    },
    {
        path: '/join', 
        name: 'Join an Idea Space',
        components:{
            onboarding: require('./pages/Onboarding/Join').default
        }
    },
];

const DashboardRoutes = [
    {
        path: '/',
        name: 'Dashboard',
        components: {
            dashboard: require('./pages/Dashboard/Home').default
        }
    },
    {
        path: '/challenges',
        name: 'Challenge',
        components: {
            dashboard: require('./pages/Dashboard/Challenge').default
        }
    },
    {
        path: '/overview',
        name: 'Overview',
        components: {
            dashboard: require('./pages/Dashboard/Overview').default
        }
    },
    {
        path: '/history',
        name: 'History',
        components: {
            dashboard: require('./pages/Dashboard/History').default
        }
    }
]

//check our navbar and load the appropriate routes
const routes = window.location.href.indexOf("app#") > -1 ? DashboardRoutes : onBoardingRoutes;

export default new VueRouter({
    routes,
    scrollBehavior (to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else {
            return { x: 0, y: 0 }
        }
    }
}) 