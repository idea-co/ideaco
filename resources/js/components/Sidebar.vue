<template>
    <div class="sidebar">
        <div class="sidebar__logo">
            <a href="/">
                <img :src="secondaryLogo" alt="">
            </a>
        </div>

        <div class="sidebar__section">
            <router-link to="/" class="links active-link">
                <div class="sidebar__section__link explore">
                    <div class="sidebar__section__link__icon"><img src="../../img/Group9.png"/></div>
                    <div>Explore</div>
                </div>
            </router-link>

            <router-link to="/challenge" class="links">
                <div class="sidebar__section__link challenge">
                    <div class="sidebar__section__link__icon"><img src="../../img/Group10.png"/></div>
                    <div>Challenges</div>
                </div>
            </router-link>
            
            <router-link to="/overview" class="links">
                <div class="sidebar__section__link overview">
                    <div class="sidebar__section__link__icon"><img src="../../img/Group11.png"/></div>
                    <div>Overview</div>
                </div>
            </router-link>

            <router-link to="/history" class="links">
                <div class="sidebar__section__link history">
                    <div class="sidebar__section__link__icon"><img src="../../img/Group12.png"/></div>
                    <div>History</div>
                </div>
            </router-link>
        </div>

        <button>Share</button>
        <div class="sidebar__section__logout logout"><div class="sidebar__section__logout__icon"><img src="../../img/Group13.png"/></div><div>Log Out</div></div>
    </div> 
</template>

<script>
export default {
    data() {
        return {
            secondaryLogo: require('../../img/secondary_logo.png'),
        }
    },
}
</script>