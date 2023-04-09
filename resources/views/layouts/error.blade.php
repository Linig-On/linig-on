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
@yield('javascript')
