<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
 





		
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<title>Linig On: An Online Home Service Application</title>

		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="{{ asset('favicon/favicon.ico') }}" />

		<!-- BS-Coreui Styles -->
		<link href="{{ asset('vendor/bs-coreui/build/bs-coreui.min.css') }}" rel="stylesheet" />

		<!-- Fontawesome 6 Icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!-- Pagination Styles -->
		<link href="{{ asset('vendor/pagination/pagination.css') }}" rel="stylesheet" />

		<!-- Site Styles -->
		<link href="{{ asset('css/site.css') }}" rel="stylesheet" />

		<script src="{{ mix('js/app.js') }}"></script>
		<!-- BS-Coreui Script -->
		<script defer src="{{ asset('vendor/bs-coreui/build/bs-coreui.min.js') }}"></script>

		<!-- Site Script -->
		<script defer src="{{ asset('js/site.js') }}"></script>
	</head>

	<body>
		<div id="app">
			<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
				<div class="container">
					<a class="navbar-brand" href="/">
						<img src="{{ asset('/svg/site/logo.svg') }}" width="150" alt="" />
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ms-auto gap-5">
							<li class="nav-item">
								<a href="/" class="nav-link fw-bold {{ request()->is('/') ? 'active' : '' }}">Home</a>
							</li>
							<li class="nav-item">
								<a href="/services" class="nav-link fw-bold {{ request()->is('services') ? 'active' : '' }}">Services</a>
							</li>
							<li class="nav-item">
								<a href="/about" class="nav-link fw-bold {{ request()->is('about') ? 'active' : '' }}">About Us</a>
							</li>
						</ul>
						<ul class="navbar-nav ms-auto d-flex align-items-center gap-3">
							<li class="nav-item">
								<div class="form-control-icon-end">
									<input type="search" id="searchField" class="form-control" placeholder="Search..." style="width: 15rem" />
									<i class="fa fa-solid fa-search text-muted"></i>
								</div>
							</li>
							@if (Auth::check())
							<li class="nav-item dropdown d-flex align-items-center gap-3">
								<a role="button" href="#">
									<i class="fa-regular fa-bell h5 text-primary mt-2"></i>
								</a>
								<a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<div class="avatar">
										@if (Auth::user()->image_url != null)
										<img class="avatar-img avatar-lg" src="{{ asset('img/profile') . '/' . Auth::user()->image_url }}" />
										@else
										<div class="avatar bg-secondary text-white fw-bold">{{ Auth::user()->first_name[0] }}</div>
										@endif
									</div>
								</a>
								<div class="dropdown-menu fade-in dropdown-menu-end mt-3 px-0 py-3" aria-labelledby="navbarDropdown" style="width: 20rem">
									<div class="dropdown-header py-2">
										<small class="fw-bolder text-uppercase">Activity</small>
									</div>
									<a class="dropdown-item d-flex align-items-center gap-3" href="/services">
										<i class="fa fa-solid fa-book ps-3"></i>
										<small>Book a Service</small>
									</a>
									<a class="dropdown-item d-flex align-items-center gap-3" href="">
										<i class="fa fa-solid fa-bookmark ps-3"></i>
										<small>My Bookmarks</small>
									</a>
									<div class="dropdown-divider"></div>
									<div class="dropdown-header py-2">
										<small class="fw-bolder text-uppercase">Accounts</small>
									</div>
									<a class="dropdown-item d-flex align-items-center gap-3" href="{{ route('logout') }}" onclick="event.preventDefault(); $('#logout-form').submit();">
										<i class="fa fa-solid fa-power-off ps-3"></i>
										<small>Logout</small>
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
								</div>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</nav>

			<main class="min-vh-100">@yield('content')</main>

			<footer class="bg-primary py-5">
				<div class="container py-5">
					<div class="row">
						<div class="col-2">
							<img src="{{ asset('svg/site/logo-compressed.svg') }}" alt="" />
							<p class="text-white mt-3">© {{ now()->year }} Linig-On.</p>
						</div>
						<div class="col">
							<div class="row">
								<div class="col">
									<h5 class="text-uppercase text-white mb-4">Sitemap</h5>
									<ul class="nav flex-column">
										<li class="nav-item mb-2">
											<a href="/" class="nav-link p-0 text-white">Home</a>
										</li>
										<li class="nav-item mb-2">
											<a href="/services" class="nav-link p-0 text-white">Services</a>
										</li>
										<li class="nav-item mb-2">
											<a href="/about" class="nav-link p-0 text-white">About Us</a>
										</li>
									</ul>
								</div>
								<div class="col">
									<h5 class="text-uppercase text-white mb-4">Resources</h5>
									<ul class="nav flex-column">
										<li class="nav-item mb-2">
											<a href="https://www.figma.com/" class="nav-link p-0 text-white">Figma</a>
										</li>
										<li class="nav-item mb-2"><a href="https://unsplash.com/" class="nav-link p-0 text-white">Unsplash</a></li>
										<li class="nav-item mb-2"><a href="https://www.istockphoto.com/" class="nav-link p-0 text-white">iStock</a></li>
									</ul>
								</div>
								<div class="col">
									<h5 class="text-uppercase text-white mb-4">Help</h5>
									<ul class="nav flex-column">
										<li class="nav-item mb-2">
											<a href="/" class="nav-link p-0 text-white">Getting Started</a>
										</li>
										<li class="nav-item mb-2">
											<a href="/about" class="nav-link p-0 text-white">FAQ</a>
										</li>
										<li class="nav-item mb-2">
											<a href="https://github.com/Linig-On/linig-on/issues" class="nav-link p-0 text-white">Report Problems</a>
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
@yield('javascript')
