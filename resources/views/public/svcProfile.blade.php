@extends('layouts.app') @section('content')
<div class="container mt-3">
	<nav style="--bs-breadcrumb-divider: url('{{ asset('svg/icon/breadcrumb-divider.svg') }}');" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/service">Services</a></li>
			<li class="breadcrumb-item active" aria-current="page">Worker</li>
		</ol>
	</nav>
	<div class="ms-auto w-mc my-3 fade-in">
		<a href="/service" class="fw-bolder">
			<i class="fa-solid fa-arrow-left-long"></i>
			Go Back
		</a>
	</div>
</div>

<div class="container fade-in">
	@if (session('worker-rating-success'))
	<div class="alert alert-success mb-3 d-flex gap-3 align-items-center" role="alert">
		<i class="fa-solid fa-circle-check text-primary"></i>
		<small class="text-primary fw-semibold">{!! session("worker-rating-success") !!}</small>
	</div>
	@endif @if (session("worker-rating-failed"))
	<div class="alert alert-danger mb-3 d-flex gap-3 align-items-center" role="alert">
		<i class="fa-solid fa-circle-xmark text-danger"></i>
		<small class="text-danger fw-semibold">{!! session("worker-rating-failed") !!}</small>
	</div>
	@endif @if (session("worker-rating-failed-missing-fields"))
	<div class="alert alert-danger mb-3 d-flex gap-3 align-items-center" role="alert">
		<i class="fa-solid fa-circle-xmark text-danger"></i>
		<small class="text-danger fw-semibold">{!! session("worker-rating-failed-missing-fields") !!}</small>
	</div>
	@endif @if (session('app-rating-success'))
	<div class="alert alert-success mb-3 d-flex gap-3 align-items-center" role="alert">
		<i class="fa-solid fa-circle-check text-primary"></i>
		<small class="text-primary fw-semibold">{!! session("app-rating-success") !!}</small>
	</div>
	@endif @if (session("app-rating-failed"))
	<div class="alert alert-danger mb-3 d-flex gap-3 align-items-center" role="alert">
		<i class="fa-solid fa-circle-xmark text-danger"></i>
		<small class="text-danger fw-semibold">{!! session("app-rating-failed") !!}</small>
	</div>
	@endif @if (session("app-rating-failed-missing-fields"))
	<div class="alert alert-danger mb-3 d-flex gap-3 align-items-center" role="alert">
		<i class="fa-solid fa-circle-xmark text-danger"></i>
		<small class="text-danger fw-semibold">{!! session("app-rating-failed-missing-fields") !!}</small>
	</div>
	@endif @if (session('booking-success'))
	<div class="alert alert-success mb-3 d-flex gap-3 align-items-center" role="alert">
		<i class="fa-solid fa-circle-check text-primary"></i>
		<small class="text-primary fw-semibold">{!! session("booking-success") !!}</small>
	</div>
	@endif @if (session('booking-failed'))
	<div class="alert alert-danger mb-3 d-flex gap-3 align-items-center" role="alert">
		<i class="fa-solid fa-circle-xmark text-danger"></i>
		<small class="text-danger fw-semibold">{!! session("booking-failed") !!}</small>
	</div>
	@endif
	<div class="row">
		<div class="col-md-4 position-relative">
			@if (Auth::user() != null)
			<button id="bookmarkBtn" class="position-absolute btn shadow-none px-0 pt-2 rounded-0 border-0" style="right: 5rem; top: 3rem">
				<i class="fa fa-regular fa-bookmark h3 text-primary"></i>
			</button>
			@endif
			<div class="w-100 d-flex justify-content-center p-5">
				<div style="width: 10rem; height: 10rem" class="border border-1 border-secondary rounded-circle img-fluid prev-img">
					<img
						src="@if ($userInfo->image_url != null)
                            {{ asset('img/profile') . '/' . $userInfo->image_url }}
                            @else
                                {{ asset('svg/illust/upload-photo.svg') }}
                            @endif"
						alt=""
						class="avatar w-100 h-100"
					/>
				</div>
			</div>
			<i class="fa-solid fa-quote-left fa-2xl"></i>
			<p class="text-center">{{ $workerInfo->short_bio }}</p>
			<div class="d-flex gap-2 w-mc mx-auto">
				@for ($i = 0; $i < $workerRatingAvg; $i++)
				<i class="fa fa-solid fa-star h4 text-warning"></i>
				@endfor @if ($workerRatingAvg < 5) @for ($i = 0; $i < 5 - $workerRatingAvg; $i++)
				<i class="fa fa-regular fa-star h4 text-warning"></i>
				@endfor @endif
			</div>
			<hr />
			<div class="d-flex justify-content-center">
				@if (Auth::check())
				<button type="button" class="btn btn-primary text-uppercase fw-bold z-index-30" data-bs-toggle="modal" data-bs-target="#bookAService">Book A service</button>
				@else
				<a href="/login" role="button" class="btn btn-primary text-uppercase fw-bold">Book A service</a>
				@endif
			</div>
			<div class="py-4">
				<div class="pb-3">
					<h4 class="fw-bolder text-uppercase">Skills</h4>
					<div class="d-flex flex-wrap gap-2">
						@foreach($workerSkills as $i)
						<div class="view-tag">{{ $i->skill }}</div>
						@endforeach
					</div>
				</div>
				<h4 class="fw-bolder text-uppercase mt-4">Socials</h4>
				<div class="d-flex flex-wrap gap-2">
					@foreach($workerSocials as $i) @if(strpos($i->social, 'facebook') !== false)
					<a href="https://{{ $i->social }}" target="_blank">
						<img src="{{ asset('svg/icon/facebook.svg') }}" alt="facebook" />
					</a>
					@endif @if(strpos($i->social, 'messenger') !== false)
					<a href="https://{{ $i->social }}" target="_blank">
						<img src="{{ asset('svg/icon/messenger.svg') }}" alt="messenger" />
					</a>
					@endif @if(strpos($i->social, 'instagram') !== false)
					<a href="https://{{ $i->social }}" target="_blank">
						<img src="{{ asset('svg/icon/instagram.svg') }}" alt="instagram" />
					</a>
					@endif @if(strpos($i->social, 'linkedin') !== false)
					<a href="https://{{ $i->social }}" target="_blank">
						<img src="{{ asset('svg/icon/linkedin.svg') }}" alt="linkedin" />
					</a>
					@endif @if(strpos($i->social, 'twitter') !== false)
					<a href="https://{{ $i->social }}" target="_blank">
						<img src="{{ asset('svg/icon/twitter.svg') }}" alt="twitter" />
					</a>
					@endif @endforeach
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12 col-sm-4 shadow p-3 mb-5 rounded-5 border border-1" style="float: none; width: 100%">
					<div class="row py-2">
						<div class="col-md-2 d-flex flex-row gap-3 align-items-center">
							<i class="fa fa-solid fa-user"></i>
							<label for="" class="text-primary text-nowrap fw-bold small">Full Name</label>
						</div>
						<div class="col-md-8 z-index-30">
							<input disabled type="text" class="form-control" id="floatingInputGrid" placeholder="Full Name" value="{{ $userInfo->first_name . ' ' . $userInfo->last_name }}" />
						</div>
					</div>
					<div class="row py-2">
						<div class="col-md-2 d-flex flex-row gap-3 align-items-center">
							<i class="fa fa-solid fa-phone"></i>
							<label for="" class="text-primary text-nowrap fw-bold small">Mobile</label>
						</div>
						<div class="col-md-8 z-index-30">
							<input disabled type="text" class="form-control" id="floatingInputGrid" placeholder="Full Name" value="{{ $userInfo->contact_number }}" />
						</div>
					</div>
					<div class="row py-2">
						<div class="col-md-2 d-flex flex-row gap-3 align-items-center">
							<i class="fa fa-solid fa-location-dot"></i>
							<label for="" class="text-primary text-nowrap fw-bold small">Address</label>
						</div>
						<div class="col-md-8 z-index-30">
							<input disabled type="text" class="form-control" id="floatingInputGrid" placeholder="Full Name" value="{{ $userInfo->address }}" />
						</div>
					</div>
					<div class="d-flex justify-content-between py-2">
						<div></div>
						<button type="button" class="btn btn-primary text-uppercase fw-bold z-index-30" data-bs-toggle="modal" data-bs-target="#viewResumeModal">
							View Resume
							<i class="fa-regular fa-file text-white"></i>
						</button>
					</div>
				</div>
				<div id="serviceInfoContainer" class="col-md-12 shadow px-5 py-4 mb-5 rounded-5 border border-1" style="border-left: 7px solid var(--secondary) !important; border-top-left-radius: 3px !important; border-bottom-left-radius: 3px !important">{!! $workerInfo->service_info !!}</div>
				<div class="col-md-12">
					<div class="d-flex justify-content-between">
						<h3 class="fw-bolder text-uppercase">Reviews</h3>
						@if ($canComment)
						<button class="btn btn-outline-primary px-3" data-bs-toggle="modal" data-bs-target="#workerRatingModal">
							<i class="fa-solid fa-pen-to-square hvr-white"></i>
						</button>
						@endif
					</div>
					<hr class="divider" />
					<ul id="paginatedList" data-current-page="1" aria-live="polite">
						@foreach ($workerRatings as $rating)
						<li>
							<div class="card rounded-5 border border-1 shadow mb-3">
								<div class="card-body">
									<div class="d-flex gap-3">
										@if (DB::table('users')->where('id', $rating->user_id)->first()->image_url)
										<img class="rounded-circle" style="width: 3rem; height: 3rem" src="{{ asset('img/profile') . '/' . DB::table('users')->where('id', $rating->user_id)->first()->image_url }}" alt="" />
										@else
										<div class="w-mc" style="width: 3rem; height: 3rem">
											<div class="avatar w-100 h-100 rounded-circle bg-secondary text-white fw-bold">{{ $rating->name[0] }}</div>
										</div>
										@endif
										<div>
											<h5 class="fw-bolder">{{ $rating->name }}</h5>
											<p>{{ $rating->comment }}</p>
											<div class="d-flex gap-2 w-mc">
												@for ($i = 0; $i < $rating->rating; $i++)
												<i class="fa fa-solid fa-star h4 text-warning"></i>
												@endfor @if ($rating->rating < 5) @for ($i = 0; $i < 5 - $rating->rating; $i++)
												<i class="fa fa-regular fa-star h4 text-warning"></i>
												@endfor @endif
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
					<nav class="pagination-container">
						<button type="button" class="pagination-button btn btn-primary text-white text-uppercase fw-bold px-4" id="prevButton" aria-label="Previous page" title="Previous page">Previous</button>
						<div id="paginationNumbers"></div>
						<button type="button" class="pagination-button btn btn-primary text-white text-uppercase fw-bold px-4" id="nextButton" aria-label="Next page" title="Next page">Next</button>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<button id="feedbackBtnTrg" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#appFeedbackModal">Click</button>
