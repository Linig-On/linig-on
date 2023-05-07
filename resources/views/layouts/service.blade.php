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
		<link rel="stylesheet" href="{{ asset('vendor/bs-coreui/plugins/coreui-comp/icons/css/all.min.css') }}" />

		<!-- Pagination Styles -->
		<link href="{{ asset('vendor/pagination/pagination.css') }}" rel="stylesheet" />

		<!-- Tagify Styles -->
		<link href="{{ asset('vendor/tagify/dist/tagify.css') }}" rel="stylesheet" />

		<!-- RichText Styles -->
		<link rel="stylesheet" href="{{ asset('vendor/rich-text-editor/src/richtext.min.css') }}" />

		<!-- Datatables Styles -->
		<link href="{{ asset('vendor/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet" />

		<!-- Site Styles -->
		<link href="{{ asset('css/site.css') }}" rel="stylesheet" />

		<!-- Jquery -->
		<script src="{{ mix('js/app.js') }}"></script>

		<!-- Tagify Script -->
		<script src="{{ asset('vendor/tagify/dist/jQuery.tagify.min.js') }}"></script>

		<!-- RichText Script -->
		<script src="{{ asset('vendor/rich-text-editor/src/jquery.richtext.min.js') }}"></script>

		<!-- Popper JS -->
		<script defer src="{{ asset('vendor/bs-coreui/plugins/popperjs/core/dist/umd/popper.min.js') }}"></script>

		<!-- Core UI Scripts -->
		<script defer src="{{ asset('vendor/bs-coreui/plugins/coreui-comp/coreui/dist/js/coreui.bundle.js') }}"></script>
		<script defer src="{{ asset('vendor/bs-coreui/plugins/simplebar/dist/simplebar.min.js') }}"></script>
		<script defer src="{{ asset('vendor/bs-coreui/plugins/coreui-comp/utils/dist/coreui-utils.js') }}"></script>

		<!-- Bootstrap 5 -->
		<script defer src="{{ asset('vendor/bs-coreui/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<!-- BS-Coreui Script -->
		<script defer src="{{ asset('vendor/bs-coreui/build/bs-coreui.min.js') }}"></script>

		<!-- Site Script -->
		<script defer src="{{ asset('js/site.js') }}"></script>
	</head>

	<body>
		<div class="sidebar sidebar-dark sidebar-fixed min-vh-100" id="sidebar">
			<div class="sidebar-brand d-none d-md-flex fade-in">
				<img class="sidebar-brand-full py-3" src="{{ asset('svg/site/logo.svg') }}" alt="" width="150" />
				<img class="sidebar-brand-narrow" src="{{ asset('svg/site/logo-compressed.svg') }}" alt="" width="35" />
			</div>
			<ul class="sidebar-nav fade-in" data-coreui="navigation" data-simplebar>
				<li class="nav-title">MAIN NAVIGATION</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('service-dashboard') }}">
						<i class="nav-icon cil-gauge"></i>
						Dashboard
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('service-my-profile') }}">
						<i class="nav-icon cil-user"></i>
						My Profile
					</a>
				</li>
				<li class="nav-title">ACTION</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('service-bookings') }}">
						<i class="nav-icon cil-book"></i>
						Bookings
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('about-us') }}">
						<i class="nav-icon cil-address-book"></i>
						Contact Us
					</a>
				</li>
			</ul>
			<button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
		</div>
		<div class="wrapper d-flex flex-column bg-light">
			<header class="header header-sticky mb-4 shadow-sm">
				<div class="container-fluid fade-in">
					<button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
						<i class="cil-hamburger-menu"></i>
					</button>
					<a class="header-brand" href="#"></a>
					<ul class="header-nav ms-auto">
						<li class="nav-item dropdown">
							<a id="notifButton" class="nav-link mt-2" href="#" role="button" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								<i class="icon icon-lg cil-bell"></i>
							</a>
							<!-- start of dropdown div -->
							<div class="dropdown-menu fade-in dropdown-menu-end mt-3 p-auto" aria-labelledby="notifButton" style="width: 30rem">
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
						</li>
					</ul>
					<ul class="header-nav">
						<li class="nav-item dropdown">
							<a class="nav-link p-2 px-4 d-flex gap-3 align-items-center rounded-2 text-decoration-none" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								<div class="avatar overflow-hidden" style="width: 2.5rem; height: 2.5rem">
									@if (Auth::user()->image_url != null)
									<img class="avatar-img avatar-lg" src="{{ asset('img/profile') . '/' . Auth::user()->image_url }}" />
									@else
									<div class="avatar bg-secondary w-100 h-100 text-white fw-bold">{{ Auth::user()->first_name[0] }}</div>
									@endif
								</div>
								<span class="fw-bold">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end pt-0 animate slide-in overflow-hidden">
								<div class="dropdown-header bg-light py-2">
									<div class="fw-semibold">Account</div>
								</div>
								<a class="dropdown-item small" href="{{ route('service-my-profile') }}"> My Profile</a>
								<a class="dropdown-item small" href="{{ route('service-bookings') }}"> Bookings</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item small d-flex align-items-center gap-3" href="{{ route('logout') }}" onclick="event.preventDefault(); $('#logout-form').submit();"> Logout </a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
							</div>
						</li>
					</ul>
				</div>
				<div class="header-divider"></div>
				<div class="container-fluid fade-in">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb my-0 ms-2">
							<li class="breadcrumb-item small">{{ $bi1 }}</li>
							<li class="breadcrumb-item active small">{{ $bi2 }}</li>
						</ol>
					</nav>
				</div>
			</header>
			<main class="main w-100">
				<div class="min-vh-100">
					@yield('content') @if (session('sent-newsletter-success'))
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
									<div class="d-flex w-100 gap-2">
										<input id="newsLetterEmail" name="email" type="email" class="form-control" placeholder="Email address" />
										<button type="submit" class="btn btn-secondary text-uppercase text-white fw-bold w-25" type="button">Send</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</footer>
			</main>
		</div>
	</body>
</html>
@yield('javascript')
