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
                <form @submit.prevent="login(form)">
                    <div class="email_cont">
                        <label for="password">Password</label>
                        <input type="password" id="password" v-model="form.password" placeholder="Enter your password" class="form-control">
                    </div>
                    <button class="sign-up-continue" :disabled="busy" type="submit">
                        Sign in
                        <div v-if="busy" class="spinner-border spinner-border-sm text-white-50" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>  
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Form from '../../../helpers/Form';
import { createNamespacedHelpers } from 'vuex';
const {mapActions, mapGetters, mapState} = createNamespacedHelpers('login');

export default {
    name: "Password",
    data() {
        return {
            form: new Form({
                password: '',
                email: '',
            }),
        }
    },
    methods: {
        ...mapActions([
            'login'
        ]),
    },

    computed: {
        ...mapGetters([
            'organizationName',
            'email'
        ]),

        ...mapState([
            'error',
            'busy'
        ]),
    },
}
</script>