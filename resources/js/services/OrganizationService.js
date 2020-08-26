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
}

export default Organization;