<template>
    <section class="main-section">
        <div class="row justify-content-center main">
            <div class="col-10 col-lg-6 col-md-8 col-sm-8 color-white sign-in">
                <div class="minibox color-black">
                    <h4 class="title font-weight-bold">
                        Confirm your email
                    </h4>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="content_section">
                                <form method="POST" @submit.prevent="confirm">
                                    <div class="email_cont">
                                        <label for="otp">
                                            Enter the OTP received by mail
                                        </label>
                                        <div class="alert alert-danger" v-if="error">
                                            {{ error }}
                                        </div>
                                        <input type="text" v-model="form.otp" required id="otp" placeholder="Enter 4 digit pin" class="form-control">
                                    </div>
                                    <div class="mb-0 mt-3">
                                        <button class="sign-up-continue" :disabled="busy" type="submit">Confirm email</button>
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

export default {
    data() {
        return {
            form: new Form({
                otp: '',
                email: this.$store.getters.creatorEmail,
            }),
            busy: false,
            error: '',
        }
    },

    methods: {
        confirm(){
            // validate
            if(!this.form.otp) return false;

            //busy state
            this.busy = true;

            //make the request
            this.form.post('/api/user/verify')
                .then(res => {
                    if(res.verified === false){
                        this.error = res.reason;
                        return false;
                    }

                    this.$router.push('/ideaspace')
                })
        }
    },  

    mounted() {

    },
}
</script>