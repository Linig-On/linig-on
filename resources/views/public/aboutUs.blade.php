@extends('layouts.app') @section('content')

<section>
	<div class="position-relative">
		<div class="position-absolute w-100 fade-in" style="z-index: 10; top: 10rem">
			<div class="container w-50 mx-auto">
				<div id="aboutUs">
					<h1 class="text-uppercase fw-bolder">About Us.</h1>
					<p>
						<b>From the bikol word, <i>“linigon”</i> is a website that offers home cleaning services provided by local service workers. It aims to shorten the gap between customers and service workers.</b> Through this website, you can forget the hassle of finding reliable people to solve your cleaning problems!
					</p>
				</div>
			</div>
		</div>
		<div class="position-relative">
			<svg width="100%" height="100%" viewBox="0 0 1920 564" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_319_1958)">
					<rect width="1920" height="287" fill="#3FD4F8" />
					<rect x="1958.13" y="566.619" width="1980.16" height="403" transform="rotate(-171.881 1958.13 566.619)" fill="#3FD4F8" />
				</g>
				<defs>
					<clipPath id="clip0_319_1958">
						<rect width="1922" height="564" fill="white" transform="translate(-2)" />
					</clipPath>
				</defs>
			</svg>
		</div>
	</div>
</section>
<div class="spacer" id="spacerGetInTouch"></div>
<section class="fade-in">
	<div class="container w-50" id="getInTouch">
		<div class="row">
			<h1 class="text-uppercase fw-bolder">Get in Touch.</h1>
			<label for="" class="fw-bold">Send us a Message</label>
			<p>Have something to say? Send us your concerns!</p>
		</div>
		<div class="row gx-5">
			<div class="col-md-6">
				@if (session('sent-contact-success'))
				<div class="alert alert-success mb-3 d-flex gap-3 align-items-center" role="alert">
					<i class="fa-solid fa-circle-check text-primary"></i>
					<small class="text-primary fw-semibold">{!! session("sent-contact-success") !!}</small>
				</div>
				@endif @if (session('sent-contact-error'))
				<div class="alert alert-danger mb-3 d-flex gap-3 align-items-center" role="alert">
					<i class="fa-solid fa-circle-xmark text-danger"></i>
					<small class="text-danger fw-semibold">{!! session("sent-contact-error") !!}</small>
				</div>
				@endif
				<form method="POST" action="{{ route('send-contact-us') }}" class="d-flex flex-column gap-3">
					@csrf
					<div>
						<label class="small fw-bold" for="">Name</label>
						<input name="name" type="text" class="form-control" />
					</div>
					<div>
						<label class="small fw-bold" for="">Email Address</label>
						<input type="email" name="email" class="form-control" />
					</div>
					<div>
						<label class="small fw-bold" for="">Message</label>
						<textarea name="message" class="form-control" name="" id="" cols="30" rows="5"></textarea>
					</div>
					<div class="w-mc ms-auto">
						<button type="submit" class="btn btn-primary ms-auto text-white text-uppercase">
							Submit
							<i class="fa-solid fa-arrow-right-long text-white"></i>
						</button>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<div class="d-flex flex-column gap-5">
					<section>
						<h5 class="fw-bolder">Phone Number</h5>
						<p>Contact us through this phone number and our telephone hotline.</p>
						<div class="d-flex align-items-center gap-2">
							<img src="{{ asset('svg/icon/phone.svg') }}" alt="" />
							<p class="my-0">0970 322 4551 / 881-0321</p>
						</div>
					</section>
					<section>
						<h5 class="fw-bolder">Socials</h5>
						<p>Contact us through our socials.</p>
						<div class="d-flex align-items-center gap-2">
							<!-- Facebook -->
							<a href="#">
								<img src="{{ asset('svg/icon/facebook.svg') }}" alt="" />
							</a>
							<!-- Messenger -->
							<a href="#">
								<img src="{{ asset('svg/icon/messenger.svg') }}" alt="" />
							</a>
							<!-- Instagram -->
							<a href="#">
								<img src="{{ asset('svg/icon/instagram.svg') }}" alt="" />
							</a>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="spacer"></div>
