@extends('layouts.landing')

@section('title')
    <title>Contact page</title>
@endsection

@section('content')
    <div class="block" id="contact">
        <div class="block__section1">
            <h2>Contact Us</h2>
            <p>We'd like to hear from you as we strive to ensure optimum satisfaction for our users</p>
        </div>
        <div class="block__section2">
            <form class="block__section2__cont">
                <div class="email_cont"><label for="email">Your Email Address</label><input type="email" placeholder="Enter your email address"></div>
                 <div class="textfield_cont">
                    <label>Tell us what you need help with:</label>
                    <textarea name="message" placeholder="Enter your message here"></textarea>
                </div>
                <button>Send Message</button>
            </form>
        </div>
    </div>
@endsection