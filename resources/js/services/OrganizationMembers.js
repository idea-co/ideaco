class Members{
    /**
     * Find a member of an organization
     * by email
     * @param {array} form 
     */
    find(form, organizationId){
        return form.post('/api/organizations/'+ organizationId +'/members/search')
            .then(response => {
                return response;
            })
            .catch(err => {
                return err;
            })
    }
}

export default Members;