<div class="spacer"></div>

<!-- Resume Modal -->
<div class="modal fade" id="viewResumeModal" tabindex="-1" aria-labelledby="viewResumeModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center gap-1">
					<h5 class="modal-title fw-bolder text-uppercase" id="viewResumeModalLabel">My Resume</h5>
					<i class="fa-solid fa-book text-primary"></i>
				</div>
			</div>
			<div class="modal-body">
				<embed src="{{ asset('resume/approved/' . $workerInfo->resume_url) }}" width="100%" style="min-height: 75vh" />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Booking Modal -->
@if (Auth::check())
<div class="modal fade" id="bookAService" tabindex="-1" aria-labelledby="bookAServiceLabel" aria-hidden="true">
	@if (session('booking-missing-fields'))
	<script>
		$(function () {
			$("#bookAService").modal("show");
		});
	</script>
	@endif
	<form action="{{ route('book-worker') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<input name="user_id" type="text" class="d-none" value="{{ Auth::user()->id }}" />
		<input name="worker_id" type="text" class="d-none" value="{{ $workerInfo->id }}" />
		<div class="modal-dialog">
			<div class="modal-content position-relative overflow-hidden">
				<div class="modal-header bg-primary"></div>
				<div class="modal-body px-5 py-4 z-index-20">
					@if (session('booking-missing-fields'))
					<div class="alert alert-danger bg-white mb-3 d-flex gap-3 align-items-center" role="alert">
						<i class="fa-solid fa-circle-check text-danger"></i>
						<small class="text-danger fw-semibold">Invalid form request. Please fill in all of the required fields.</small>
					</div>
					@endif
					<div class="d-flex align-items-center gap-1 mb-3">
						<h2 class="mb-0 fw-bolder text-uppercase" id="bookAServiceLabel">booking</h2>
						<i class="fa-solid fa-book"></i>
					</div>
					<section>
						<h4 class="fw-bolder text-uppercase">Type of Area <span class="text-danger small">*</span></h4>
						@error('area_type')
						<span class="invalid-feedback d-block" role="alert">
							<strong class="small text-danger">The area type is required.</strong>
						</span>
						@enderror
						<div class="form-check m-2">
							<input name="area_type[]" class="form-check-input" type="checkbox" value="House" id="houseCheck" />
							<label class="form-check-label small fw-bold" for="houseCheck">House</label>
						</div>
						<div class="form-check m-2">
							<input name="area_type[]" class="form-check-input" type="checkbox" value="Room" id="roomCheck" />
							<label class="form-check-label small fw-bold" for="roomCheck">Room</label>
						</div>
						<div class="form-check m-2">
							<input name="area_type[]" class="form-check-input" type="checkbox" value="Garage" id="garageCheck" />
							<label class="form-check-label small fw-bold" for="garageCheck">Garage</label>
						</div>
						<div class="form-check m-2">
							<input name="area_type[]" class="form-check-input" type="checkbox" value="Garden" id="gardenCheck" />
							<label class="form-check-label small fw-bold" for="gardenCheck">Garden</label>
						</div>
						<div class="form-check m-2">
							<input name="area_type[]" class="form-check-input" type="checkbox" value="Pool" id="poolCheck" />
							<label class="form-check-label small fw-bold" for="poolCheck">Pool</label>
						</div>
					</section>
					<section>
						<div class="d-flex align-items-center gap-1">
							<h4 class="modal-title text-uppercase fw-bolder">address</h4>
							<i class="fa-solid fa-xl fa-location-dot text-primary"></i>
						</div>
						<div>
							<label for="address" class="text-primary fw-bold small">Home Address <span class="text-danger small">*</span></label>
							<textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" rows="3" aria-label=""></textarea>
						</div>
						<div class="my-3">
							<label for="landmarks" class="text-primary fw-bold small">Landmarks <span class="text-danger small">*</span></label>
							<input id="landmarks" name="landmarks" type="text" class="form-control @error('landmarks') is-invalid @enderror" />
						</div>
					</section>
					<section>
						<div class="d-flex flex-column">
							<div class="row d-flex justify-content-center">
								<h4 class="text-uppercase fw-bolder">specification</h4>
								<div class="col-md-5 flex-column align-items-center mx-auto" style="height: 200px">
									<label for="" class="fw-bold small">Image of the Area</label>
									<img id="previewImageBeforeUpload" src="{{ asset('svg/illust/upload-photo.svg') }}" alt="preview image" class="shadow-sm bg-body-tertiary rounded-5 border border-1 img-fluid prev-img" style="width: 100%; height: 10rem" />
									<label for="imageOfArea" class="btn btn-primary text-uppercase fw-bold p-2 mt-2" style="width: 100%; margin-bottom: 10px">Upload image</label>
									<input id="imageOfArea" name="image_of_area" type="file" class="d-none" />
								</div>
								<div class="col-md-7 mx-auto">
									<div class="form-group">
										<label for="message" class="small fw-bold">Other requests/additional details</label>
										<textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" rows="3"></textarea>
									</div>
									<div class="d-flex align-items-center gap-2">
										<div class="col-md-6 mt-2">
											<label for="preferredTime" class="small fw-bold">Preferred Time <span class="text-danger small">*</span></label>
											<input type="time" name="preferred_time" class="form-control pe-4 @error('preferred_time') is-invalid @enderror" id="preferredTime" />
										</div>
										<div class="col-md-6 mt-2">
											<label for="preferredDate" class="small fw-bold">Preferred Date <span class="text-danger small">*</span></label>
											<input type="date" name="preferred_date" class="form-control pe-4 @error('preferred_date') is-invalid @enderror" id="preferredDate" />
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-primary fw-bold text-uppercase" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary fw-bold text-uppercase">Book</button>
							</div>
						</div>
					</section>
				</div>
				<img class="opacity-50 position-absolute z-index-10" style="right: -2rem; top: 3rem" width="400" src="{{ asset('svg/illust/no-data.svg') }}" alt="" />
			</div>
		</div>
	</form>
