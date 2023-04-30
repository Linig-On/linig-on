@extends('layouts.app') @section('content')
<div class="container mt-3">
	<nav style="--bs-breadcrumb-divider: url('{{ asset('svg/icon/breadcrumb-divider.svg') }}');" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/service">Services</a></li>
			<li class="breadcrumb-item active" aria-current="page">Worker</li>
		</ol>
	</nav>
</div>

<div class="container fade-in">
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
				<button type="button" class="btn btn-primary text-uppercase fw-bold z-index-30" data-bs-toggle="modal" data-bs-target="#bookAService">Book A service</button>
			</div>
			<div class="py-4">
				<div class="pb-3">
					<h4 class="fw-bolder text-uppercase">Skills</h4>
					<div class="d-flex flex-wrap gap-2">
						@foreach($workerSkills as $i)
						<div class="view-tag">{{ $i->skill }}</div>
						@if(!$loop->last) @endif @endforeach
					</div>
				</div>
				<h4 class="fw-bolder text-uppercase">Socials</h4>
				<div class="d-flex flex-wrap gap-2">
					@foreach($workerSocials as $i)
					<div class="view-tag">{{ $i->social }}</div>
					@if(!$loop->last) @endif @endforeach
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12 col-sm-4 shadow p-3 mb-5 rounded-5 border border-1">
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
				<div class="col-md-12 col-sm-8 shadow p-4 mb-5 rounded-5 border border-1">{!! $workerInfo->service_info !!}</div>
				<div class="col-md-12 col-sm-8">
					<h3 class="fw-bolder text-uppercase">Reviews</h3>
					<hr class="divider" />
					<ul id="paginatedList" data-current-page="1" aria-live="polite">
						@foreach ($workerRatings as $rating)
						<li>
							<div class="card rounded-5 border border-1 shadow mb-3">
								<div class="card-body">
									<div class="d-flex gap-3">
										@if (DB::table('users')->where('id', $rating->user_id)->first()->image_url)
										<img src="{{ asset('img/profile') . '/' . DB::table('users')->where('id', $rating->user_id)->first()->image_url }}" alt="" />
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
<div class="spacer"></div>

<button type="button" class="btn btn-primary text-uppercase fw-bold z-index-30" data-bs-toggle="modal" data-bs-target="#appFeedbackModal">AppFeedbackPlaceholder</button>
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
<div class="modal fade" id="bookAService" tabindex="-1" aria-labelledby="bookAServiceLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center gap-1">
					<h5 class="modal-title fw-bolder text-uppercase" id="bookAServiceLabel">booking</h5>
					<i class="fa-solid fa-book text-primary"></i>
				</div>
			</div>
			<div class="modal-body">
				<h4>TYPE OF AREA</h4>
				<div class="form-check m-2">
					<input class="form-check-input" type="checkbox" value="" id="houseFlexCheckDefault" />
					<label class="form-check-label" for="houseflexCheckDefault"> House </label>
				</div>
				<div class="form-check m-2">
					<input class="form-check-input" type="checkbox" value="" id="roomFlexCheckDefault" />
					<label class="form-check-label" for="roomflexCheckDefault"> Room </label>
				</div>
				<div class="form-check m-2">
					<input class="form-check-input" type="checkbox" value="" id="roomFlexCheckDefault" />
					<label class="form-check-label" for="roomflexCheckDefault"> Garage </label>
				</div>
				<div class="form-check m-2">
					<input class="form-check-input" type="checkbox" value="" id="gardenFlexCheckDefault" />
					<label class="form-check-label" for="gardenFlexCheckDefault"> Garden </label>
				</div>
				<div class="form-check m-2">
					<input class="form-check-input" type="checkbox" value="" id="roomFlexCheckDefault" />
					<label class="form-check-label" for="roomflexCheckDefault"> Room </label>
				</div>
				<div class="form-check m-2">
					<input class="form-check-input" type="checkbox" value="" id="otherFlexCheckDefault" />
					<label class="form-check-label" for="otherFlexCheckDefault"> Others </label>
				</div>

				<div class="d-flex align-items-center gap-1">
					<h4 class="modal-title text-uppercase" id="bookAServiceLabel">address</h4>
					<i class="fa-solid fa-xl fa-location-dot text-primary"></i>
				</div>

				<div class="d-flex flex-column">
					<h6 class="text-primary fw-bold small">Home Address</h6>
					<div class="col-12">
						<textarea class="form-control" rows="5" aria-label="With textarea"></textarea>
					</div>
					<div class="my-3">
						<h6 class="text-primary fw-bold small">Landmarks</h6>
						<div class="col-12">
							<input type="text" class="form-control" />
						</div>
					</div>

					<div class="row d-flex justify-content-center">
						<h4 class="text-uppercase">specification</h4>
						<div class="col-md-5 flex-column align-items-center mt-4 mx-auto" style="height: 200px">
							<!-- Left content goes here -->
							<img id="preview-image-before-upload" src="{{ asset('svg/illust/upload-photo.svg') }}" alt="preview image" class="shadow-sm bg-body-tertiary rounded" style="width: 100%; height: 50%" />
							<label for="imageOfArea" class="btn btn-primary text-uppercase fw-bold p-2 mt-2" style="width: 100%; margin-bottom: 10px">Upload an image of area</label>
							<input id="imageOfArea" type="file" class="d-none" />
						</div>
						<div class="col-md-7 mx-auto">
							<div class="form-group" style="margin-bottom: 10px">
								<label for="message">Other requests/additional details</label>
								<textarea class="form-control" id="message" rows="3"></textarea>
							</div>
							<div class="d-flex align-items-center gap-2">
								<div class="col-md-6 mt-2">
									<label for="text" class="form-label">Preferred Time</label>
									<input type="text" class="form-control" id="time" style="margin-top: 0" />
								</div>
								<div class="col-md-6 mt-2">
									<label for="text" class="form-label">Preferred Date</label>
									<input type="text" class="form-control" id="date" style="margin-top: 0" />
								</div>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-primary">Book</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Worker Rating Modal -->
