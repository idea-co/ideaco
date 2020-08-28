<template>
    <div class="explore_section">
        <!-- Page Header -->

        <div class="explore_section_container">
            <header class="content__header">
                <auth-user-banner></auth-user-banner>
                <div class="content__header__section2">
                    <h2>Explore</h2>
                    <a class="content__header__section2__link content__header__section2__link--active">Most Active</a>
                    <a class="content__header__section2__link">Highest Voted</a>
                    <a class="content__header__section2__link">Most Recent</a>
                    <a class="content__header__section2__link filter"><i class="fas fa-filter"></i><span> Filter </span><i class="fas fa-caret-down"></i></a>
                </div>
            </header>
            <div class="explore_main_wrapper d-xl-flex">
                <div class="explore_main col-xl-8">
                
                    <!-- Explore input -->

                    <div class="explore_input">
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control explore_input__input" placeholder="Search this Ideaspace" aria-label="Search this Ideaspace" aria-describedby="addon-wrapping">
                            <div class="input-group-append">
                                <span class="input-group-text explore_input__search" id="addon-wrapping"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>

                    <!-- Explore Challenges -->

                    <div class="explore_challenges">
                        <div class="explore_challenges__header">
                            <h4>Company Challenges</h4>
                        </div>
                        <div class="explore_challenges__cards d-flex">
                            <div class="explore_challenges__cards__card card1">
                                <p>Diversifying Online Content</p>
                            </div>
                            <div class="explore_challenges__cards__card card2">
                                <p>Reducing Gender Inequality</p>
                            </div>
                            <div class="explore_challenges__cards__card card3">
                                <p>Reducing Tribal Bias</p>
                            </div>
                        </div>
                    </div>

                    <!-- Explore Empty-State -->

                    <div class="explore_emptystate">
                        <form class="explore_emptystate__form">
                            <div class="explore_emptystate__form__input">
                                <input type="text" class="form-control explore_emptystate__form__input__input" placeholder="Your Idea Topic">
                                <textarea name="idea" class="form-control explore_emptystate__form__input__textarea" cols="15" rows="10" placeholder="Share a bit more about your idea..."></textarea>
                            </div>
                        </form>
                        <div class="explore_emptystate__icon">
                            <div class="explore_emptystate__icon__icons">
                                <div class="explore_emptystate__icon__icons__element video">
                                    <img src="../../../img/mdi_videocam.svg" alt="">
                                    <p>Video</p>
                                </div>
                                <div class="explore_emptystate__icon__icons__element picture">
                                    <img src="../../../img/camera.svg" alt="">
                                    <p>Picture</p>
                                </div>
                                <div class="explore_emptystate__icon__icons__element document">
                                    <img src="../../../img/image1.svg" alt="">
                                    <p>Documents</p>
                                </div>
                            </div>
                            <div class="explore_emptystate__icon__button">
                                <button type="button" class="btn">Share</button>
                            </div>
                        </div>
                    </div>

                    <!-- Explore Cards -->

                    <div class="explore_cards">
                        <div class="explore_cards__card card1">
                            <div class="explore_cards__card__header card1">
                                <div class="explore_cards__card__header__image card1">
                                    <img src="../../../img/Ellipse7.svg" alt="">
                                </div>
                                <div class="explore_cards__card__header__writeup card1">
                                    <p class="name">Kevin Oates</p>
                                    <div class="date_track">
                                        <p>3 days ago.</p>
                                        <img src="../../../img/ellipse8.svg" alt="">
                                        <p>Product Design</p>
                                    </div>
                                </div>
                            </div>
                            <div class="explore_cards__card__main card1">
                                <p class="explore_cards__card__main__topic card1">
                                    UX Focused Internship
                                </p>
                                <p class="explore_cards__card__main__writeup card1">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Scelerisque faucibus augue arcu at vulputate diam vel. 
                                    Ac quam aliquet semper in consequat faucibus coat vulputate diam vel. Ac quam aliquet semper in consequat faucibus 
                                    condimentum et sed.
                                </p>
                            </div>
                            <div class="explore_cards__card__footer card1">
                                <div class="explore_cards__card__footer__tags card1 col-8">
                                    <div class="explore_cards__card__footer__tags__vote card1">
                                        <img src="../../../img/el_arrow-up.svg" alt="">
                                        <p>1.1K</p>
                                    </div>
                                    <div class="explore_cards__card__footer__tags__tag card1">
                                        <p>Social Media</p>
                                        <p>Online</p>
                                        <p>UX</p>
                                    </div>
                                </div>
                                <div class="explore_cards__card__footer__comments card1">
                                    <img src="../../../img/fa-regular_comment-alt.svg" alt="">
                                    <p>30 Comments</p>
                                </div>
                            </div>
                        </div>

                        <!-- Explore Card 2 -->

                        <div class="explore_cards__card card2">
                            <div class="explore_cards__card__header card2">
                                <div class="explore_cards__card__header__image card2">
                                    <img src="../../../img/ralph.svg" alt="">
                                </div>
                                <div class="explore_cards__card__header__writeup card2">
                                    <p class="name">Ralph Edwards</p>
                                    <div class="date_track">
                                        <p>3 days ago.</p>
                                        <img src="../../../img/ellipse8.svg" alt="">
                                        <p>Development</p>
                                    </div>
                                </div>
                            </div>
                            <div class="explore_cards__card__main card2">
                                <div class="explore_cards__card__main__images card2">
                                    <img src="../../../img/Rectangle123.svg" alt="" class="mr-2">
                                    <img src="../../../img/Rectangle124.svg" alt="" class="mb-1">
                                </div>
                                <p class="explore_cards__card__main__topic card2">
                                    Caring is the new marketing
                                </p>
                                <p class="explore_cards__card__main__writeup card2">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Scelerisque faucibus augue arcu at vulputate diam vel. 
                                    Ac quam aliquet semper in consequat faucibus coat vulputate diam vel. Ac quam aliquet semper in consequat faucibus 
                                    condimentum et sed.
                                </p>
                            </div>
                            <div class="explore_cards__card__footer card2">
                                <div class="explore_cards__card__footer__tags card2 col-8">
                                    <div class="explore_cards__card__footer__tags__vote card2">
                                        <img src="../../../img/arrow-up.svg" alt="">
                                        <p>1.1K</p>
                                    </div>
                                    <div class="explore_cards__card__footer__tags__tag card2">
                                        <p>Social Media</p>
                                        <p>Online</p>
                                        <p>UX</p>
                                    </div>
                                </div>
                                <div class="explore_cards__card__footer__comments card2">
                                    <img src="../../../img/fa-regular_comment-alt.svg" alt="">
                                    <p>30 Comments</p>
                                </div>
                            </div>
                        </div>

                        <!-- Explore Card 3 -->

                        <div class="explore_cards__card card1">
                            <div class="explore_cards__card__header card1">
                                <div class="explore_cards__card__header__image card1">
                                    <img src="../../../img/eleanor.svg" alt="">
                                </div>
                                <div class="explore_cards__card__header__writeup card1">
                                    <p class="name">Eleanor Pena</p>
                                    <div class="date_track">
                                        <p>3 days ago.</p>
                                        <img src="../../../img/ellipse8.svg" alt="">
                                        <p>Production</p>
                                    </div>
                                </div>
                            </div>
                            <div class="explore_cards__card__main card1">
                                <p class="explore_cards__card__main__topic card1">
                                    Why choose a theme that looks good with WooCommerce
                                </p>
                                <p class="explore_cards__card__main__writeup card1">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Scelerisque faucibus augue arcu at vulputate diam vel. 
                                    Ac quam aliquet semper in consequat faucibus coat vulputate diam vel. Ac quam aliquet semper in consequat faucibus 
                                    condimentum et sed.
                                </p>
                            </div>
                            <div class="explore_cards__card__footer card1">
                                <div class="explore_cards__card__footer__tags card1 col-8">
                                    <div class="explore_cards__card__footer__tags__vote card1">
                                        <img src="../../../img/arrow-up.svg" alt="">
                                        <p>1.1K</p>
                                    </div>
                                    <div class="explore_cards__card__footer__tags__tag card1">
                                        <p>Social Media</p>
                                        <p>Online</p>
                                        <p>UX</p>
                                    </div>
                                </div>
                                <div class="explore_cards__card__footer__comments card1">
                                    <img src="../../../img/fa-regular_comment-alt.svg" alt="">
                                    <p>30 Comments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="explore_aside d-none d-xl-block col-4">
                    <div class="explore_ideas">
                        <div class="explore_ideas__topic">
                            <p>Your Ideas</p>
                        </div>

                        <!-- Your Idea 1 -->

                        <div class="explore_ideas__idea">
                            <div class="explore_ideas__idea__topic">
                                <p>Extra Meeting Rooms</p>
                            </div>
                            <div class="explore_ideas__idea__writeup">
                                <p>However rare side effects observed among children can be metabolic acidosis, coma, respiratory depression, 
                                    and hypoglycemia-
                                </p>
                            </div>
                            <div class="explore_ideas__idea__footer">
                                <div class="explore_ideas__idea__footer__vote">
                                    <img src="../../../img/el_arrow-up.svg" alt="">
                                    <p>1.1K</p>
                                </div>
                                <div class="explore_ideas__idea__footer__comment">
                                    <img src="../../../img/fa-regular_comment-alt.svg" alt="">
                                    <p>30 Comments</p>
                                </div>
                            </div>
                        </div>

                        <!-- Your Idea 2 -->

                        <div class="explore_ideas__idea">
                            <div class="explore_ideas__idea__topic">
                                <p>Parturient Lorem</p>
                            </div>
                            <div class="explore_ideas__idea__writeup">
                                <p>The principal alcohol in Purell hand sanitizer (to take the most talked-about brand) is 70% ethanol 
                                    (ethyl alcohol), with a smaller amount of isopropyl alcohol.
                                </p>
                            </div>
                            <div class="explore_ideas__idea__footer">
                                <div class="explore_ideas__idea__footer__vote">
                                    <img src="../../../img/el_arrow-up.svg" alt="">
                                    <p>1.1K</p>
                                </div>
                                <div class="explore_ideas__idea__footer__comment">
                                    <img src="../../../img/fa-regular_comment-alt.svg" alt="">
                                    <p>30 Comments</p>
                                </div>
                            </div>
                        </div>

                        <!-- Your Idea 3 -->

                        <div class="explore_ideas__idea">
                            <div class="explore_ideas__idea__topic">
                                <p>Vestibulum</p>
                            </div>
                            <div class="explore_ideas__idea__writeup">
                                <p>Their blood alcohol levels rose to 0.007 to 0.02 o/oo (parts per thousand), or 0.7 to 2.0 mg/L.
                                </p>
                            </div>
                            <div class="explore_ideas__idea__footer">
                                <div class="explore_ideas__idea__footer__vote">
                                    <img src="../../../img/el_arrow-up.svg" alt="">
                                    <p>1.1K</p>
                                </div>
                                <div class="explore_ideas__idea__footer__comment">
                                    <img src="../../../img/fa-regular_comment-alt.svg" alt="">
                                    <p>30 Comments</p>
                                </div>
                            </div>
                        </div>

                        <!-- Your Idea 4 -->

                        <div class="explore_ideas__idea">
                            <div class="explore_ideas__idea__topic">
                                <p>Malesuada Fermentum Tortor</p>
                            </div>
                            <div class="explore_ideas__idea__writeup">
                                <p>HIn most states, the legal limit in blood alcohol to not be considered DUI is 500 to 1,000 mg/L. Therefore, 
                                    this is way below a level considered to be intoxication. 
                                </p>
                            </div>
                            <div class="explore_ideas__idea__footer">
                                <div class="explore_ideas__idea__footer__vote">
                                    <img src="../../../img/el_arrow-up.svg" alt="">
                                    <p>1.1K</p>
                                </div>
                                <div class="explore_ideas__idea__footer__comment">
                                    <img src="../../../img/fa-regular_comment-alt.svg" alt="">
                                    <p>30 Comments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

