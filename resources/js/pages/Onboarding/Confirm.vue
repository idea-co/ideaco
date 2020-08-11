<template>
    <div>
        <h2>Confirm your email</h2>
        <div class="row mt-5">
            <div class="col-12">
                <div class="content_section">
                    <form method="POST" @submit.prevent="confirm">
                        <div class="email_cont">
                            <label for="otp">
                                Enter the OTP received by mail
                            </label>
                            <input type="text" v-model="form.otp" id="otp" placeholder="Enter 4 digit pin" class="form-control">
                        </div>
                        <div class="mb-0 mt-3">
                            <button class="sign-up-continue" type="submit">Confirm email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Form from '../../helpers/Form';

export default {
    data() {
        return {
            form: new Form({
                otp: '',
                email: this.$state.getters.email
            }),
        },

    },

    methods: {
        confirm(){
            this.form.post('/api/user/verify')

        }
    },  
}
</script>