<div class="modal fade" id="workerRatingModal" tabindex="-1" aria-labelledby="workerRatingModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white"></div>
			    <div class="modal-body ">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src = "{{asset('svg/illust/undraw_real_time_collaboration_c62i 1.svg')}} " alt="image"/> 
                            <div class="text-center">
                                <h3 class="text-uppercase"> Post A Comment! </h3>
                                <p> Rate <span>{{ $userInfo->first_name . ' ' . $userInfo->last_name }}</span> service. Your feedback is much appreciated in improving their services.</p>
                            </div>
                    </div>
            
                            <div class="d-flex flex-column">
                                    <h6 class="text-primary fw-bold small">Full Name</h6>
                                        <div class="col-12">
                                            <input type="text" class="form-control" />
                                        </div>
					                <div class="my-3">
						                    <h6 class="text-primary fw-bold small">Comment</h6>
						                <div class="col-12">
                                            <textarea class="form-control" rows="5" aria-label="With textarea"></textarea>
						                </div>
					                </div>    

                                <div class="d-flex align-items-center justify-content-between gap-5 m-3">
								    <div class="d-flex gap-2 me-5">
                                        <i class="fa fa-regular fa-star"></i>
                                        <i class="fa fa-regular fa-star"></i>
                                        <i class="fa fa-regular fa-star"></i>
                                        <i class="fa fa-regular fa-star"></i>
                                        <i class="fa fa-regular fa-star"></i>
								    </div>
								        <div class="d-flex gap-2 ms-5">
                                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Submit</button>
								        </div>
							        </div>
                                </div>
		                    </div>
	            </div>
    </div>
</div>

<!-- App Feedback Modal -->
<div class="modal fade" id="appFeedbackModal" tabindex="-1" aria-labelledby="appFeedbackModalLabel" aria-hidden="true">
	<div class="modal-dialog p-auto">
		<div class="modal-content ">
			<div class="modal-header bg-primary text-white"></div>
			    <div class="modal-body p-5">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src = "{{asset('svg/illust/undraw-logistics.svg')}} " alt="image"/> 
                            <div class="text-center">
                                <h3 class="text-uppercase"> Let Us Know How We're Doing </h3>
                                <p> Help us improve. Rate your experience while using our application!</p>
                            </div>
                    </div>
            
                            <div class="d-flex flex-column">
                                    <h6 class="text-primary fw-bold small">Full Name</h6>
                                        <div class="col-12">
                                            <input type="text" class="form-control" />
                                        </div>
					                <div class="my-3">
						                    <h6 class="text-primary fw-bold small">Comment</h6>
						                <div class="col-12">
                                            <textarea class="form-control" rows="5" aria-label="With textarea"></textarea>
						                </div>
					                </div>    

                                <div class="d-flex align-items-center justify-content-between gap-5 m-3">
								    <div class="d-flex gap-2 me-5">
									<span class="icon"><i class="fa fa-thumbs-up"></i></span>
									<span class="label-text">Yes</span>
									<i class="fa-solid fa-thumbs-down"></i>
									<span>No</span>
								    </div>
								        <div class="d-flex gap-2 ms-5">
                                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Submit</button>
								        </div>
							        </div>
                                </div>
		                    </div>
	            </div>
    </div>
</div>





@endsection @section('javascript')
<!-- Pagination Script -->
<script src="{{ asset('vendor/pagination/pagination.js') }}"></script>
<script type="text/javascript">
	const $bookmarkBtn = $("#bookmarkBtn");
	const $bookmarkBtnIcon = $bookmarkBtn.find("i");

	$(document).ready(function () {
		bookmarkToggleState();
		bookmarkHandler();
		initPagination();
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
</script>
@endsection
