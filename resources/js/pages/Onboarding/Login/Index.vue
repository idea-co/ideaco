<template>
    <div class="minibox color-black">
        <h4 class="title font-weight-bold">Welcome, Login to your Ideaspace and Share Those Awesome Ideas</h4>
        <p class="mb-0 mt-5 title-description">Enter your ideaspaces’s URL to continue</p>
        <div class="row justify-content-center">
            <div class="col-10">
                <form id="signup-form" name="signup-form" @submit.prevent="findOrganization(form)">
                    <div class="mb-0 mt-2">
                        <div class="input-group mb-2">
                            <input type="text" id="url" v-model="form.shortname" class="form-control" autocomplete="off" placeholder="Your Ideaspace URL is your organization's unique name">
                            <div class="input-group-append">
                                <div class="input-group-text">.idea.com</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-0 mt-3">
                        <button class="sign-up-continue" :disabled="busy" type="submit">Continue</button>   
                        <div v-if="busy" class="spinner-border spinner-border-sm text-white-50" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>                 
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Form from '../../../helpers/Form';
import { createNamespacedHelpers } from 'vuex'
const { mapActions, mapState } = createNamespacedHelpers('login');

export default {
    name: "login",
    data() {
        return {
            form: new Form({
                shortname: ''
            }),
        }
    },

    computed: {
        ...mapState([
            'error',
            'busy'
        ])
    },

    methods: {
        ...mapActions([
            'findOrganization'
        ]),
    },
}
</script>