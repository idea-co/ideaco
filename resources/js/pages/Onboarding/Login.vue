<template>
    <section class="main-section">
        <div class="row justify-content-center main">
            <div class="col-10 col-lg-8 col-md-8 col-sm-8 color-white sign-in">
                <div class="minibox color-black">
                    <h4 class="title font-weight-bold">
                        Your Ideaspace has been set up 
                    </h4>
                    <p class="mb-0 mt-5 title-description font-weight-bold">Now let's sign you in as the admin</p>
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <form @submit.prevent="login(form)">
                                <div class="mb-0 mt-2">
                                    <label for="name" class="mb-0 mt-1 text-left">Your name</label>
                                    <input type="text" v-model="form.name" id="name" class="form-control" autocomplete="off" placeholder="Enter your display name">
                                    <span class="text-muted">This will be shown to everyone on the workspace</span>
                                </div>
                                <div class="mb-0 mt-2">
                                    <label for="password" class="mb-0 mt-1 text-left">Create a password</label>
                                    <input type="password" id="password" v-model="form.password" class="form-control" autocomplete="off" placeholder="Enter a password longer than 8 characters">
                                </div>
                                <div class="mb-0 mt-3">
                                    <button class="sign-up-continue" :disabled="busy" type="submit">
                                        Sign in
                                        <div v-if="busy" class="spinner-border spinner-border-sm text-white-50" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Form from '../../helpers/Form'
import { createNamespacedHelpers } from 'vuex'
const { mapActions, mapState } = createNamespacedHelpers('onboarding');

export default {
    name: "Login",
    data() {
        return {
            form: new Form({
                name: '',
                email: '',
                password: ''
            }),
        }
    },

    computed:{
        ...mapState([
            'busy',
            'error'
        ])
    },

    methods: {
        ...mapActions([
            'login'
        ])
    },
}
</script>