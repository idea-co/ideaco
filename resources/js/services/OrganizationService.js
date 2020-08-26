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
}

export default Organization;