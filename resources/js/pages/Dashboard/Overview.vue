<template>
    <div class="content">
        <!-- Page Header -->
        <AuthUserBanner>
            <div class="content__header__section2">
                <h2>Explore</h2>
                <a class="content__header__section2__link content__header__section2__link--active">Ideas</a>
                <a class="content__header__section2__link">Implementing</a>
                <a class="content__header__section2__link">Implemented</a>
                <a class="content__header__section2__link">Ideaspace</a>
            </div>
        </AuthUserBanner>

        <!--Page main content section -->
        <div class="main_section">
            <!--Overview section -->
            <div class="overview_section">
                <!-- idea tab -->
                <div class="ideas_tab row container-fluid">
                    <!--chart section -->
                    <div class="idea_chart col-12 col-xl-7">
                        <div class="idea_chart__header"><h3>Ideas Chart</h3></div>
                        <div class="idea_chart__identifier"><a class="idea_color"></a><a class="comment_color"></a><a class="vote_color"></a></div>
                        <div class="idea_chart__cont"><canvas id="main_chart"></canvas></div>
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
                <div class="progress_tab" style="display:none;"></div>
                <div class="implement_tab" style="display:none;"></div>
            </div>
        </div>    
    </div> 
</template>

<script>
import Chart from 'chart';
import IdeaContainer from '../../components/IdeaContainer';
import AuthUserBanner from '../../components/AuthUserBanner';


export default {
    components:{
        IdeaContainer,
        AuthUserBanner
    },
    data() {
        return {
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [
                    {
                        fill: 'false',
                        data: [1, 2, 3, 4],
                        borderColor: '#EFB84C',
                        borderWidth: 1,
                        pointRadius:3,
                        pointBackgroundColor: "#EFB84C",
                        lineTension:0,
                    },
                    {
                        fill: 'false',
                        data: [2, 1, 2, 3],
                        borderColor: '#669E1F',
                        borderWidth: 1,
                        pointRadius:3,
                        pointBackgroundColor: "#669E1F",
                        lineTension:0,
                    },
                    {
                        fill: 'false',
                        data: [4, 5, 4, 1],
                        borderColor: '#1F439E',
                        borderWidth: 1,
                        pointRadius:3,
                        pointBackgroundColor: "#1F439E",
                        lineTension:0,
                    }
                ],
            },
            type: 'line',
            options: {
                scales: {
                    xAxes: [{
                        gridLines: {
                            display:false
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                        beginAtZero: false,    
                        display:false 
                        },
                        ticks: {
                            fontSize: 11,
                            fontColor: "black",
                            beginAtZero: false,     
                            min: 0, // it is for ignoring negative step.
                            stepSize: 1
                        },
                    }]
                },
                title: {
                    display: false
                },
                legend: {
                    display:false
                }
            }
        }
    },
   /* mounted(){
        const ctx_graph = document.getElementById('main_chart').getContext('2d'); 
        let chart1 = new Chart(ctx_graph, {
            type: this.type, 
            data: this.data,
            options: this.options,
        });
    }*/
}
</script>