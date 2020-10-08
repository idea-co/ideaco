<template>
    <header class="content__header">
        <div class="content__header__section1">
            <div class="content__header__section1__desc">
                <a href="/">
                    <img src="../../img/primary_logo.png" />
                    <!-- {{ organizationAvatar }} -->
                </a>
                <h2>Welcome {{  }}</h2>
                <p>Your job, your idea</p>
            </div>
            <div class="content__header__section1__profile">
                <img :src="{}" class="far fa-user" alt=""/>
            </div>
        </div>
        <slot></slot>
    </header>
</template>

<script>
import User from '../services/UserService';

export default {
    name: "AuthUserBanner",
    data() {
        return {
            user: new User
        }
    },

   /* computed: {
        name(){
            return this.user.displayName();
        },

        avatar(){
            return this.user.avatar();
        },

        organizationAvatar(){
            return this.user.organizationAvatar();
        }
    },*/
}
</script>