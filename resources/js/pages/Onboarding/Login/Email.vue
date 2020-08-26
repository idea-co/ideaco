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
                <form @submit.prevent="findMember(form)">
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
import { createNamespacedHelpers } from 'vuex';
const { mapActions, mapState, mapGetters } = createNamespacedHelpers('login');

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
        ...mapActions([
            'findMember'
        ])
    },

    computed: {
        ...mapState([
            'busy',
            'error',
        ]),

        ...mapGetters([
            'organizationName'
        ]),
    },
}
</script>