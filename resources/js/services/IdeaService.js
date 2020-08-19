class Idea{
    create(data){
        axios.post('/api/organizations/ideas', data)
        .then(response => {
            console.log(response);
        }).catch(err => {
            console.log(err);
        })
    }
}