@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <header class="content__header">
            <div class="content__header__section1">
                <div class="content__header__section1__desc">
                    <h2>Welcome Jonathan</h2>
                    <p>Your job, your idea</p>
                </div>
                <div class="content__header__section1__profile"><i class="far fa-user"></i></div>
            </div>
            <div class="content__header__section2">
                <a class="content__header__section2__link content__header__section2__link--active">Most Active</a>
                <a class="content__header__section2__link">Highest Voted</a>
                <a class="content__header__section2__link">Most Recent</a>
                <a class="menu_icon" onclick="toggle_sidebar()"><i class="fas fa-bars"></i></a>
            </div>
        </header>
        <div class="main_section"> 
            <dashboard></dashboard>
        </div>
    </div>
@endsection