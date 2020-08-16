<template>
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
</template>