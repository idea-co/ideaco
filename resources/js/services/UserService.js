class User {
    /**
     * @param {By default we will use the localStorage unless the value of db is 'server'} db 
     * 
     */
    constructor(db = 'local'){
        //check if the state is [logged-on]
        //yes - fetch the user logged on
        //no - silently ignore

        if(db === 'local'){
            let json = '';
            json = localStorage.getItem('user');
            if(json){
                json = JSON.parse(json);
                this.user = json.data;
            }else{
                this.user = null;
            }
        }

    }

    displayName(){
        return this.user.displayName;
    }

    avatar(){
        return this.user.avatar ?? "gravatar";
    }

    position(){
        return this.user.position
    }

    twitter(){
        return this.user.twitter;
    }

    organizationAvatar(){
        return this.user.organization.photo_url ?? this.user.organization.name;
    }

    /**
     * Create a new user or return 
     * the specified user if they 
     * already exist
     */
    create(){

    }

}

export default User;