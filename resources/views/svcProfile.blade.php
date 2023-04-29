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
				<button type="button" class="btn btn-primary text-uppercase fw-bold z-index-30" data-bs-toggle="modal" data-bs-target="#bookAservice" >Book A service</button>
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
<div class="modal fade" id="bookAservice" tabindex="-1" aria-labelledby="bookAserviceLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center gap-1">
					<h5 class="modal-title fw-bolder text-uppercase" id="bookAserviceLabel">booking</h5>
					<i class="fa-solid fa-book text-primary"></i>
				</div>
			</div>
			<div class="modal-body">
				<h4>TYPE OF AREA</h4>
                    <div class="form-check m-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"/>
                            <label class="form-check-label" for="flexCheckDefault">
                                House
                            </label>
                    </div>
                    <div class="form-check m-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"/>
                            <label class="form-check-label" for="flexCheckDefault">
                                Room
                            </label>
                    </div>        
                    <div class="form-check m-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"/>
                            <label class="form-check-label" for="flexCheckDefault">
                                Garage
                            </label>
                    </div>        
                    <div class="form-check m-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"/>
                            <label class="form-check-label" for="flexCheckDefault">
                                Garden
                            </label>
                    </div>
                    <div class="form-check m-2">        
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"/>
                            <label class="form-check-label" for="flexCheckDefault">
                                Room
                            </label>
                    </div>        
                    <div class="form-check m-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> 
                            <label class="form-check-label" for="flexCheckDefault">
                                Others
                            </label>
                    </div>

                    <div class="d-flex align-items-center gap-1">
                        <h4 class="modal-title text-uppercase" id="bookAserviceLabel">address</h4>
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
                            <input type="text" class="form-control"/>
                        </div>
                    </div>
                    

                    <div class="row d-flex justify-content-center">
                        <h4 class="text-uppercase">specification</h3>
                        <div class="col-md-5 flex-column align-items-center mt-4 mx-auto" style="height: 200px;">
                            <!-- Left content goes here -->
                            <img id="preview-image-before-upload" 
                            src="{{ asset('svg/illust/upload-photo.svg') }}"
                            alt="preview image"
                            class= "shadow-sm bg-body-tertiary rounded"
                            style="width: 100%; height: 50%;"
                            > 
                            <label for="img" class="btn btn-primary text-uppercase fw-bold p-2 mt-2" style="width:100%; margin-bottom: 10px;">Upload an image of area</label>
                        </div>
                        <div class="col-md-7 mx-auto">
                            <div class="form-group" style="margin-bottom: 10px;">
                            <label for="message">Other requests/additional details</label>
                            <textarea class="form-control" id="message" rows="3"></textarea>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                            <div class="col-md-6 mt-2">
                                <label for="text" class="form-label">Preferred Time</label>
                                <input type="text" class="form-control" id="time" style="margin-top: 0;">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="text" class="form-label">Preferred Date</label>
                                <input type="text" class="form-control" id="date" style="margin-top: 0;">
                            </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary text-uppercase fw-bold">Book</button>
			</div>
		</div>
	</div>
</div>
@endsection
