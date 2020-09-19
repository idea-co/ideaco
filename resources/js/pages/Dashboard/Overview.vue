<template>
    <div class="content">
        <!-- Page Header -->
        <AuthUserBanner>
            <div class="content__header__section2">
                <h2>Overview</h2>
                <a v-for="(tab, index) in tabs" :key="{index}"
                    class="content__header__section2__link"
                    :class="{'content__header__section2__link--active': currentTab === index}"
                    @click="currentTab = index">
                    {{tab}}
                </a>
            </div>
        </AuthUserBanner>

        

        <!--Page main content section -->
        <div class="main_section">
            <!--Overview section -->
            <div class="overview_section">
                <!-- idea tab -->
                <div class="ideas_tab row container-fluid">
                    <!--chart section -->
                    <div class="idea_chart col-12 col-xl-7" v-show="currentTab == 0">
                        <div class="idea_chart__header"><h3>Ideas Chart</h3></div>
                        <div class="idea_chart__identifier"><a class="idea_color"></a><a class="comment_color"></a><a class="vote_color"></a></div>
                        <div class="idea_chart__cont"><canvas id="main_chart"></canvas></div>
                    </div>

                    <div class="col-12 col-xl-7" v-show="currentTab == 1" style="margin: 0px; padding:0px;">
                        <IdeaContainer v-bind:status= "implementing"/>
                        <IdeaContainer v-bind:status= "implementing"/>
                    </div>

                    <div class="col-12 col-xl-7" v-show="currentTab == 2" style="margin: 0px; padding:0px;">
                        <IdeaContainer v-bind:status= "implemented"/>
                        <IdeaContainer v-bind:status= "implemented"/>
                    </div>

                    <div class="col-12 col-xl-7" v-show="currentTab == 3">
                        Ideaspace Page
                    </div>
                    
                    <!--record section -->
                    <div class="idea_record col-12 col-xl-4 offset-xl-1">
                        <div class="idea_record__cont row">
                            <div class="idea_record__cont__content col-12">
                                <div class="idea_record__cont__content__header"><h3>This Month</h3></div>
                                <div class="idea_record__cont__content__details">
                                    <div class="row">
                                        <div class="record col-4"><h3 class="color1">31</h3><p>ideas</p></div>
                                        <div class="record col-4"><h3 class="color2">69</h3><p>Comments</p></div>
                                        <div class="record col-4"><h3 class="color3">107</h3><p>Upvotes</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="idea_record__cont__content col-12">
                                <div class="idea_record__cont__content__header"><h3>You Have Given (All Time)</h3></div>
                                <div class="idea_record__cont__content__details">
                                    <div class="row">
                                        <div class="record col-4"><h3>205</h3><p>ideas</p></div>
                                        <div class="record col-4"><h3>492</h3><p>Comments</p></div>
                                        <div class="record col-4"><h3>674</h3><p>Upvotes</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="idea_record__cont__content col-12">
                                <div class="idea_record__cont__content__header"><h3>You Have Received (All Time)</h3></div>
                                <div class="idea_record__cont__content__details">
                                    <div class="row">
                                        <div class="record col-4"><h3>892</h3><p>Comments</p></div>
                                        <div class="record col-4"><h3>2102</h3><p>Upvotes</p></div>
                                        <div class="record col-4"><h3>19</h3><p>Implemented</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div> 
</template>

<script>
import Chart from 'chart';
import IdeaContainer from '../../components/IdeaContainer';
import AuthUserBanner from '../../components/AuthUserBanner';


export default {
    name:"Overview",
    components:{
        IdeaContainer,
        AuthUserBanner
    },
    data() {
      return {
       currentTab: 0,
       tabs: ["Ideas", "Implementing", "Implemented", "Ideaspace"],
       implementing: 'idea_state__header--implementing',
       implemented: 'idea_state__header--implemented'
      }
    }
}
</script>