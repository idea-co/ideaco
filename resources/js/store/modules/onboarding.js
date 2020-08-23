//initial state
const state = () => ({
    creator: null,
    organizationId: null,
    verified: false,
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
},

const actions = {
    init ({ commit }, form) {
        return form.post('/api/users')
        .then(response => {
            commit('setCreator', response);
        })
        .catch(err => {
            console.log(err);
        });
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
    },
},

const mutations = {
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

    setVerifiedStatus(state, response){
        state.onboarding.verified = response.verified;
    },
}