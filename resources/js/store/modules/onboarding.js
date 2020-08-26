//import services
import Organization from '../../services/OrganizationService';
import User from '../../services/UserService';
import router from '../../routes';

//initial state
const state = () => ({
    creator: null,
    organizationId: null,
    verified: false,
    busy: false,
    error: null,
    userObj: new User(),
    orgObj: new Organization(),
})

const getters = {
    creatorEmail: state => {
        return state.creator.email;
    },

    error: state => {
        return state.error;
    },

    creator: (state, getters) => {
        return state.creator;
    },

    organizationId: state => {
        return state.organizationId;
    },
}

const mutations = {
    /**
     * 
     * @param {Vue store} state 
     * @param {The user creating the organization} creator 
     */
    setCreator(state, payload){
        state.creator = payload.data;
    },

    setOrganizationId(state, payload){
        state.organizationId = payload.data.id;
    },

    setVerifiedStatus(state, payload){
        state.verified = payload.verified;
    },

    setError(state, payload){
        state.error = payload;
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

    confirmEmail({state, commit}, form) {
        //start the loading busy state
        state.busy = true;

        const verified = state.userObj.confirmEmail(form);

        verified.then(response => {
            //stop loading state
            state.busy = false;
            //navigate to next page only if OTP is valid
            if (response.verified === false){
                commit('setError', 'Sorry! That code seems incorrect');
            }else{
                router.push('/ideaspace')
            }
        })  
        .catch(err => {
            state.busy = false;
            commit('setError', 'An error occured!' + err);
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