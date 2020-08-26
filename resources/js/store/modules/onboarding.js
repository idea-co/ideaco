//import services
import Organization from '../../services/OrganizationService';
import User from '../../services/UserService';
import router from '../../routes';

//initial state
const state = () => ({
    creatorEmail: null,
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
        return state.creator.email;
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
    setCreatorEmail(state, payload){
        state.creatorEmail = payload.data.email;
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
            commit('setCreatorEmail', response);
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
        
        //inject email received on previous screen
        form.email = state.creatorEmail;

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

    createOrg({state, commit}, form){
        //start loadng state
        state.busy = true;
        //inject owner to form
        form.owner = state.creatorEmail;

        //invoke the organization Helper
        const org = state.orgObj.create(form);

        org.then(response => {
            if(response instanceof 'object'){
                state.busy = false;

                commit('setOrganizationId', response);

                router.push('/team')
            }else{
                state.busy = false;

                commit('setError', response);
            }
        }).catch(err => {
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
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}