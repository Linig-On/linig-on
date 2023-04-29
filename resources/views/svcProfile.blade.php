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
		<div class="col-md-4">
			<div class="w-100 d-flex justify-content-center p-5">
				<div style="width: 10rem; height: 10rem" class="border border-1 border-secondary rounded-circle img-fluid prev-img">
					<img
						id="previewImageBeforeUpload"
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
				<i class="fa fa-solid fa-star"></i>
				@endfor @if ($workerRatingAvg < 5) @for ($i = 0; $i < 5 - $workerRatingAvg; $i++)
				<i class="fa fa-regular fa-star"></i>
				@endfor @endif
			</div>
			<hr />
			<div class="d-flex justify-content-center">
				<button type="button" class="btn btn-primary text-uppercase fw-bold z-index-30">Book A service</button>
			</div>
			<div class="py-4">
				<div class="pb-3">
					<h2>Skills</h2>
					<div class="d-flex flex-wrap gap-2">
						@foreach($workerSkills as $i)
						<div class="view-tag">{{ $i->skill }}</div>
						@if(!$loop->last) @endif @endforeach
					</div>
				</div>
				<h2 class="pb-3">Socials</h2>
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
					<h2>Reviews</h2>
					<hr class="divider" />
					@foreach ($workerRatings as $rating)
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
									<h5 class="">{{ $rating->name }}</h5>
									<p>{{ $rating->comment }}</p>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<div class="spacer"></div>

<!-- View Resume Modal -->
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
@endsection
