<template>
    <div>
        <h2>This is the home page</h2>
        Your email:
        <input type="email" v-model="email">

        User email shows here:
        {{ email }}

        <br/>

        <button @click="add">
            {{ number }}
        </button>

        <form method="post" @submit.prevent="register">
            <input type="text" placeholder="Name" v-model="form.name">
            <input type="email" placeholder="Email" v-model="form.email">
            <button class="btn" type="Submit">Submit</button>
        </form>
    </div>
</template>

<script>
import Form from '../../helpers/Form';

export default {
    name: "Home",
    data() {
        return {
            number: 1,
            email: '',
            form: new Form({
                name: '',
                email: ''
            }),
        }
    },

    methods: {
        add(){
            this.number += 1;
        },

        register(){
            this.form.post('/api/users')
                .then(response => {
                    console.log(response);
                }).catch(err => {
                    alert(err);
                })
        }
    },
}
</script>