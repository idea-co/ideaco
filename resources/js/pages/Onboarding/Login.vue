<template>
    <section class="main-section">
        <div class="row justify-content-center main">
            <div class="col-10 col-lg-6 col-md-8 col-sm-8 color-white sign-in">
                <div class="minibox color-black">
                    <h4 class="title font-weight-bold">
                        Your Ideaspace has been set up 
                    </h4>
                    <p class="mb-0 mt-5 title-description">Now let's sign you in as the admin</p>
                    <div class="row">
                        <div class="col-12">
                            <form @submit.prevent="login">
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
                                    <button class="sign-up-continue" type="submit">Join</button>
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
export default {
    name: "Login",
    data() {
        return {
            form: new Form({
                name: '',
                email: this.$store.getters.creatorEmail,
                password: ''
            }),
            busy: false,
        }
    },

    methods: {
        login(){
            this.$store.dispatch('adminLogin', this.form)
            .then(response => {
                console.log(response);
                /**
                 * In future we want to redirect to a
                 * sub-domain created for that Ideaspace
                 * something like {shortname.ideaco.com}
                 */
                //redirect to dashboard
                window.location.href = "/app";
            }).catch(err => {
                console.log(err);
            })
        }
    },
}
</script>