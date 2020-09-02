<template>
    <div>
        <router-view name="dashboard"></router-view>
    </div>
</template>

<script>
import AuthUserBanner from '../../components/AuthUserBanner';

export default {
    components: {
        AuthUserBanner
    }    
}
</script>