class Team{
    create(form, organizationId){
        return form.post('/api/organizations/'+ organizationId +'/teams')
            .then(response => {
                return response;
            })
            .catch(err => {
                return err;
            })
    }
}

export default Team;