<section id="faq" class="fade-in">
	<div class="container w-50">
		<div class="row">
			<div class="col-lg-6">
				<label for="" class="text-muted fw-bold">FAQs</label>
				<h1 class="fw-bolder">
					FREQUENTLY ASKED <br />
					QUESTIONS.
				</h1>
			</div>
			<div class="col-lg-6">
				<p>As much as possible our platform aims to provide quality service by giving transparency to our users. Some of our frequently asked questions are:</p>
				<div class="accordion" id="accordionExample">
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingOne">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">How do I book a service?</button>
						</h2>
						<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<strong>Book a service through our website.</strong>
								Register first by going through the registration process. After registering, you can find the different workers with their different skillset in the service page. After booking, the worker will approve your appointment with them.
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingTwo">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">What mode of payments are available for Linig-On?</button>
						</h2>
						<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
							<div class="accordion-body"><strong>As of now, Linig-on does not support on-website payment transaction.</strong>Your mode of payment will differ case by case depending on the worker. Some of them will have Gcash as mode of payment, and some will allow on-hand payment.</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingThree">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">What area does Linig-on provide services?</button>
						</h2>
						<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
							<div class="accordion-body"><strong>Linig-on has workers that services in Naga City and nearby areas only.</strong>As the workers that uses our website are from Naga City, they will only service to places that they will accept when your appointment request are received by them.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="spacer"></div>
<section class="fade-in">
	<div class="container w-50">
		<div class="row">
			<div class="col">
				<h1 class="fw-bolder my-0">MEET THE DEVELOPERS OF</h1>
			</div>
			<div class="col">
				<img src="{{ asset('svg/site/logo.svg') }}" alt="" width="200" />
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 text-center">
				<img src="{{ asset('img/about-us/gene.png') }}" alt="" width="200" />
				<h5 class="fw-bolder mt-4">Johcel Gene T. Bitara</h5>
				<p>
					UI/UX Designer <br />
					Frontend Developer <br />
					Backend Developer
				</p>
				<small>BS-Information Technology</small>
				<div class="d-flex align-items-center gap-2 mt-3 w-mc mx-auto">
					<!-- Facebook -->
					<a href="#">
						<img src="{{ asset('svg/icon/facebook.svg') }}" alt="" />
					</a>
					<!-- Messenger -->
					<a href="#">
						<img src="{{ asset('svg/icon/messenger.svg') }}" alt="" />
					</a>
					<!-- Instagram -->
					<a href="#">
						<img src="{{ asset('svg/icon/instagram.svg') }}" alt="" />
					</a>
				</div>
			</div>
			<div class="col-lg-4 text-center">
				<img src="{{ asset('img/about-us/kim.png') }}" alt="" width="200" />
				<h5 class="fw-bolder mt-4">Camela Kim P. Quidip</h5>
				<p>
					UI/UX Designer <br />
					Frontend Developer <br />
					Seeder
				</p>
				<small>BS-Information Technology</small>
				<div class="d-flex align-items-center gap-2 mt-3 w-mc mx-auto">
					<!-- Facebook -->
					<a href="#">
						<img src="{{ asset('svg/icon/facebook.svg') }}" alt="" />
					</a>
					<!-- Messenger -->
					<a href="#">
						<img src="{{ asset('svg/icon/messenger.svg') }}" alt="" />
					</a>
					<!-- Instagram -->
					<a href="#">
						<img src="{{ asset('svg/icon/instagram.svg') }}" alt="" />
					</a>
				</div>
			</div>
			<div class="col-lg-4 text-center">
				<img src="{{ asset('img/about-us/mat.png') }}" alt="" width="200" />
				<h5 class="fw-bolder mt-4">Mathew P. Talagtag</h5>
				<p>
					UI/UX Designer <br />
					Frontend Developer <br />
					Seeder
				</p>
				<small>BS-Information Technology</small>
				<div class="d-flex align-items-center gap-2 mt-3 w-mc mx-auto">
					<!-- Facebook -->
					<a href="#">
						<img src="{{ asset('svg/icon/facebook.svg') }}" alt="" />
					</a>
					<!-- Messenger -->
					<a href="#">
						<img src="{{ asset('svg/icon/messenger.svg') }}" alt="" />
					</a>
					<!-- Instagram -->
					<a href="#">
						<img src="{{ asset('svg/icon/instagram.svg') }}" alt="" />
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="spacer"></div>
@endsection
