//import services
import Organization from '../../services/OrganizationService';
import User from '../../services/UserService';
import router from '../../routes';

//initial state
const state = () => ({
    creator: null,
    organizationId: null,
    verified: false,
    userObj: new User(),
    busy: false,
    orgObj: new Organization,
})

const getters = {
    creatorEmail: state => {
        return state.onboarding.creator.email;
    },

    creator: (state, getters) => {
        return state.onboarding.creator;
    },

    organizationId: state => {
        return state.onboarding.organizationId;
    },
}

const mutations = {
    /**
     * 
     * @param {Vue store} state 
     * @param {The user creating the organization} creator 
     */
    setCreator(state, creator){
        state.creator = creator.data;
    },

    setOrganizationId(state, response){
        state.organizationId = response.data.id;
    },

    setVerifiedStatus(state, response){
        state.verified = response.verified;
    },

    goToEmailConfirmationPage(state){
        this.$router.push('/confirm-email'); 
    }
}


const actions = {
    createUser ({ state, commit, rootState }, form) {
        //change busy state
        state.busy = true;

        //send our form helper ot User class
        const user = state.userObj.create(form);

        user.then(response => {

            state.busy = false;
            
            commit('setCreator', response);

            //navigate to next page
            router.push('/confirm-email');

        }).catch(err => {

            state.busy = false;
            commit('setError', err);
            console.log("I think there was an error " + err);

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
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}