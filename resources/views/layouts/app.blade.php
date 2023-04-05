<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<title>Linig On: An Online Home Service Application</title>

		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
		<!-- Site Styles -->
		<link href="{{ asset('css/site.css') }}" rel="stylesheet" />

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}" defer></script>
	</head>

	<body>
		<div id="app">
			<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-3">
				<div class="container">
					<a class="navbar-brand" href="{{ url('/') }}">
						<img src="{{ asset('/assets/logo.svg') }}" width="150" alt="" />
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ms-auto gap-5">
							<li class="nav-item">
								<a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
							</li>
							<li class="nav-item">
								<a href="/shop" class="nav-link {{ request()->is('services') ? 'active' : '' }}">Services</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link {{ request()->is('aboutus') ? 'active' : '' }}">About Us</a>
							</li>
							@guest @if (Auth::check())
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }}
								</a>

								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
									<a
										class="dropdown-item"
										href="{{ route('logout') }}"
										onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
									>
										{{ __("Logout") }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
								</div>
							</li>
							@endif @endguest
						</ul>
						<ul class="navbar-nav ms-auto">
							<li class="nav-item">
								<input type="search" id="searchField" class="form-control" placeholder="Search..." style="width: 15rem" />
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<main class="min-vh-100">@yield('content')</main>

			<footer class="">
				<div class="container py-5">
					<div class="row">
						<div class="col-2">
							<img src="{{ asset('assets/logo-compressed.svg') }}" alt="" />
						</div>
						<div class="col">
							<div class="row">
								<div class="col">
									<h5 class="text-uppercase">Sitemap</h5>
									<ul class="nav flex-column">
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-muted">Home</a>
										</li>
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-muted">Services</a>
										</li>
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-muted">About Us</a>
										</li>
									</ul>
								</div>
								<div class="col">
									<h5 class="text-uppercase">Resources</h5>
									<ul class="nav flex-column">
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-muted">Figma</a>
										</li>
										<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Unsplash</a></li>
										<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">iStock</a></li>
									</ul>
								</div>
								<div class="col">
									<h5 class="text-uppercase">Help</h5>
									<ul class="nav flex-column">
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-muted">Getting Started</a>
										</li>
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-muted">FAQ</a>
										</li>
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-muted">Report Problems</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col">
							<form>
								<h5 class="text-uppercase">Subscribe to our newsletter</h5>
								<div class="d-flex w-100 gap-2">
									<label for="newsletter1" class="visually-hidden">Email address</label>
									<input id="newsletter1" type="text" class="form-control" placeholder="Email address" />
									<button class="btn btn-primary" type="button">Subscribe</button>
								</div>
							</form>
						</div>
					</div>
					<div class="d-flex justify-content-between pt-4 my-4 border-top">
						<p>© {{ now()->year }} Linig-On. All rights reserved.</p>
					</div>
				</div>
			</footer>
		</div>
	</body>
</html>
