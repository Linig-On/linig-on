@extends('layouts.app') @section('content')

<section>
	<div class="position-relative">
		<div class="position-absolute w-100 fade-in" style="z-index: 10; top: 10rem"">
		<div class="container w-50 mx-auto">
			<h1 class="text-uppercase fw-bolder">About Us.</h1>
			<p>
				<b>From the bikol word, <i>“linigon”</i> is a website that offers home cleaning services provided by local service workers. It aims to shorten the gap between customers and service workers.</b> Through this website, you can forget the hassle of finding reliable people to solve your cleaning problems!
			</p>
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
</section>
<section class="fade-in">
	<div class="container w-50">
		<h1 class="text-uppercase fw-bolder">Get in Touch.</h1>
		<label for="" class="fw-bold">Send us a Message</label>
		<p>Have something to say? Send us your concerns!</p>

		<div class="row gx-5">
			<div class="col">
				<form action="" class="d-flex flex-column gap-3">
					<div>
						<label class="small fw-bold" for="">Name</label>
						<input type="text" class="form-control" />
					</div>
					<div>
						<label class="small fw-bold" for="">Email Address</label>
						<input type="email" class="form-control" />
					</div>
					<div>
						<label class="small fw-bold" for="">Message</label>
						<textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
					</div>
					<div class="d-flex justify-content-between">
						<div></div>
						<button class="btn btn-primary ms-auto text-white text-uppercase">
							Submit
							<i class="fa-solid fa-arrow-right-long text-white"></i>
						</button>
					</div>
				</form>
			</div>
			<div class="col">
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
			<div class="col">
				<label for="" class="text-muted fw-bold">FAQs</label>
				<h1 class="fw-bolder">
					FREQUENTLY ASKED <br />
					QUESTIONS.
				</h1>
			</div>
			<div class="col">
				<p>As much as possible our platform aims to provide quality service by giving transparency to our users. Some of our frequently asked questions are:</p>
				<div class="accordion" id="accordionExample">
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingOne">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">How do I book a service?</button>
						</h2>
						<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							<div class="accordion-body"><strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingTwo">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">What mode of payments are available for Linig-On?</button>
						</h2>
						<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
							<div class="accordion-body"><strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingThree">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Can I change my account details?</button>
						</h2>
						<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
							<div class="accordion-body"><strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.</div>
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
		<div class="d-flex align-items-center gap-2">
			<h1 class="fw-bolder my-0">MEET THE DEVELOPERS OF</h1>
			<img src="{{ asset('svg/site/logo.svg') }}" alt="" width="200" />
		</div>
		<div class="row">
			<div class="col-md-4">
				<img src="{{ asset('img/about-us/gene.png') }}" alt="" width="200" />
				<h5 class="fw-bolder mt-4">Johcel Gene T. Bitara</h5>
				<p>UI/UX Designer; Frontend-Backend Developer</p>
				<small>BS-Information Technology</small>
				<div class="d-flex align-items-center gap-2 mt-3">
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
			<div class="col-md-4">
				<img src="{{ asset('img/about-us/kim.png') }}" alt="" width="200" />
				<h5 class="fw-bolder mt-4">Camela Kim P. Quidip</h5>
				<p>UI/UX Designer; Frontend-Backend Developer</p>
				<small>BS-Information Technology</small>
				<div class="d-flex align-items-center gap-2 mt-3">
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
			<div class="col-md-4">
				<img src="{{ asset('img/about-us/mat.png') }}" alt="" width="200" />
				<h5 class="fw-bolder mt-4">Mathew P. Talagtag</h5>
				<p>UI/UX Designer; Frontend-Backend Developer</p>
				<small>BS-Information Technology</small>
				<div class="d-flex align-items-center gap-2 mt-3">
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
