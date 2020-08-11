@extends('layouts.landing')

@section('title')
    <title>Home page</title>
@endsection

@section('content')
    <div class="block" id="home">
        <div class="block__section1">
            <div class="block__section1__cont1">
                <h1>Never Lose Your Next Big Ideal.</h1>
                <p>IDEACO is robust and powerful idea management system with phases through share, support, prioritize
                and implementation of the right ideas for businesses.<br>Begin managing ideas.</p>
                <button onclick="window.location.href='/start'">Get Started</button>
            </div>
            <div class="block__section1__cont2">
                <img src="{{ asset('img/ideaco_bulb.png') }}"/>
            </div>
        </div>
        <div class="block__section2">
            <div class="block__section2__cont1">
                <img src="{{ asset('img/Frame.png') }}"/>
                <div>
                    <h2>We Believe Ideas Are Worth More When We Manage Well</h2>
                    <p>IDEACO helps to make the transition to implementation smother, ensuring that the next big idea never  
                    washes away.</p>
                </div>
            </div>
        </div>
        <div class="block__section3">
            <h2>A Central Idea Space For Any Work Force</h2>
            <p>IDEACO provides an idea ecosystem where ideas are crowd sourced, shared, supported, promoted its powerful flow</p>
            <div class="block__section3__cont">
                <div class="block__section3__cont__box">
                    <img src="{{ asset('/img/rectangle4.png') }}"/>
                    <div>
                        <h2>Everyone can share idea</h2>
                        <p>Ideas come to everyone, now everyone in your workspace can share their ideas without hesitation.</p>
                    </div>
                </div>
                <div class="block__section3__cont__box">
                    <img src="{{asset('/img/rectangle1.png')}}"/>
                    <div>
                        <h2>Crowd supported system</h2>
                        <p>Shared idea can be voted on by anyone in the workspace, as well as leaving a comment on the original idea.</p>
                    </div>
                </div>
                <div class="block__section3__cont__box">
                    <img src="{{ asset('/img/rectangle2.png') }}"/>
                    <div>
                        <h2>Challeges needing ideas</h2>
                        <p>Company challenges can be shared to workspace to allow for injection of new ideas.</p>
                    </div>
                </div>
                <div class="block__section3__cont__box">
                    <img src="{{ asset('/img/rectangle3.png') }}"/>
                    <div>
                        <h2>Oversee your contribution</h2>
                        <p>See what you have contributed to your workspace and the ideas that have been implemented.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="block__section4">
            <div class="block__section4__cont">
                <h2>Client Testimonials</h2>
                <div class="block__section4__cont__slider">
                    <div class="left_arrow"><i class="fas fa-arrow-left" onclick="minusSlides()"></i></div>
                    <div class="slider_cont">
                        <div class="img_cont slider1">
                            <div class="img_cont__image"><img src="{{asset ('/img/rectangle63.png') }}"/></div>
                            <div class="img_cont__content">
                                <img src="{{ asset ('/img/Group1.png') }}"/>
                                <p class="testimony">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.</p>
                                <h4>Jude </h4>
                                <p>Backend developer</p>
                            </div>
                        </div>
                        <div class="img_cont slider2">
                            <div class="img_cont__image"><img src="{{asset ('/img/rectangle63.png') }}"/></div>
                            <div class="img_cont__content">
                                <img src="{{ asset ('/img/Group1.png') }}"/>
                                <p class="testimony">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.</p>
                                <h4>Abdulazeez</h4>
                                <p>Frontend developer</p>
                            </div>
                        </div>
                        <div class="img_cont slider3">
                            <div class="img_cont__image"><img src="{{asset ('/img/rectangle63.png') }}"/></div>
                            <div class="img_cont__content">
                                <img src="{{ asset ('/img/Group1.png') }}"/>
                                <p class="testimony">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.</p>
                                <h4>Lejourn </h4>
                                <p>UI/UX designer</p>
                            </div>
                        </div>
                        <div class="img_cont slider4">
                            <div class="img_cont__image"><img src="{{asset ('/img/rectangle63.png') }}"/></div>
                            <div class="img_cont__content">
                                <img src="{{ asset ('/img/Group1.png') }}"/>
                                <p class="testimony">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.</p>
                                <h4>Atinu </h4>
                                <p>Backend developer</p>
                            </div>
                        </div>
                        <div class="img_cont slider5">
                            <div class="img_cont__image"><img src="{{asset ('/img/rectangle63.png') }}"/></div>
                            <div class="img_cont__content">
                                <img src="{{ asset ('/img/Group1.png') }}"/>
                                <p class="testimony">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.</p>
                                <h4>Samuel </h4>
                                <p>Backend developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="right_arrow"><i class="fas fa-arrow-right"  onclick="plusSlides()"></i></div>
                </div>
                <ul>
                    <li class="slide_icon0"></li>
                    <li class="slide_icon1"></li>
                    <li class="slide_icon2"></li>
                    <li class="slide_icon3"></li>
                    <li class="slide_icon4"></li>
                    <li class="slide_icon5"></li>
                </ul>
            </div>
        </div>
        <div class="block__section5">
            <div class="container">
                <h3>How it works</h3>
                <img src="/img/Works.png">
                <button class="" onclick="window.location.href='/start'">Get Started</button>
            </div>
        </div>
    </div>
@endsection