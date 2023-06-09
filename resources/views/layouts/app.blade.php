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
			<nav class="navbar navbar-expand-md fixed-top navbar-light bg-white shadow-sm border border-1">
				<div class="container">
					<a class="navbar-brand" href="/">
						<img src="{{ asset('/svg/site/logo.svg') }}" width="150" alt="" />
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
						<ul class="navbar-nav mx-auto gap-5">
							<li class="nav-item text-nowrap">
								<a href="/" class="nav-link fw-bold {{ request()->is('/') ? 'active' : '' }}">Home</a>
							</li>
							<li class="nav-item text-nowrap">
								<a href="/service" class="nav-link fw-bold {{ request()->is('service') || request()->is('service/filter') || request()->is('service/worker/*') ? 'active' : '' }}">Services</a>
							</li>
							<li class="nav-item text-nowrap">
								<a href="/about" class="nav-link fw-bold {{ request()->is('about') ? 'active' : '' }}">About Us</a>
							</li>
						</ul>
					</div>
					<ul class="navbar-nav">
						@if (Auth::check())
						<li class="nav-item dropdown d-flex align-items-center gap-3">
							<a id="notifButton" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa-regular fa-bell h5 text-primary mt-2"></i>
							</a>
							<!-- start of dropdown div -->
							<div class="dropdown-menu fade-in dropdown-menu-end mt-3 p-auto position-absolute" aria-labelledby="notifButton" style="width: 30rem">
								<div class="p-auto ms-4 my-2 fw-bolder">
									<h4>Notifications</h4>
								</div>
								<div class="p-auto my-2">
									@foreach ($listOfNotifications as $notif)
									<a class="dropdown-item d-flex justify-content-between align-items-center no-fw-bold-hvr" href="">
										<div class="container">
											<div class="row">
												<div class="col-sm-12">
													<div class="row d-flex justify-content-between align-items-center gap-3">
														<div class="col">
															<small class="fw-bold">{{ $notif->heading }}</small>
														</div>
														<div class="col">
															<div class="float-end">
																<small>{{ $notif->created_at }}</small>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-12">
															<small class="text-wrap d-block text-muted mb-0">{{ $notif->message }}</small>
														</div>
													</div>
												</div>
											</div>
										</div>
									</a>
									@endforeach
									<div class="dropdown-divider"></div>
									<a class="dropdown-item text-center no-fw-bold-hvr">All notifications for this week</a>
								</div>
							</div>
							<!-- start of navbar dropdown -->
							<a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="avatar overflow-hidden">
									@if (Auth::user()->image_url != null)
									<img class="avatar-img avatar-lg" src="{{ asset('img/profile') . '/' . Auth::user()->image_url }}" /> @else
									<div class="avatar bg-secondary text-white fw-bold">{{ Auth::user()->first_name[0] }}</div>
									@endif
								</div>
							</a>
							<div class="dropdown-menu fade-in dropdown-menu-end mt-3 px-0 py-3 position-absolute" aria-labelledby="navbarDropdown" style="width: 20rem">
								<div class="dropdown-header py-2">
									<small class="fw-bolder text-uppercase">Activity</small>
								</div>
								<a class="dropdown-item d-flex align-items-center gap-3" href="/service">
									<i class="fa fa-solid fa-book ps-3"></i>
									<small>Book a Service</small>
								</a>
								<a class="dropdown-item d-flex align-items-center gap-3" href="/account/my-bookmarks">
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
			</nav>

			<main class="min-vh-100">@yield('content')</main>
			@if (session('sent-newsletter-success'))
			<script text="text/javascript">
				$(document).ready(function () {
					$("#newsLetterSuccessBtnTrg").click();
				});
			</script>
			@endif @if (session('sent-newsletter-error'))
			<script text="text/javascript">
				$(document).ready(function () {
					$("#newsLetterFailedBtnTrg").click();
				});
			</script>
			@endif
			<button class="d-none" id="newsLetterSuccessBtnTrg" data-bs-toggle="modal" data-bs-target="#newsLetterFeedbackSuccessModal">Launch</button>
			<button class="d-none" id="newsLetterFailedBtnTrg" data-bs-toggle="modal" data-bs-target="#newsLetterFeedbackFailedModal">Launch</button>
			<!-- Newsletter Feedback Modal (Success) -->
			<div class="modal fade" id="newsLetterFeedbackSuccessModal" tabindex="-1" aria-labelledby="newsLetterFeedbackSuccessModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header border-0">
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body px-5 py-3 d-flex flex-column text-center">
							<i class="fa-solid fa-circle-check h1 text-success"></i>
							<h3 class="fw-bolder text-uppercase text-primary">Subscribed to Newsletter!</h3>
							<p class="text-primary">Thanks for subscribing to Linig-on's Newsletter! we will contact you shortly. Stay tuned for our future events and promos!</p>
						</div>
					</div>
				</div>
			</div>
			<!-- Newsletter Feedback Modal (Failed) -->
			<div class="modal fade" id="newsLetterFeedbackFailedModal" tabindex="-1" aria-labelledby="newsLetterFeedbackFailedModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header border-0">
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body px-5 py-3 d-flex flex-column text-center">
							<i class="fa-solid fa-circle-xmark h1 text-danger"></i>
							<h3 class="fw-bolder text-uppercase text-danger">Failed To Subscribe to our Newsletter!</h3>
							<p class="text-primary">An error occured while subscribing to our newsletter...</p>
						</div>
					</div>
				</div>
			</div>
			<footer class="bg-primary py-5">
				<div class="ceiling container py-5">
					<div class="row">
						<div class="alignment col-md-2">
							<img src="{{ asset('svg/site/logo-compressed.svg') }}" alt="" />
							<p class="text-white mt-3">© {{ now()->year }} Linig-On.</p>
						</div>
						<div class="col-md-5">
							<div class="row">
								<div class="col">
									<h5 class="text-uppercase text-white mb-4">Sitemap</h5>
									<ul class="nav flex-column">
										<li class="nav-item mb-2">
											<a href="/" class="nav-link p-0 text-white">Home</a>
										</li>
										<li class="nav-item mb-2">
											<a href="/service" class="nav-link p-0 text-white">Service</a>
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
											<a href="/about#faq" class="nav-link p-0 text-white">FAQ</a>
										</li>
										<li class="nav-item mb-2">
											<a href="https://github.com/Linig-On/linig-on/issues" class="nav-link p-0 text-white">Report Problems</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="newsletter col-md-5">
							<h5 class="text-uppercase text-white mb-4">Subscribe to our newsletter</h5>
							<form method="POST" action="{{ route('subscribe-to-newsletter') }}">
								@csrf
								<label class="small fw-bold text-white" for="newsLetterEmail">Email address</label>
								<div class="row">
									<div class="col-lg-9 col-sm-12 mb-2">
										<input id="newsLetterEmail" name="email" type="email" class="form-control" placeholder="Email address" />
									</div>
									<div class="col-lg-3 col-sm-12">
										<button type="submit" class="btn btn-secondary text-uppercase text-white fw-bold" type="button">Send</button>
									</div>
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