</div>

<!--Worker Rating Modal -->
<div class="modal fade" id="workerRatingModal" tabindex="-1" aria-labelledby="workerRatingModalLabel" aria-hidden="true">
	<form method="POST" action="{{ route('rate-worker') }}">
		@csrf
		<input type="text" class="d-none" name="user_id" value="{{ Auth::user()->id }}" />
		<input type="text" class="d-none" name="worker_id" value="{{ $workerInfo->id }}" />
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white"></div>
				<div class="modal-body mx-4 py-5 px-5">
					<div class="d-flex flex-column justify-content-center align-items-center">
						<img src="{{ asset('svg/illust/undraw-realtime-comm.svg') }} " alt="image" />
						<div class="text-center">
							<h3 class="text-uppercase fw-bolder mt-5">Post A Comment!</h3>
							<p>
								Rate <span>{{ $userInfo->first_name . ' ' . $userInfo->last_name }}</span> service. Your feedback is much appreciated in improving their services.
							</p>
						</div>
					</div>
					<div class="d-flex flex-column gap-3">
						<div class="col-12">
							<label class="text-primary fw-bold small">Full Name</label>
							<input name="full_name" type="text" class="form-control" />
						</div>
						<div class="col-12">
							<label class="text-primary fw-bold small">Comment</label>
							<textarea name="comment" class="form-control" rows="5" aria-label="With textarea"></textarea>
						</div>
						<div class="d-flex align-items-center justify-content-between gap-5">
							<div>
								<label class="text-primary fw-bold small">Rating</label>
								<div id="starRatingContainer">
									<div class="d-flex gap-2 me-5">
										<i data-value="1" class="fa fa-regular fa-star h4 text-warning cursor-pointer"></i>
										<i data-value="2" class="fa fa-regular fa-star h4 text-warning cursor-pointer"></i>
										<i data-value="3" class="fa fa-regular fa-star h4 text-warning cursor-pointer"></i>
										<i data-value="4" class="fa fa-regular fa-star h4 text-warning cursor-pointer"></i>
										<i data-value="5" class="fa fa-regular fa-star h4 text-warning cursor-pointer"></i>
									</div>
									<input id="rating" name="rating" value="" class="d-none" />
								</div>
							</div>
							<div class="w-mc gap-2 mt-3">
								<button type="button" class="btn btn-outline-primary fw-bold text-uppercase" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary fw-bold text-uppercase">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- App Feedback Modal -->
