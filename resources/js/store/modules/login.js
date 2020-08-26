import Organization from "../../services/OrganizationService";
import Members from "../../services/OrganizationMembers";
import User from "../../services/UserService";
import router from '../../routes';

const state = () => ({
    isLoggedIn: null,
    user: null,
    busy: false,
    error: null,
    orgObj: new Organization(),
    userObj: new User(),
    memberObj: new Members(),
    organization: null,
    email: null,
})

const mutations = {
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

    setLoginOrganization(state, payload){
        state.organization = payload.data;
    },

    setUserEmail(state, response){
        state.email = response.data.email;
    },

    setError(state, payload){
        state.error = payload;
    }

}

const getters = {
    organization: state => {
        return state.organization;
    },

    email: state => {
        return state.email;
    }
}

const actions = {
    findOrganization({commit, state}, form){
        state.busy = true;

        const organization = state.orgObj.find(form);

        organization.then(response => {
            state.busy = false;

            if(response instanceof Object){
                commit('setLoginOrganization', response);
                router.push('/sign-in/email')
            }else{
                commit('setError', response);
            }

        }).catch(err => {
            state.busy = false;
            console.log(err);
        })

    },

    findMember({commit, state}, form){
        state.busy = true;

        const member = state.memberObj.find(form);

        member.then(response => {
            state.busy = false;

            if(response instanceof Object){
                commit('setLoginUserEmail', response);
                router.push('/sign-in/password');
            }else{
                commit('setError', response);
            }

        }).catch(err => {
            state.busy = false;
            console.log(err);
        })

    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}