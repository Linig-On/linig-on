@extends('layouts.service', ['bi1' => 'Home', 'bi2' => 'My Profile']) @section('content')
<div class="container fade-in">
	<h1 class="text-uppercase fw-bolder mb-5">My profile</h1>
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="row gx-4">
			<div class="col-md-3 d-flex flex-column gap-3">
				<div class="w-100 d-flex justify-content-center">
					<div style="width: 10rem; height: 10rem">
						<div class="avatar w-100 h-100">
							@if (Auth::user()->image_url != null)
							<img class="rounded-circle" src="{{ asset('img/profile') . '/' . Auth::user()->image_url }}" />
							@else
							<div class="avatar w-100 h-100 rounded-circle bg-secondary text-white fw-bold">{{ Auth::user()->first_name[0] }}</div>
							@endif
						</div>
					</div>
				</div>
				<label for="img" class="btn btn-primary text-uppercase fw-bold">Upload Photo</label>
				<input id="img" class="form-control d-none" type="file" name="img" accept="image/png, image/gif, image/jpeg" />
				<div class="d-flex flex-column">
					<i class="fa-solid fa-quote-left h1 mb-0 text-primary"></i>
					<label for="shortBio" class="text-primary fw-bold small">Short Bio</label>
					<textarea class="form-control" name="" id="" cols="30" rows="8">{{ DB::table('workers')->where('user_id', Auth::user()->id)->first()->short_bio }}</textarea>
				</div>
				<hr />
				<div>
					<h5 class="fw-bolder">Skills</h5>
					<input
						id="skills"
						name="skills"
						placeholder="Enter Skills"
						class="form-control w-100"
						value="
						@foreach($workerSkills as $i) 
							{{ $i->skill }}
							@if(!$loop->last)
								,
							@endif  
						@endforeach"
					/>
				</div>
				<div>
					<h5 class="fw-bolder">Socials</h5>
					<input
						id="socials"
						name="socials"
						placeholder="Enter Socials"
						class="form-control w-100"
						value="
						@foreach($workerSocials as $i) 
							{{ $i->social }}
							@if(!$loop->last)
								,
							@endif  
						@endforeach"
					/>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card border border-1 shadow overflow-hidden">
					<div class="card-body p-5">
						<div class="d-flex flex-column gap-3">
							<div class="row">
								<div class="col-md-2 d-flex flex-row gap-3 align-items-center">
									<i class="fa fa-solid fa-user"></i>
									<label for="" class="text-primary text-nowrap fw-bold small">Full Name</label>
								</div>
								<div class="col-md-8 z-index-30">
									<input type="text" class="form-control" value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}" />
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 d-flex flex-row gap-3 align-items-center">
									<i class="fa fa-solid fa-phone"></i>
									<label for="" class="text-primary text-nowrap fw-bold small">Mobile</label>
								</div>
								<div class="col-md-8 z-index-30">
									<input type="text" class="form-control" value="{{ Auth::user()->contact_number }}" />
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 d-flex flex-row gap-3">
									<i class="fa fa-solid fa-location-dot"></i>
									<label for="" class="text-primary text-nowrap fw-bold small">Address</label>
								</div>
								<div class="col-md-8 z-index-30">
									<textarea name="" id="" cols="30" rows="5" class="form-control">{{ Auth::user()->address }}</textarea>
								</div>
							</div>
							<div class="d-flex justify-content-between">
								<div></div>
								<button type="button" class="btn btn-primary text-uppercase fw-bold z-index-30" data-bs-toggle="modal" data-bs-target="#viewResumeModal">
									View Resume
									<i class="fa-regular fa-file text-white"></i>
								</button>
							</div>
						</div>
					</div>
					<img class="opacity-25 position-absolute z-index-10" src="{{ asset('svg/illust/no-data.svg') }}" alt="" style="right: -2rem; bottom: -2rem" />
				</div>
				<div class="mt-5">
					<h5 class="fw-bolder">About Me</h5>
					<textarea id="serviceInfo" class="content" name="">{{ DB::table('workers')->where('user_id', Auth::user()->id)->first()->service_info }}</textarea>
				</div>
				<div class="d-flex justify-content-between mt-3">
					<div></div>
					<button class="btn btn-primary text-uppercase fw-bold">Update</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- Modal -->
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
				<embed src="{{ asset('resume/approved/' . DB::table('workers')->where('user_id', Auth::user()->id)->first()->resume_url) }}" width="100%" style="min-height: 75vh" />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@endsection @section('javascript')
<script type="text/javascript">
	let config = {
		bold: true,
		italic: true,
		underline: true,
		leftAlign: true,
		centerAlign: true,
		rightAlign: true,
		justify: true,
		ol: true,
		ul: true,
		heading: true,
		fonts: true,
		fontList: false,
		fontColor: false,
		fontSize: true,
		imageUpload: false,
		fileUpload: false,
		Embed: false,
		urls: false,
		table: true,
		removeStyles: false,
		code: false,
		videoEmbed: false,
		backgroundColor: false,
	};

	$(document).ready(function () {
		var skillsTag = $("[name='skills']").tagify();
		let $socialsTag = $("#socials").tagify();

		$("#serviceInfo").richText(config);
	});
</script>
@endsection