@if (session('worker-rating-success') || session('app-rating-failed') || session('app-rating-failed-missing-fields'))
<script type="text/javascript">
	$(document).ready(function () {
		$("#feedbackBtnTrg").click();
	});
</script>
<div class="modal fade" id="appFeedbackModal" tabindex="-1" aria-labelledby="appFeedbackModalLabel" aria-hidden="true">
	<form method="POST" action="{{ route('rate-app') }}">
		@csrf
		<input type="text" class="d-none" name="user_id" value="{{ Auth::user()->id }}" />
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white"></div>
				<div class="modal-body mx-4 py-5 px-5">
					<div class="d-flex flex-column justify-content-center align-items-center">
						<img src="{{ asset('svg/illust/undraw-logistics.svg') }} " alt="image" />
						<div class="text-center">
							<h3 class="text-uppercase fw-bolder mt-5">Let Us Know How We're Doing!</h3>
							<p>Help us improve. Rate your experience while using our application!</p>
						</div>
					</div>
					<div class="d-flex flex-column gap-3">
						<div class="col-12">
							<label class="text-primary fw-bold small">Full Name</label>
							<input name="full_name" type="text" class="form-control" />
						</div>
						<div class="col-12">
							<label class="text-primary fw-bold small">Comment</label>
							<textarea name="comment" class="form-control" rows="5" aria-label="With textarea"></textarea>
						</div>
						<div class="col-12">
							<div class="d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center justify-content-between">
									<div class="d-flex gap-4">
										<div class="d-flex align-items-center gap-2">
											<button type="button" id="likeBtn" class="btn border-0 px-0 shadow-none likeBtnGroup fw-bold text-primary">
												<i class="fa-regular fa-thumbs-up text-primary fa-2xl"></i>
												Yes
											</button>
										</div>
										<div class="d-flex align-items-center gap-2">
											<button type="button" id="dislikeBtn" class="btn border-0 px-0 shadow-none likeBtnGroup fw-bold text-primary">
												<i class="fa-regular fa-thumbs-up fa-flip-vertical text-primary fa-2xl"></i>
												No
											</button>
										</div>
										<input name="is_liked" type="text" class="d-none" value="" />
									</div>
								</div>
							</div>
							<div class="w-mc ms-auto">
								<button type="button" class="btn btn-outline-primary fw-bold text-uppercase" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary fw-bold text-uppercase">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endif @endif @endsection @section('javascript')
