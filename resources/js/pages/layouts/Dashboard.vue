<template>
    <router-view name="dashboard"></router-view>
</template>

<script>
import AuthUserBanner from '../../components/AuthUserBanner';

export default {
    components: {
        AuthUserBanner
    }    
}
</script>