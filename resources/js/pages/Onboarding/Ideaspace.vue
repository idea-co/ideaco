<template>
    <section class="main-section">
        <div class="row justify-content-center main">
            <div class="col-10 col-lg-6 col-md-8 col-sm-8 color-white sign-in">
                <div class="minibox color-black">
                    <h4 class="title font-weight-bold">
                        You're bringing collaborated innovation to your workforce
                    </h4>
                    <p class="mb-0 mt-5 title-description">
                        Let's name your ideaspace, this is how everyone would see it
                    </p>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="content_section">
                                <form method="POST" @submit.prevent="createOrg">
                                    <div class="email_cont">
                                        <label for="name">Enter your ideaspace name</label>
                                        <input type="name" v-model="form.name" placeholder="Ideaspace Name" class="form-control">
                                    </div>
                                    <button class="sign-up-continue" :disabled="busy" type="submit">
                                        Continue
                                    </button>
                                </form>
                                <span class="text-muted">
                                    {{ form.name.length > 0 ? "Your ideaspace url: " + ideaspaceURl : "Your url will appear here"}}
                                </span>
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
    name: "Ideaspace",
    data() {
        return {
            busy: false,
            form: new Form({
                name: '',
            })
        }
    },

    methods: {
        createOrg(){
            this.$store.dispatch('createOrg', this.form)
                .then(res => {
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                })
        }
    },

    computed: {
        ideaspaceURl(){
            return this.form.name + ".ideacoapp.com";
        }
    },
}
</script>