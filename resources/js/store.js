import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        onboarding:{
            creator: null,
            organizationId: null,
            verified: false,
        },
        login:{
            organization: null,
            email: null,
        },
        user: {
            token: null,
            role: null,
        },
        isLoggedIn: false,
    },

    mutations:{
        setLoggedInUser(state, user){
            state.isLoggedIn = true;
            state.user = user;
            // let token = "Bearer " + user.token;
            //save user data to localStorage
            localStorage.setItem('user', JSON.stringify(user))
            // axios.defaults.headers.common['Authorization'] = token;
        },

        /**
         * 
         * @param {Vue store} state 
         * @param {The user creating the organization} creator 
         */
        setCreator(state, creator){
            state.onboarding.creator = creator.data;
        },

        setOrganizationId(state, response){
            state.onboarding.organizationId = response.data.id;
        },

        setLoginOrganization(state, response){
            state.login.organization = response['data'];
        },

        setLoginUserEmail(state, response){
            state.login.email = response['data']['email'];
        },

        setVerifiedStatus(state, response){
            state.onboarding.verified = response.verified;
        },

        clearUserData () {
            localStorage.removeItem('user')
            location.href = "/login"; //redirect to login
        }
    },

    actions: {
        init ({ commit }, form) {
          return form.post('/api/users')
            .then(response => {
                commit('setCreator', response);
            })
            .catch(err => {
                console.log(err);
            });
        },

        verifyUser({commit}, form) {
            return form.put('/api/users/verify')
            .then(response => {
                commit('setVerifiedStatus', response)
                return response;
            })
            .catch(err => {
                console.log(err);
            })
        },

        createOrg({commit}, form){
            return form.post('/api/organizations')
            .then(response => {
                commit('setOrganizationId', response);
                return response;
            })
            .catch(err => {
                console.log(err);
            })
        },
        
        findMemberByEmail({commit}, form){
            return form.post('/api/organizations/'+this.getters.loginOrganization.id+'/members/search')
            .then(response => {
                return response;
            })
        },

        createTeam({commit}, form){
            return form.post('/api/organizations/'+ this.getters.organizationId+'/teams')
            .then(response => {
                return response;
            })
            .catch(err => {
                console.log(err);
            })
        },

        adminLogin({commit}, form){
            return form.post('/api/organizations/' + this.getters.organizationId + '/admin/login')
            .then(response => {
                return response;
            })
            .catch(err => {
                console.log(err);
            })
        },

        loginToWorkspace({commit}, form){
            return form.post('/api/organizations/')
            .then(response => {

            })
            .catch(err => {
                console.log(err);
            })
        }

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

        creatorEmail: state => {
            return state.onboarding.creator.email;
        },

        creator: state => {
            return state.onboarding.creator;
        },

        loginOrganization: state => {
            return state.login.organization;
        },

        organizationId: state => {
            return state.onboarding.organizationId;
        },

        token: state => {
            return state.user.token;
        }
    }
    
});