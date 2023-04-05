@extends('layouts.app') 
@section('content')
<div class="hero position-relative">
    <!-- <img src="{{ asset('svg/hero.svg') }}" alt="" width="100%"> -->
    <div class="container fade-in">
        <div class="hero-text position-absolute top-0 p-5">
            <h1 class="display-2 fw-bolder pt-5 mt-5">Your <span class="text-secondary h1 display-2 fw-bolder">local service <br> workers <br></span> to your rescue</h1>
            <p class="lead">Naga City homeowners trust us in all aspects of home services</p>
            @guest 
                @if (Auth::check())
                <a href="/services" role="button" class="btn btn-primary btn-lg text-uppercase fw-bold mt-3 px-5 py-2 text-decoration-none">Avail Service <i class="fa-solid fa-arrow-right-long text-white"></i></a>
                @else
                <a href="/login" role="button" class="btn btn-primary btn-lg text-uppercase fw-bold mt-3 px-5 py-2 text-decoration-none">Avail Service <i class="fa-solid fa-arrow-right-long text-white"></i></a>
                @endif 
            @endguest
        </div>
    </div>
</div>
<div class="spacer"></div>
<div class="container fade-in">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('svg/undraw-login.svg') }}" alt="" width="500">
        </div>
        <div class="col-md-6">
            <h2 class="fw-bolder pb-4">LINIG-On! An Online Home Service Application</h2>
            <p>From the bikol word, “linigon” is a website that offers home cleaning services provided by local service workers. It aims to shorten the gap between customers and service workers. Through this website, you can forget the hassle of finding reliable people to solve your cleaning problems!</p>
        </div>
    </div>
</div>
<div class="spacer"></div>
<section class="bg-secondary">
    <div class="container text-center py-5 fade-in">
        <h2 class="text-uppercase fw-bolder">Top Rated Workers This Month</h2>
        <!-- Fetch top rated workers here (use component)... -->
    </div>
</section>
<div class="spacer"></div>
<section>
    <div class="container text-center fade-in">
        <h2 class="text-uppercase fw-bolder">What Our Customer Say About Us</h2>
        <!-- Fetch testimonials here (use component)... -->
        <button class="btn btn-primary btn-lg text-uppercase fw-bold">Get Started!</button>
    </div>
</section>
<div class="spacer"></div>
@endsection
