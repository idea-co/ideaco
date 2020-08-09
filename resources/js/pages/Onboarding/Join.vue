<template>
    <!-- MAIN SECTION -->
    <section class="main-section">
        <div class="row justify-content-center main">
            <div class="col-10 col-lg-6 col-md-8 col-sm-8 color-white sign-in">
                <div class="minibox color-black">
                    <h4 class="title font-weight-bold">Join Your Ideaspace and Share Those Awesome Ideas</h4>
                    <p class="mb-0 mt-5 title-description">Enter your ideaspaces’s URL</p>
                    <div class="row">
                        <div class="col-12">
                            <form id="signup-form" name="signup-form" action="join-email.html">
                                <div class="mb-0 mt-2">
                                    <!-- <label for="name" class="mb-0 mt-1 text-left">Enter your ideaspaces’s URL</label> -->
                                    <input type="text" id="name" name="name" class="form-control" autocomplete="off" placeholder="Your Ideaspace URL">
                                </div>
                                <div class="mb-0 mt-3">
                                    <a href="join-email.html">
                                        <button class="sign-up-continue">Join</button>
                                    </a>                                                
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
export default {
    name: "join",
    data() {
        return {
            users: []
        }
    },

    methods: {
        getUsers(){
            axios
                .get('/api/users')
                .then(response => {
                    this.users = response;
                })
        }
    },
}
</script>