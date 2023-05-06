@extends('layouts.app') @section('content')
<div class="hero position-relative">
    <div class="container fade-in">
        <div class="hero-text position-absolute top-0 p-5">
            <h1 class="display-2 fw-bolder pt-5 mt-5">
                Your
                <span class="text-secondary h1 display-2 fw-bolder">local service <br />
					workers <br />
				</span> to your rescue
            </h1>
            <p class="lead">Naga City homeowners trust us in all aspects of home services</p>
            @if (Auth::check())
            <a href="/service" role="button" class="btn btn-primary btn-lg text-uppercase fw-bold mt-3 px-5 py-2 text-decoration-none">Avail Service <i class="fa-solid fa-arrow-right-long text-white"></i></a> @else <a href="/login" role="button" class="btn btn-primary btn-lg text-uppercase fw-bold mt-3 px-5 py-2 text-decoration-none">Avail Service <i class="fa-solid fa-arrow-right-long text-white"></i></a>            @endif
        </div>
    </div>
</div>
<div class="spacer"></div>
<div class="container fade-in">
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-xs-12">
            <img src="{{ asset('svg/illust/undraw-cleaning.svg') }}" alt="" width="500" />
        </div>
        <div class="col-lg-6 col-sm-12 col-xs-12">
            <h2 class="fw-bolder pb-4">LINIG-On! An Online Home Service Application</h2>
            <p>From the bikol word, “linigon” is a website that offers home cleaning services provided by local service workers. It aims to shorten the gap between customers and service workers. Through this website, you can forget the hassle of finding
                reliable people to solve your cleaning problems!</p>
        </div>
    </div>
</div>
<div class="spacer"></div>
<section class="bg-secondary py-5 position-relative">
    <img src="{{ asset('svg/illust/bubbles-0.svg') }}" class="position-absolute top-0" alt="" />
    <img src="{{ asset('svg/illust/bubbles-1.svg') }}" class="position-absolute w-mc end-0 bottom-0" alt="" />
    <div class="container text-center py-5 fade-in">
        <h2 class="text-uppercase fw-bolder text-primary mb-5">Top Rated Workers This Month</h2>
        <!-- Fetch top rated workers here (use component)... -->
        <div class="card-group w-75 mx-auto shadow rounded-5">
            <div class="card py-5 px-3">
                <div class="card-header bg-transparent border-0">
                    <div class="avatar w-mc" style="width: 5rem; height: 5rem">
                        @if ($topRatedWorkers[0]['image_url'] != null)
                        <img class="rounded-circle w-100 h-100" src="{{ asset('img/profile') . '/' . $topRatedWorkers[0]['image_url'] }}" /> @else
                        <div class="avatar w-100 h-100 rounded-circle bg-secondary text-white fw-bold">{{ $topRatedWorkers[0]["name"][0] }}</div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bolder text-primary">{{ $topRatedWorkers[0]["name"] }}</h5>
                    <i class="fa-solid fa-quote-left fa-2xl float-start pe-1 text-primary opacity-50"></i>
                    <p class="card-text small">{{ $topRatedWorkers[0]["short_bio"] }}</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a role="button" href="{{ route('service-worker-profile', ['id' => $topRatedWorkers[0]['worker_id']]) }}" class="btn btn-outline-secondary text-uppercase fw-bold">View Profile</a>
                </div>
            </div>
            <div class="card py-5 px-3 rounded-5" style="transform: scale(1.1); box-shadow: 0 0px 30px 0 rgba(0, 1, 83, 30%); z-index: 10000000">
                <div class="card-header bg-transparent border-0">
                    <div class="avatar w-mc" style="width: 5rem; height: 5rem">
                        @if ($topRatedWorkers[1]['image_url'] != null)
                        <img class="rounded-circle w-100 h-100" src="{{ asset('img/profile') . '/' . $topRatedWorkers[1]['image_url'] }}" /> @else
                        <div class="avatar w-100 h-100 rounded-circle bg-secondary text-white fw-bold">{{ $topRatedWorkers[0]["name"][0] }}</div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bolder text-primary">{{ $topRatedWorkers[1]["name"] }}</h5>
                    <i class="fa-solid fa-quote-left fa-2xl float-start pe-1 text-primary opacity-50"></i>
                    <p class="card-text small">{{ $topRatedWorkers[1]["short_bio"] }}</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a role="button" href="{{ route('service-worker-profile', ['id' => $topRatedWorkers[1]['worker_id']]) }}" class="btn btn-outline-secondary text-uppercase fw-bold">View Profile</a>
                </div>
            </div>
            <div class="card py-5 px-3">
                <div class="card-header bg-transparent border-0">
                    <div class="avatar w-mc" style="width: 5rem; height: 5rem">
                        @if ($topRatedWorkers[2]['image_url'] != null)
                        <img class="rounded-circle w-100 h-100" src="{{ asset('img/profile') . '/' . $topRatedWorkers[2]['image_url'] }}" /> @else
                        <div class="avatar w-100 h-100 rounded-circle bg-secondary text-white fw-bold">{{ $topRatedWorkers[0]["name"][0] }}</div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bolder text-primary">{{ $topRatedWorkers[2]["name"] }}</h5>
                    <i class="fa-solid fa-quote-left fa-2xl float-start pe-1 text-primary opacity-50"></i>
                    <p class="card-text small">{{ $topRatedWorkers[2]["short_bio"] }}</p>
                </div>
                <div class="card-footer bg-transparent border-0">
                    <a role="button" href="{{ route('service-worker-profile', ['id' => $topRatedWorkers[2]['worker_id']]) }}" class="btn btn-outline-secondary text-uppercase fw-bold">View Profile</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="spacer"></div>
<section>
	<div class="container text-center fade-in">
		<h2 class="text-uppercase fw-bolder mb-5">What Our Customer Say About Us</h2>
		<!-- Fetch testimonials here... -->
		<div class="row">
			@for ($i = 0; $i < 3; $i++)
			<div class="col-md-4 mt-3">
				<div class="card shadow border border-1">
					<div class="card-body px-5 py-4 text-start">
						<i class="fa-solid fa-quote-left fa-2xl float-start pe-1 text-primary opacity-50"></i>
						<br >
						<h5 class="text-primary fw-bolder">{{ $appRatings[$i]->name }}</h5>
						<p>"{{ $appRatings[$i]->comment }}"</p>
					</div>
				</div>
			</div>
			@endfor
		</div>
		<div class="row justify-content-center">
			@for ($i = 3; $i < 5; $i++)
			<div class="col-md-4 mt-3">
				<div class="card shadow border border-1">
					<div class="card-body px-5 py-4 text-start">
						<i class="fa-solid fa-quote-left fa-2xl float-start pe-1 text-primary opacity-50"></i>
						<br >
						<h5 class="text-primary fw-bolder">{{ $appRatings[$i]->name }}</h5>
						<p>"{{ $appRatings[$i]->comment }}"</p>
					</div>
				</div>
			</div>
			@endfor
		</div>
		<a role="button" href="/service" class="btn btn-primary btn-lg text-uppercase fw-bold mt-5">Get Started!</a>
	</div>
</section>
<div class="spacer"></div>
@endsection