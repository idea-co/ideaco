<template>
    <div class="content">
        <!-- Page Header -->
        <AuthUserBanner>
            <div class="content__header__section2">
                <h2>History</h2>
                <a class="content__header__section2__link content__header__section2__link--active">Most Active</a>
                <a class="content__header__section2__link">Most Recent</a>
                <a class="content__header__section2__link filter"><i class="fas fa-filter"></i><span> Filter </span><i class="fas fa-caret-down"></i></a>
            </div>
        </AuthUserBanner>

        <!--Page main content section -->
        <div class="main_section"></div>
    </div>
</template>

<script>
import AuthUserBanner from "../../components/AuthUserBanner";

export default {
    name:"Challenge",
    components: {AuthUserBanner}
}
</script>