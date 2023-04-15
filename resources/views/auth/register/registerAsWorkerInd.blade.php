@extends('layouts.app') @section('content')
<div class="container mt-3">
	<nav style="--bs-breadcrumb-divider: url('{{ asset('svg/icon/breadcrumb-divider.svg') }}');" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/login" class="fw-bolder">Login</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/login/worker" class="fw-bolder">Worker</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/register/worker" class="fw-bolder">Register</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Solo</li>
		</ol>
	</nav>
</div>
<div class="container fade-in">
	@error("msg")
	<div class="alert alert-danger mb-3 d-flex gap-3 align-items-center" role="alert">
		<i class="fa-solid fa-circle-info text-danger"></i>
		<small class="text-danger fw-semibold">{{ $message }}</small>
	</div>
	@enderror
	<div class="card shadow border border-1 rounded-5 p-0">
		<div class="card-body p-0">
			<form method="POST" action="{{ route('register-worker-individual') }}" enctype="multipart/form-data" class="d-flex flex-column gap-3">
				@csrf
				<div class="row">
					<div class="col-md-2 ps-4 py-4">
						<div class="ps-4 py-4">
							<div class="row gap-3">
								<div class="col-12">
									<div class="d-flex flex-column gap-3">
										<img id="previewImageBeforeUpload" class="img-fluid prev-img" src="{{ asset('svg/illust/upload-photo.svg') }}" alt="" />
										<label for="img" class="btn btn-primary text-uppercase fw-bold">Upload Photo</label>
										<input id="img" class="form-control d-none" type="file" name="img" value="{{ old('img') }}" accept="image/png, image/gif, image/jpeg" />
									</div>
								</div>
								<div class="col-12">
									<div class="d-flex flex-column gap-3">
										<label for="resume" class="btn btn-secondary text-uppercase fw-bold">Upload Resume</label>
										<input id="resume" class="form-control d-none" type="file" name="resume" value="{{ old('resume') }}" accept="application/pdf,application/vnd.ms-excel" />
										<label id="resumeFilePreview" class="small fst-italic"></label>
										@error('resume')
										<span class="invalid-feedback" role="alert">
											<strong class="small text-danger">A resume is required.</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-12">
									<label class="small text-muted fw-bold">Gender</label>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gender" value="M" id="radioGender1" {{ old("gender") == "M" ? "checked" : "" }} required />
												<label class="form-check-label" for="radioGender1">Male</label>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gender" value="F" id="radioGender2" {{ old("gender") == "F" ? "checked" : "" }} />
												<label class="form-check-label" for="radioGender2">Female</label>
											</div>
										</div>
									</div>
									@error('gender')
									<span class="invalid-feedback" role="alert">
										<strong class="small text-danger">Select a gender.</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5 px-3 py-4">
						<div class="px-3 py-4">
							<h1 class="text-uppercase fw-bolder">Register as a solo worker</h1>
							<br />

							<div class="row">
								<div class="col-lg-6">
									<label for="firstName" class="fw-bold small">First Name</label>
									<input id="firstName" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" />
									@error('first_name')
									<span class="invalid-feedback" role="alert">
										<strong class="small text-danger">Invalid name.</strong>
									</span>
									@enderror
								</div>
								<div class="col-lg-6">
									<label for="lastName" class="fw-bold small">Last Name</label>
									<input id="lastName" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" />
									@error('last_name')
									<span class="invalid-feedback" role="alert">
										<strong class="small text-danger">Invalid name.</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="row gap-3">
								<div class="col-lg-12">
									<label for="contactNo" class="fw-bold small">Contact Number</label>
									<input id="contactNo" name="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" maxlength="11" value="{{ old('contact_number') }}" />
									@error('contact_number')
									<span class="invalid-feedback" role="alert">
										<strong class="small text-danger">Invalid contact number. A contact number must have at least 8 characters.</strong>
									</span>
									@enderror
								</div>
								<div class="col-lg-12">
									<label for="email" class="fw-bold small">Email Address</label>
									<input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />
									@error('email')
									<span class="invalid-feedback" role="alert">
										<strong class="small text-danger">Invalid email address.</strong>
									</span>
									@enderror
								</div>
								<div class="col-lg-12">
									<label for="password" class="fw-bold small">Password</label>
									<input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" />
									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong class="small text-danger">Invalid password. Use a password minimum of 8 characters.</strong>
									</span>
									@enderror
								</div>
								<div class="col-lg-12">
									<label for="address" class="fw-bold small">Address</label>
									<textarea id="address" name="address" cols="30" rows="10" class="form-control @error('address') is-invalid @enderror">{{ old("address") }}</textarea>
									@error('address')
									<span class="invalid-feedback" role="alert">
										<strong class="small text-danger">Invalid address. An address is required.</strong>
									</span>
									@enderror
								</div>
								<p class="small fst-italic">By registering on our website, you agree to the collection, use, and disclosure of your personal information to send you information about our services and promotions and to assist in booking our services.</p>
								<div class="d-flex justify-content-between">
									<div></div>
									<button type="submit" class="btn btn-primary text-uppercase fw-bold">Register</button>
								</div>
							</div>
						</div>
					</div>
					<div class="position-relative col-md-5 p-0" style="background-color: #3fd4f8">
						<img class="bottom-0 end-0 position-absolute" src="{{ asset('svg/illust/undraw-register.svg') }}" alt="" width="95%" />
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="spacer"></div>
@endsection @section('javascript')
<script type="text/javascript">
	$(document).ready(function () {
		prevImageOnUpload("#img", "#previewImageBeforeUpload");

		$("#resume").change(function (e) {
			const filename = e.target.files[0].name;
			$("#resumeFilePreview").html(filename);
		});
	});
</script>
@endsection
