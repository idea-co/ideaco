<template>
    <!-- MAIN SECTION -->
    <section class="main-section">
        <div class="row justify-content-center main">
            <div class="col-10 col-lg-6 col-md-8 col-sm-8 color-white sign-in">
                <div class="minibox color-black">
                    <h4 class="title font-weight-bold">Welcome, Login to your Ideaspace and Share Those Awesome Ideas</h4>
                    <p class="mb-0 mt-5 title-description">Enter your ideaspaces’s URL to continue</p>
                    <div class="row">
                        <div class="col-12">
                            <form id="signup-form" name="signup-form" @submit.prevent="join">
                                <div class="mb-0 mt-2">
                                    <div class="input-group mb-2">
                                        <input type="text" id="url" class="form-control" autocomplete="off" placeholder="Your Ideaspace URL is your organization's unique name">
                                        <div class="input-group-append">
                                            <div class="input-group-text">.idea.com</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0 mt-3">
                                    <button class="sign-up-continue" type="submit">Continue</button>                    
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
import Form from '../../../helpers/Form';

export default {
    name: "login",
    data() {
        return {
            form: new Form({
                shortname: ''
            }),
        }
    },

    methods: {
        join(){
            this.$store.dispatch('findOrganization', this.form)
            .then(response => {
                if(response instanceof Object){
                    this.$router.push('/email')
                }
            })
        }
    },
}
</script>