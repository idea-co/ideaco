import User from './UserService';

class Organization {
    /**
     * Create a new organization
     */
    create(form) {
        return form.post('/api/organizations')
            .then(response => {
                return response;
            })
            .catch(err => {
                return err;
            })
    }

    /**
     * Login to an organization
     */
    login(form, organizationId, isCreator = false){

        const route = isCreator ? '/admin/' : '/'; 
        return form.post('/api/organizations/' + organizationId + route + 'login')
            .then(response => {
                return response;
            })
            .catch(err => {
                return err;
            })
    }

    /**
     * Search for an organization by shortname
     */
    find(form){
        return form.get('/api/organizations/' + form.shortname + '/find')
            .then(response => {
                return response;
            })
            .catch(err => {
                return err;
            })
    }
}

export default Organization;