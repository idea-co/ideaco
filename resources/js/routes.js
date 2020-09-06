import VueRouter from 'vue-router';
import store from './store/index';

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
        path: '/sign-in', 
        components:{
            onboarding: require('./pages/Onboarding/Login/LoginLayout').default
        },
        children: [
            {
                path: '', 
                name: 'Login to your Idea Space',
                component: require('./pages/Onboarding/Login/Index').default
            },
            {
                path: 'email', 
                name: 'Enter your email to continue',
                component: require('./pages/Onboarding/Login/Email').default
            },
            {
                path: 'password', 
                name: 'Enter your password to continue',
                component: require('./pages/Onboarding/Login/Password').default,
            }
        ]
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

var routes;

//check our browser url and load the appropriate routes
if(window.location.href.indexOf("start") > -1){
    routes = onBoardingRoutes;
}else{
    routes = DashboardRoutes;
}

const router = new VueRouter({
    routes,
    scrollBehavior (to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else {
            return { x: 0, y: 0 }
        }
    },
}) 

/**
 * This block fires before a route is changed
 * ===========================================
 * Fetch user token from localstorage to authenticate each 
 * request
 */
router.beforeEach((to, from, next) => {
    //our router is setting the current page for the store
    store.commit('setCurrentPage', to.name);
    
    const userInfo = localStorage.getItem('user');
    if(userInfo){
        const userData = JSON.parse(userInfo);
        let token = "Bearer " + userData.data.token;
        axios.defaults.headers.common['Authorization'] = token;
        next();
    }else{
        next();
    }
})

export default router;