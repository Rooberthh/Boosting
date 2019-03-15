@extends('layouts.home')

@section('content')
<section class="hero is-danger is-large">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Boosting
            </h1>
            <h2 class="subtitle">
                Professional Boosting
            </h2>
            <a  href="#features" class="button is-primary is-medium">Learn More</a>
            <a href="#register" @click="$modal.show('register')" class="button is-white has-text-danger is-medium mx-2 font-weight-bold">Register</a>
        </div>
    </div>
</section>
<div class="py-5">
    <div id="features" class="container py-4">
        <h2 class="title">Features</h2>
        <div class="columns">
            <div class="column">
                <div class="tile is-ancestor">
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <h3 class="subtitle">Simple</h3>
                            <div class="content">
                                <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Proin ornare magna eros, eu pellentesque tortor vestibulum ut.
                                Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                                </p>
                            </div>
                        </article>
                    </div>

                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <h3 class="subtitle">Experienced</h3>
                            <div class="content">
                                <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Proin ornare magna eros, eu pellentesque tortor vestibulum ut.
                                Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                                </p>
                            </div>
                        </article>
                    </div>

                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <h3 class="subtitle">Secure</h3>
                            <div class="content">
                                <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Proin ornare magna eros, eu pellentesque tortor vestibulum ut.
                                Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="about" class="section has-background-grey-lightest">
        <div class="container">
            <h2 class="title">What is Boosting?</h2>
            <h3 class="subtitle">
                <strong>Boosting</strong> is not only the most experienced elo-boosting service in the industry,
                it also features the largest amount of unranked level 30 accounts in the marketplace.
            </h3>
            <h3 class="subtitle">We offer a <strong>lifetime</strong> warranty on our unranked accounts!</h3>
        </div>
    </section>

    <div id="work" class="columns container py-4">
        <div class="column">
            <h2 class="title">How does it work?</h2>
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <h3 class="subtitle">Create an Account</h3>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Proin ornare magna eros, eu pellentesque tortor vestibulum ut.
                                Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                            </p>
                        </div>
                    </article>
                </div>

                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <h3 class="subtitle">Select Your Desired Elo</h3>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Proin ornare magna eros, eu pellentesque tortor vestibulum ut.
                                Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                            </p>
                        </div>
                    </article>
                </div>

                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <h3 class="subtitle">Start Boosting</h3>
                        <div class="content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Proin ornare magna eros, eu pellentesque tortor vestibulum ut.
                                Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <section id="pricing" class="section has-background-grey-lightest">
        <div class="container columns">
            <div class="column">
                <h2 class="title">Pricing?</h2>
                <div class="tile is-ancestor">
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <h3 class="subtitle text-center">Elo Boosting</h3>
                            <div class="content">
                                <boosting-pricing></boosting-pricing>
                            </div>
                        </article>
                    </div>

                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <h3 class="subtitle text-center">Basic Account</h3>
                            <div class="content has-text-centered">
                                <h3>20.00$</h3>
                                <ul class="list-reset">
                                    <li> <i class="fas fa-check has-text-success"></i> 20000 Blue Essence</li>
                                    <li> <i class="fas fa-check has-text-success"></i> Unveritfied Email</li>
                                    <li> <i class="fas fa-check has-text-success"></i> Instant Delivery</li>
                                </ul>
                                <a href="#login" @click="$modal.show('login')" class="button is-danger w-100">Log in to purchase</a>
                            </div>
                        </article>
                    </div>

                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <h3 class="subtitle text-center">Premium Account</h3>
                            <div class="content has-text-centered">
                                <h3>30.00$</h3>
                                <ul class="list-reset">
                                    <li> <i class="fas fa-check has-text-success"></i> 30000 Blue Essence</li>
                                    <li> <i class="fas fa-check has-text-success"></i> Unveritfied Email</li>
                                    <li> <i class="fas fa-check has-text-success"></i> Instant Delivery</li>
                                </ul>
                                <a href="#login" @click="$modal.show('login')" class="button is-danger w-100">Log in to purchase</a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
    <footer class="footer">
        <div class="content">
            <div class="columns">
                <div class="column is-2">
                    <h3>Boosting</h3>
                    <p>	&copy; - 2018</p>
                </div>
                <div class="column is-2">
                    <h5>Information</h5>
                    <ul class="list-reset">
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Privacy & Terms</a></li>
                    </ul>
                </div>
                <div class="column is-2">
                    <h5>Profile</h5>
                    <ul class="list-reset">
                        <li><a href="#" @click="$modal.show('register')">Sign Up</a></li>
                        <li><a href="#" @click="$modal.show('login')">Sign In</a></li>
                    </ul>
                </div>
                <div class="column is-2">
                    <h5>Boosting</h5>
                    <ul class="list-reset">
                        <li><a href="#features">Features</a></li>
                        <li><a href="#work">How it works</a></li>
                        <li><a href="#" @click="$modal.show('support-ticket')">Contact</a></li>
                    </ul>
                </div>
                <div class="column is-2">
                    <h5>Social Media</h5>
                    <ul class="list-reset">
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </div>
</div>
@endsection
