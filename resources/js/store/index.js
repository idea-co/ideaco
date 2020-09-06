import Vuex from 'vuex';
import Vue from 'vue';
import onboarding from './modules/onboarding';
import users from './modules/users';
import login from './modules/login';
import sidebar from './modules/sidebar'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        onboarding,
        users,
        login,
        sidebar
    },
    state: {
        user: null,
        isLoggedIn: false,
        currentPage: 'Dashboard', //default to home page. Name is the name of the route defined in route.js
    },

    mutations:{
        setCurrentPage(state, payload) {
            state.currentPage = payload;
        },

        clearUserData () {
            localStorage.removeItem('user')
            location.href = "/login"; //redirect to login
        }
    },

    actions: {

        loginToWorkspace({commit}, form){
            return form.post('/api/organizations/' + this.getters.loginOrganization.id + '/login')
            .then(response => {
                return response;
            })
            .catch(err => {
                console.log(err);
            })
        },

        logout ({ commit }) {
            commit('clearUserData')
        }
    },

    getters: {
        role: state => {
          return state.user.role;
        },

        token: state => {
            return state.user.token;
        },

        currentPage: state => {
            return state.currentPage;
        }
    }
    
});