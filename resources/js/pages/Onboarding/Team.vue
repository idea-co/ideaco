<template>
    <section class="main-section">
        <div class="row justify-content-center main">
            <div class="col-10 col-lg-6 col-md-8 col-sm-8 color-white sign-in">
                <div class="minibox color-black">
                    <h4 class="title font-weight-bold">
                        Let's keep your diverse workspace orderly
                    </h4>
                    <p class="mb-0 mt-5 title-description">
                        What teams / departments would you like to add?
                    </p>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="content_section">
                                <form method="POST" @submit.prevent="createTeam" @keydown="form.errors.clear()">
                                    <div class="email_cont">
                                        <div class="alert alert-danger mt-2" v-if="form.errors.any()">
                                            <p v-for="(error, index) in form.errors.all()" :key="index" class="mb-0">
                                                 {{ error[0] }}
                                            </p>
                                        </div>

                                        <input type="name" v-model="form.team_name" placeholder="Enter teams / departments" class="form-control">
                                        <span class="text-muted text-center">You can add more anytime</span>
                                    </div>
                                    <button class="sign-up-continue" :disabled="busy" type="submit">
                                        Continue
                                    </button>
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
    name: "Team",
    data() {
        return {
            form: new Form({
                team: ''
            }),
            busy: false,
        }
    },

    methods: {
        createTeam(){
            this.$store.dispatch('')
        }
    },
}
</script>