import VueRouter from 'vue-router';

const routes = [
    {
        path: '/new', 
        name: 'Create a new Idea Space',
        components:{
            onboarding: require('./pages/Onboarding/New').default
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