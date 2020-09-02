<template>
    <div>
        <div class="shareicon_mobile"><img src="../../img/plus.png"/></div>
        <footer class="dashboard_footer">

            <router-link to="/" class="links" :class="{active_link: allLinks.exploreActive}">
                <div class="explore" @click="updateLinks('exploreActive')"><img src="../../img/Group9.svg"/></div>
            </router-link>

            <router-link to="/challenge" class="links" :class="{active_link: allLinks.challengeActive}">
                <div class="challenge" @click="updateLinks('challengeActive')"><img src="../../img/Group10.svg"/></div>
            </router-link>

            <router-link to="/overview" class="links" :class="{active_link: allLinks.overviewActive}">
                <div class="overview" @click="updateLinks('overviewActive')"><img src="../../img/Group11.svg"/></div>
            </router-link>

            <router-link to="/history" class="links" :class="{active_link: allLinks.historyActive}">
                <div class="history" @click="updateLinks('historyActive')"><img src="../../img/Group12.svg"/></div>
            </router-link>
        </footer>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
    computed: mapGetters(['allLinks']),
    methods: {
        updateLinks(activeLink){
            this.$store.commit('updateLinks', activeLink);   
        }
    }
}
</script>