<template>
    <div class="content__header__section1">
        <div class="content__header__section1__desc">
            <a href="/">
                <img src="../../img/primary_logo.png" />
                <!-- {{ organizationAvatar }} -->
            </a>
            <h2>Welcome {{ name }}</h2>
            <p>Your job, your idea</p>
        </div>
        <div class="content__header__section1__profile">
            <img :src="avatar" class="far fa-user"/>
        </div>
    </div>
</template>

<script>
import User from '../services/UserService';

export default {
    data() {
        return {
            user: new User()
        }
    },

    computed: {
        name(){
            return this.user.displayName();
        },

        avatar(){
            return this.user.avatar();
        },

        organizationAvatar(){
            return this.user.organizationAvatar();
        }
    },
}
</script>