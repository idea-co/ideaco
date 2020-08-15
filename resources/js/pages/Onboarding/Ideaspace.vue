<template>
    <section class="main-section">
        <div class="row justify-content-center main">
            <div class="col-10 col-lg-6 col-md-8 col-sm-8 color-white sign-in">
                <div class="minibox color-black">
                    <h4 class="title font-weight-bold">
                        You're bringing collaborated innovation to your workforce
                    </h4>
                    <p class="mb-0 mt-5 title-description font-weight-bold">
                        Let's name your ideaspace, this is how everyone would see it
                    </p>
                    <div class="row mt-5 justify-content-center">
                        <div class="col-10">
                            <div class="content_section">
                                <form method="POST" @submit.prevent="createOrg" @keydown="form.errors.clear()">
                                    <div class="email_cont">
                                        <label for="name">Enter your ideaspace name</label><br>
                                        <div class="alert alert-danger mt-2" v-if="form.errors.any()">
                                            <p v-for="(error, index) in form.errors.all()" :key="index" class="mb-0">
                                                 {{ error[0] }}
                                            </p>
                                        </div>
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
                shortname: '',
                owner: this.$store.getters.creator,
            }),
            error: '',
        }
    },

    methods: {
        createOrg(){
            //set shortname value
            this.$store.dispatch('createOrg', this.form)
                .then(res => {
                    if(res.data.errors){
                        this.error = res.errors.data;
                        this.form.errors.record(res.errors.data);
                    }else{
                        this.$router.push('/team')
                    }
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