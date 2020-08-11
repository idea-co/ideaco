<template>
    <div>
        <section class="main-section">
            <div class="row justify-content-center main">
                <div class="col-10 col-lg-6 col-md-8 col-sm-8 color-white sign-in">
                    <div class="minibox color-black">
                        <h4 class="title font-weight-bold">Great! let's set up your Ideaspace</h4>
                        <p class="mb-0 mt-5 title-description">
                            So we can send you a confirmation message and your company Ideaspace URL
                        </p>
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="content_section">
                                    <form method="POST" @submit.prevent="init">
                                        <div class="email_cont">
                                            <label for="company_email">
                                                Enter your company email
                                            </label>
                                            <input type="email" v-model="form.email" required id="company_email" placeholder="Enter Your Company Email Address" class="form-control">
                                        </div>
                                        <div class="mb-0 mt-3">
                                            <button class="sign-up-continue" :disabled="busy" type="submit">
                                                Continue 
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
    </div>
</template>

<script>
import Form from '../../helpers/Form';

export default {
    name: "new",
    data() {
        return {
            form: new Form({
                email: ''
            }),
            busy: false,
        }
    },

    methods: {
        init(){
            //validate
            if(!this.form.email) return false;

            //loading...
            this.busy = true;

            //send a request to the API
            this.$store.dispatch('init', this.form)
                .then( () => {
                    //change route to
                    this.$router.push('/confirm-email'); 
                })

        }
    },

    mounted() {

    },
}
</script>