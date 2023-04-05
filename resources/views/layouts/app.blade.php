<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<title>Linig On: An Online Home Service Application</title>

		<!-- BS-Coreui Styles -->
		<link href="{{ asset('vendor/bs-coreui/build/bs-coreui.min.css') }}" rel="stylesheet" />

		<!-- Fontawesome 6 Icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!-- Site Styles -->
		<link href="{{ asset('css/site.css') }}" rel="stylesheet" />

		<script defer src="{{ mix('js/app.js') }}"></script>
		<!-- BS-Coreui Script -->
		<script defer src="{{ asset('vendor/bs-coreui/build/bs-coreui.min.js') }}"></script>
		<script defer src="{{ asset('js/site.js') }}"></script>
	</head>

	<body>
		<div id="app">
			<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
				<div class="container">
					<a class="navbar-brand" href="{{ url('/') }}">
						<img src="{{ asset('/svg/logo.svg') }}" width="150" alt="" />
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
								<a href="/services" class="nav-link {{ request()->is('services') ? 'active' : '' }}">Services</a>
							</li>
							<li class="nav-item">
								<a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">About Us</a>
							</li>
						</ul>
						<ul class="navbar-nav ms-auto">
							<li class="nav-item">
								<input type="search" id="searchField" class="form-control" placeholder="Search..." style="width: 15rem" />
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
					</div>
				</div>
			</nav>

			<main class="min-vh-100">@yield('content')</main>

			<footer class="bg-primary py-5">
				<div class="container py-5">
					<div class="row">
						<div class="col-2">
							<img src="{{ asset('svg/logo-compressed.svg') }}" alt="" />
							<p class="text-white mt-3">© {{ now()->year }} Linig-On.</p>
						</div>
						<div class="col">
							<div class="row">
								<div class="col">
									<h5 class="text-uppercase text-white mb-4">Sitemap</h5>
									<ul class="nav flex-column">
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-white">Home</a>
										</li>
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-white">Services</a>
										</li>
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-white">About Us</a>
										</li>
									</ul>
								</div>
								<div class="col">
									<h5 class="text-uppercase text-white mb-4">Resources</h5>
									<ul class="nav flex-column">
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-white">Figma</a>
										</li>
										<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Unsplash</a></li>
										<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">iStock</a></li>
									</ul>
								</div>
								<div class="col">
									<h5 class="text-uppercase text-white mb-4">Help</h5>
									<ul class="nav flex-column">
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-white">Getting Started</a>
										</li>
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-white">FAQ</a>
										</li>
										<li class="nav-item mb-2">
											<a href="#" class="nav-link p-0 text-white">Report Problems</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col">
							<form>
								<h5 class="text-uppercase text-white mb-4">Subscribe to our newsletter</h5>

								<label class="small fw-bold text-white" for="newsletter1">Email address</label>
								<div class="d-flex w-100 gap-2">
									<input id="newsletter1" type="text" class="form-control" placeholder="Email address" />
									<button class="btn btn-secondary text-uppercase text-white fw-bold w-25" type="button">Send</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</body>
</html>
