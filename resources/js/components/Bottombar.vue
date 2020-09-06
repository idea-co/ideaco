<template>
    <div>
        <div class="shareicon_mobile"><img src="../../img/plus.png"/></div>
        <footer class="dashboard_footer">

            <router-link to="/" class="links">
                <div class="explore"><img src="../../img/Group9.svg"/></div>
            </router-link>

            <router-link to="/challenge" class="links">
                <div class="challenge"><img src="../../img/Group10.svg"/></div>
            </router-link>

            <router-link to="/overview" class="links">
                <div class="overview"><img src="../../img/Group11.svg"/></div>
            </router-link>

            <router-link to="/history" class="links">
                <div class="history"><img src="../../img/Group12.svg"/></div>
            </router-link>
        </footer>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
    
}
</script>