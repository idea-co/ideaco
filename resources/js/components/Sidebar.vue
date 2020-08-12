<template>
    <div class="sidebar">
        <a class="close_menu" onclick="toggle_sidebar()"><i class="fas fa-arrow-left"></i></a>
        <div class="sidebar__logo">
            <router-link to="/app">
                <img :src="secondaryLogo" alt="">
            </router-link>
        </div>
        <div class="sidebar__section">
            <div class="sidebar__section__link sidebar__section__link--active explore"><div class="sidebar__section__link__icon"><img src="../../img/Group9.png"/></div>Explore</div>
            <div class="sidebar__section__link challenge"><div class="sidebar__section__link__icon"><img src="../../img/Group10.png"/></div><div>Challenges</div></div>
            <div class="sidebar__section__link overview"><div class="sidebar__section__link__icon"><img src="../../img/Group11.png"/></div><div>Overview</div></div>
            <div class="sidebar__section__link history"><div class="sidebar__section__link__icon"><img src="../../img/Group12.png"/></div><div>History</div></div>
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