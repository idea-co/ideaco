<template>
    <div class="sidebar">
        <div class="sidebar__logo">
            <a href="/">
                <img :src="secondaryLogo" alt="">
            </a>
        </div>

        <div class="sidebar__section">
            <router-link to="/" class="links" :class="{active_link: currentRouteName('Dashboard')}">
                <div class="sidebar__section__link explore">
                    <div class="sidebar__section__link__icon"><img src="../../img/Group8.svg"/></div>
                    <div>Explore</div>
                </div>
            </router-link>

            <router-link to="/challenges" class="links" :class="{active_link: currentRouteName('Challenge')}">
                <div class="sidebar__section__link challenge">
                    <div class="sidebar__section__link__icon"><img src="../../img/Group10.svg"/></div>
                    <div>Challenges</div>
                </div>
            </router-link>
            
            <router-link to="/overview" class="links" :class="{active_link: currentRouteName('Overview')}">
                <div class="sidebar__section__link overview">
                    <div class="sidebar__section__link__icon"><img src="../../img/Group11.svg"/></div>
                    <div>Overview</div>
                </div>
            </router-link>

            <router-link to="/history" class="links" :class="{active_link: currentRouteName('History')}">
                <div class="sidebar__section__link history">
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