//import services
import Organization from '../../services/OrganizationService';
import User from '../../services/UserService';
import Team from '../../services/TeamService';
import router from '../../routes';

//initial state
const state = () => ({
    creatorEmail: null,
    organizationId: null,
    verified: false,
    busy: false,
    error: null,
    teamObj: new Team(),
    userObj: new User(),
    orgObj: new Organization(),
})

const getters = {
    creatorEmail: state => {
        return state.creatorEmail;
    },

    error: state => {
        return state.error;
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
            if(typeof response.data == 'object'){
                state.busy = false;

                commit('setOrganizationId', response);

                router.push('/team');
            }else{
                state.busy = false;

                commit('setError', response);
            }
        }).catch(err => {
            state.busy = false;
            commit('setError', 'An error occured! <br/>' + err);
        })
    },

    createTeam({state, commit, getters}, form){
        state.busy = true;

        const team = state.teamObj.create(form, getters.organizationId);

        team.then(response => {
            if(typeof response.data == 'object'){
                state.busy = false;
                router.push('/login');
            }else{
                state.busy = false;
                commit('setError', err);
            }
        })
    },

    login({state, commit, getters}, form){
        state.busy = true;

        //inject email to the form
        form.email = getters.creatorEmail;

        const loggedIn = state.orgObj.login(form, getters.organizationId, true);

        loggedIn.then(response => {
            state.busy = false;
            if(typeof response.data == 'object'){
                //save the user to localStorage (handled by login module)
                commit('login/setLoggedInUser', response, {root: true});
                //retrieve the organization shortname from response
                //and redirect to the dashboard
                window.location.href = '/app/' +response.data.organization.shortname;
            }else{
                commit('setError', 'An error occured while logging you in to your organization');
            }
        }).catch(err => {
            state.busy = false;
            commit('setError', err);
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