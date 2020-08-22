<template>
    <div class="content_section minibox color-black">
        <h2 class="font-weight-bold">
            {{ organizationName }}
        </h2>
        <p class="mb-5 mt-2 title-description font-weight-bold">
            Great! Complete your sign in with your password
        </p>

        <div class="row justify-content-center">
            <div class="col-10">
                <form @submit.prevent="authMember">
                    <div class="email_cont">
                        <label for="password">Password</label>
                        <input type="password" id="password" v-model="form.password" placeholder="Enter your password" class="form-control">
                    </div>
                    <button class="sign-up-continue" type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Form from '../../../helpers/Form';
export default {
    name: "Password",
    data() {
        return {
            form: new Form({
                password: '',
                email: this.$store.getters.loginUserEmail,
            }),
        }
    },
    methods: {
        authMember(){
            this.$store.dispatch('loginToWorkspace', this.form)
            .then(response => {
                if(response){
                    this.$store.commit('setLoggedInUser', response);
                    
                    //navigate to organization dashboard
                    window.location.href = '/app/'+response.data.organization.shortname;
                }
            })
            .catch(err => {
                console.log(err);
            })
        }
    },

    computed: {
        /**
         * Get the found organization's name
         */
        organizationName(){
            return this.$store.getters.loginOrganization.name
        },

        getUserEmail(){
            return this.$store.getters.loginUserEmail
        }
    },
}
</script>