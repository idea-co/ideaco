<template>
    <div>
        <div class="shareicon_mobile"><img src="../../img/plus.png"/></div>
        <footer class="dashboard_footer">

            <router-link to="/" class="links" :class="{active_link: currentRouteName('Dashboard')}">
                <div class="explore"><img src="../../img/Group8.svg"/></div>
            </router-link>

            <router-link to="/challenge" class="links" :class="{active_link: currentRouteName('Challenge')}">
                <div class="challenge"><img src="../../img/Group10.svg"/></div>
            </router-link>

            <router-link to="/overview" class="links" :class="{active_link: currentRouteName('Overview')}">
                <div class="overview"><img src="../../img/Group11.svg"/></div>
            </router-link>

            <router-link to="/history" class="links" :class="{active_link: currentRouteName('History')}">
                <div class="history"><img src="../../img/Group12.svg"/></div>
            </router-link>
        </footer>
    </div>
</template>

<script>
    export default {
        methods: {
            currentRouteName(linkRoute) {
                console.log(this.$route.name);
                if(linkRoute == this.$route.name){
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
</script>