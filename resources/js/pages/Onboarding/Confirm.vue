<template>
    <section class="main-section">
        <div class="row justify-content-center main">
            <div class="col-10 col-lg-8 col-md-8 col-sm-8 color-white sign-in">
                <div class="minibox color-black">
                    <h4 class="title font-weight-bold">
                        Confirm your email
                    </h4>
                    <div class="row mt-5 justify-content-center">
                        <div class="col-10">
                            <div class="content_section">
                                <form method="POST" @submit.prevent="confirmEmail(form)">
                                    <div class="email_cont">
                                        <label for="otp">
                                            Enter the OTP received by mail
                                        </label>
                                        <br>
                                        <div class="alert alert-danger" v-if="error">
                                            {{ error }}
                                        </div>
                                        <br>
                                        <input type="text" required v-model="form.otp" id="otp" placeholder="Enter 4 digit pin" class="form-control">
                                    </div>
                                    <div class="mb-0 mt-3">
                                        <button class="sign-up-continue" :disabled="busy" type="submit">
                                            Confirm email
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
        </div>
    </section>
</template>

<script>
import Form from '../../helpers/Form';
import { createNamespacedHelpers, mapGetters } from 'vuex'
const { mapState, mapActions } = createNamespacedHelpers('onboarding')

export default {
    data() {
        return {
            form: new Form({
                otp: '',
                email: '',
            }),
        }
    },

    computed: {
        ...mapState([
            'busy',
            'creatorEmail',
            'error',
        ]),  
    },

    methods: {
        ...mapActions([
            'confirmEmail'
        ]),
    },  

    mounted() {

    },
}
</script>