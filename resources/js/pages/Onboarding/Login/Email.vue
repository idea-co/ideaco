<template>
    <div class="content_section minibox color-black">
        <h2 class="font-weight-bold">
            {{ organizationName }}
        </h2>
        <p class="mb-5 mt-2 title-description font-weight-bold">Found your Ideaspace, just checking to see that you're in</p>

        <button class="google_button mb-2">
            <img src="../../../../img/Google.svg"/>
            Continue with Google
        </button>
        <p>OR</p>
        <div class="row justify-content-center">
            <div class="col-10">
                <form @submit.prevent="findEmail">
                    <div class="email_cont">
                        <label for="email">Enter Email Address</label>
                        <input type="email" id="email" v-model="form.email" placeholder="Enter your email address" class="form-control">
                    </div>
                    <button class="sign-up-continue" type="submit">Continue</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Form from '../../../helpers/Form';
export default {
    name: "Email",
    data() {
        return {
            form: new Form({
                email: ''
            }),
        }
    },
    methods: {
        findEmail(){
            this.$store.dispatch('findMemberByEmail', this.form)
            .then(response => {
                if(response){
                    this.$store.commit('setLoginUserEmail', response);
                    this.$router.push("/sign-in/password");
                }else{
                    this.$router.push("/sign-in/not-found");
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
        }
    },
}
</script>