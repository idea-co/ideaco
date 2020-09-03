<template>
    <section class="get-started-section bg-white">
        <div class="row getstartedbox">
            <div class="col-sm-6 bg-purple create color-white">
                <div class="minibox">
                    <h4 class="title font-weight-bold">Create an Ideaspace for your workforce</h4>
                    <p class="title-description">Ready?, then let’s set up your ideaspace</p>
                    <router-link to="/new" class="get-started">
                        <button class="get-started">Create An Ideaspace</button>
                    </router-link>
                </div>
            </div>
            <div class="col-sm-6 join bg-light-grey">
                <div class="minibox">
                    <h4 class="title font-weight-bold">Sign in to your workforce on the ideaspace</h4>
                    <p class="title-description color-grey">Join An Ideaspace</p>
                    <router-link to="/sign-in" class="join">
                        <button class="get-started">
                            Sign in
                        </button>
                    </router-link>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Start",

    data() {
        return {
            
        }
    },
}
</script>