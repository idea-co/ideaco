<template>
    <div>
        <h2>Join an idea workspace</h2>
        <div class="container">
            <p>Idea Space is Awesome</p>
        </div>
        <ul>
            <li v-for="user in users" :key="user.id">
                {{ user.email }}
            </li>
        </ul>
        <router-link to="/new">Create one here</router-link>
    </div>
</template>

<script>
export default {
    name: "join",
    data() {
        return {
            users: []
        }
    },

    methods: {
        getUsers(){
            axios
                .get('/api/users')
                .then(response => {
                    this.users = response;
                })
        }
    },
}
</script>