<template>
    <div class="content">
        <!-- Page Header -->
        <AuthUserBanner>
            <div class="content__header__section2">
                <h2>History</h2>
                <a class="content__header__section2__link content__header__section2__link--active">Ideas</a>
                <a class="content__header__section2__link">Comments</a>
                <a class="content__header__section2__link">Vote</a>
            </div>
        </AuthUserBanner>

        <!--Page main content section -->
        <div class="main_section"></div>
    </div>
</template>

<script>
import AuthUserBanner from '../../components/AuthUserBanner';

export default {
    name:"History",
    components:{AuthUserBanner}
}
</script>