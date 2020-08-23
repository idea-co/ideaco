import Vuex from 'vuex';
import Vue from 'vue';
import onboarding from './modules/onboarding';
import users from './modules/users';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        onboarding,
        users
    },
    state: {
        login:{
            organization: null,
            email: null,
        },
        user: null,
        isLoggedIn: false,
    },

    mutations:{
        setLoggedInUser(state, user){
            state.isLoggedIn = true;
            state.user = user;
            //retrieve the user token
            let token = "Bearer " + user.data.token;
            //save user data to localStorage
            localStorage.setItem('user', JSON.stringify(user));

            //authenticate all future requests
            axios.defaults.headers.common['Authorization'] = token;
        },

        setLoginOrganization(state, response){
            state.login.organization = response['data'];
        },

        setLoginUserEmail(state, response){
            state.login.email = response['data']['email'];
        },

        clearUserData () {
            localStorage.removeItem('user')
            location.href = "/login"; //redirect to login
        }
    },

    actions: {
        findMemberByEmail({commit}, form){
            return form.post('/api/organizations/'+this.getters.loginOrganization.id+'/members/search')
            .then(response => {
                return response;
            })
        },

        loginToWorkspace({commit}, form){
            return form.post('/api/organizations/' + this.getters.loginOrganization.id + '/login')
            .then(response => {
                return response;
            })
            .catch(err => {
                console.log(err);
            })
        },

        findOrganization({commit}, form){
            return form.get('/api/organizations/' + form.shortname + '/find')
                .then(response => {
                    commit('setLoginOrganization', response);
                    return response;
                })
                .catch(err => {
                    console.log(form.shortname);
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

        loginUserEmail: state => {
            return state.login.email;
        },

        loginOrganization: state => {
            return state.login.organization;
        },

        token: state => {
            return state.user.token;
        }
    }
    
});