<!-- Pagination Script -->
<script src="{{ asset('vendor/pagination/pagination.js') }}"></script>
<script type="text/javascript">
	const $bookmarkBtn = $("#bookmarkBtn");
	const $bookmarkBtnIcon = $bookmarkBtn.find("i");

	$(document).ready(function () {
		prevImageOnUpload("#imageOfArea", "#previewImageBeforeUpload");
		bookmarkToggleState();
		bookmarkHandler();
		initPagination();

		// modals
		starRatingHandler();
		likeHandler();
	});

	const bookmarkToggleState = function () {
		const isBookedmarked = "{{ $isBookmarked }}" === "true" ? true : false;

		if (isBookedmarked) {
			$bookmarkBtnIcon.removeClass("fa-regular").addClass("fa-solid");
		}
	};

	const bookmarkHandler = function () {
		$bookmarkBtn.click(function () {
			const workerId = parseInt("{{ $workerInfo->id }}");
			const unBookmarked = $bookmarkBtnIcon.hasClass("fa-regular");

			if (unBookmarked) bookmarkWorker(workerId);
			else unBookmarkWorker(workerId);
		});
	};

	const bookmarkWorker = function (workerId) {
		$bookmarkBtnIcon.removeClass("fa-regular").addClass("fa-solid");

		$.ajax({
			url: "{{ route('bookmark-worker') }}",
			data: {
				id: workerId,
				_token: "{{ csrf_token() }}",
			},
			type: "POST",
			success: function (res) {
				// TODO: clean this
				console.log(res);
			},
		});
	};

	const unBookmarkWorker = function (workerId) {
		$bookmarkBtnIcon.removeClass("fa-solid").addClass("fa-regular");

		$.ajax({
			url: "{{ route('un-bookmark-worker') }}",
			data: {
				id: workerId,
				_token: "{{ csrf_token() }}",
			},
			type: "POST",
			success: function (res) {
				// TODO: clean this
				console.log(res);
			},
		});
	};

	const starRatingHandler = function () {
		$("#starRatingContainer .fa-star").hover(
			function () {
				var value = $(this).data("value");
				$(this).prevAll().addBack().removeClass("fa-regular").addClass("fa-solid");
				$(this).nextAll().removeClass("fa-solid").addClass("fa-regular");
			},
			function () {
				var value = $("#starRatingContainer #rating").val();
				if (!value) {
					$(this).prevAll().addBack().removeClass("fa-solid").addClass("fa-regular");
				} else {
					$("#starRatingContainer .fa-star[data-value='" + value + "']")
						.prevAll()
						.addBack()
						.removeClass("fa-regular")
						.addClass("fa-solid");
					$("#starRatingContainer .fa-star[data-value='" + value + "']")
						.nextAll()
						.removeClass("fa-solid")
						.addClass("fa-regular");
				}
			}
		);

		$("#starRatingContainer .fa-star").click(function () {
			var value = $(this).data("value");
			$("#starRatingContainer #rating").val(value);
			$(this).prevAll().addBack().removeClass("fa-regular").addClass("fa-solid");
			$(this).nextAll().removeClass("fa-solid").addClass("fa-regular");
		});
	};

	const likeHandler = function () {
		$("#likeBtn").click(function () {
			$("input[name='is_liked']").val(true);

			if (!$(this).hasClass("active")) {
				$(this).addClass("active");
				$(this).find("i").removeClass("fa-regular").addClass("fa-solid");
				$("#dislikeBtn").removeClass("active");
				$("#dislikeBtn").find("i").removeClass("fa-solid").addClass("fa-regular");
				$("input[name=is_liked]").val("1");
			} else {
				$(this).removeClass("active");
				$(this).find("i").removeClass("fa-solid").addClass("fa-regular");
				$("input[name=is_liked]").val("");
			}
		});

		$("#dislikeBtn").click(function () {
			$("input[name='is_liked']").val(false);

			if (!$(this).hasClass("active")) {
				$(this).addClass("active");
				$(this).find("i").removeClass("fa-regular").addClass("fa-solid");
				$("#likeBtn").removeClass("active");
				$("#likeBtn").find("i").removeClass("fa-solid").addClass("fa-regular");
				$("input[name=is_liked]").val("0");
			} else {
				$(this).removeClass("active");
				$(this).find("i").removeClass("fa-solid").addClass("fa-regular");
				$("input[name=is_liked]").val("");
			}
		});
	};
</script>
@endsection
