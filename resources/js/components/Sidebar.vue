<template>
    <div class="sidebar">
        <div class="sidebar__logo">
            <a href="/">
                <img :src="secondaryLogo" alt="">
            </a>
        </div>

        <div class="sidebar__section">
            <router-link to="/" class="links" :class="{active_link: allLinks.exploreActive}">
                <div class="sidebar__section__link explore" @click="updateLinks('exploreActive')">
                    <div class="sidebar__section__link__icon"><img src="../../img/Group9.svg"/></div>
                    <div>Explore</div>
                </div>
            </router-link>

            <router-link to="/challenge" class="links" :class="{active_link: allLinks.challengeActive}">
                <div class="sidebar__section__link challenge" @click="updateLinks('challengeActive')">
                    <div class="sidebar__section__link__icon"><img src="../../img/Group10.svg"/></div>
                    <div>Challenges</div>
                </div>
            </router-link>
            
            <router-link to="/overview" class="links" :class="{active_link: allLinks.overviewActive}">
                <div class="sidebar__section__link overview" @click="updateLinks('overviewActive')">
                    <div class="sidebar__section__link__icon"><img src="../../img/Group11.svg"/></div>
                    <div>Overview</div>
                </div>
            </router-link>

            <router-link to="/history" class="links" :class="{active_link: allLinks.historyActive}">
                <div class="sidebar__section__link history"  @click="updateLinks('historyActive')">
                    <div class="sidebar__section__link__icon"><img src="../../img/Group12.svg"/></div>
                    <div>History</div>
                </div>
            </router-link>
        </div>

        <button>Share</button>
        <div class="sidebar__section__logout logout"><div class="sidebar__section__logout__icon"><img src="../../img/Group13.png"/></div><div>Log Out</div></div>
    </div> 
</template>

<script>
import { mapGetters } from 'vuex'

export default {
    data() {
        return {
            secondaryLogo: require('../../img/secondary_logo.png'),
        }
    },
    computed: mapGetters(['allLinks']),
    methods: {
        updateLinks(activeLink){
            this.$store.commit('updateLinks', activeLink);   
        }
    }
    

}
</script>