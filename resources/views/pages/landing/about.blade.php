@extends('layouts.landing')

@section('title')
    <title>About page</title>
@endsection

@section('content')
    <div class="block" id="about">
        <!-- HERO SECTION -->
        <section class="hero-section">
        </section> 

        <!-- OUR MISSION SECTION -->
        <section class="our-mission-section bg-white">
            <div class="container-fluid">
                <div class="justify-content-around row text-center color-black">
                    <div class="col-10">
                        <div class="ml-2 mr-2">
                            <h4 class="title font-weight-bold">Our Mission</h4>
                            <p class="title-description color-grey">
                                IDEACO is robust and powerful idea management system<br>
                                with phases through share, support, prioritize and implementation of the<br>
                                right ideas for businesses. </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- OUR VISION SECTION -->
        <section class="our-vision-section bg-light-grey color-white">
            <div class="container-fluid">
                <div class="justify-content-around row text-center">
                    <div class="col-10">
                        <div class="ml-2 mr-2">
                            <h4 class="title font-weight-bold color-black">IDEACO was founded to</h4>
                            <p class="title-description color-grey">
                                IDEACO is robust and powerful idea management system<br>
                                with phases through share, support, prioritize and implementation of the<br>
                                right ideas for businesses. </p>
                            <br>
                            <p class="title-description color-grey">
                                You can now with prioritize, share, support and implement the right ideas </p>

                            <div class="pt-3">
                                <a href="/start" class="mt-4">
                                    <button class="get-started" onclick="window.location.href='/start'">Get started</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- TEAM SECTION -->
        <section class="team-section">
            <div class="container-fluid">
            <h4 class="font-weight-bold mb-5 pt-2 text-center title">Meet Our Team</h4>
                <div class="row text-center ml-lg-5 mr-lg-5 ml-sm-1 mr-sm-1">
                    <div class="col-sm-3 profile">
                        <img class="img-fluid" src="/img/profile1.png" >
                        <p class="name font-weight-bold mb-1">Samuel Lejourn</p>
                        <p class="job-title mb-0 color-grey">Head of Development</p>
                    </div>
                    <div class="col-sm-3 profile">
                        <img class="img-fluid" src="/img/profile2.png" >
                        <p class="name font-weight-bold mb-1">Atinu Nuga</p>
                        <p class="job-title mb-0 color-grey">Head of Risk</p>
                    </div>
                    <div class="col-sm-3 profile">
                        <img class="img-fluid" src="/img/profile3.png" >
                        <p class="name font-weight-bold mb-1">Nifemi Julia</p>
                        <p class="job-title mb-0 color-grey">Team Lead, Product</p>
                    </div>
                    <div class="col-sm-3 profile">
                        <img class="img-fluid" src="/img/profile4.png" >
                        <p class="name font-weight-bold mb-1">Ajibade Azeez</p>
                        <p class="job-title mb-0 color-grey">Team Lead, DevOps</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection