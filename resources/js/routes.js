import VueRouter from 'vue-router';

const routes = [
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

export default new VueRouter({
    routes,
}) 