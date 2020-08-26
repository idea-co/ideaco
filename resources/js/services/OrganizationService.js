import User from './UserService';

class Organization {
    constructor(){
        this.userObj = new User();
    }
    /**
     * Create a new organization
     * - First we create the user initiating this 
     *   request if they don't already exist
     * - 
     */
    create(data) {
        const orgOwner = this.userObj.create(data.email);
        return "Created";
    }
}

export default Organization;