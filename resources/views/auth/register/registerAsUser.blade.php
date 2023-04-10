@extends('layouts.app') @section('content')
<div class="container">
	<nav style="--bs-breadcrumb-divider: url('{{ asset('svg/icon/breadcrumb-divider.svg') }}');" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/login" class="fw-bolder">Login</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Register</li>
		</ol>
	</nav>
</div>
<div class="container fade-in">
	<div class="card shadow border border-1 rounded-5 p-0">
		<div class="card-body p-0">
			<form method="POST" action="/register/user" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-2 ps-4 py-4">
						<div class="ps-4 py-4">
							<div class="row gap-3">
								<div class="col-12">
									<div class="d-flex flex-column gap-3">
										<img id="previewImageBeforeUpload" class="img-fluid prev-img" src="{{ asset('svg/illust/upload-photo.svg') }}" alt="" />
										<label for="img" class="btn btn-primary text-uppercase fw-bold">Upload Photo</label>
										<input id="img" class="form-control d-none" type="file" name="img" value="{{ old('img') }}" />
									</div>
								</div>
								<div class="col-12">
									<label class="small text-muted fw-bold">Gender</label>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="gender" value="M" id="radioGender1" required {{ old("gender") == "M" ? "checked" : "" }} />
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
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5 px-3 py-4">
						<div class="px-3 py-4">
							<h1 class="text-uppercase fw-bolder">Register as a user</h1>
							<br />
							<div class="d-flex flex-column gap-3">
								<div class="row">
									<div class="col-lg-6">
										<label for="firstName" class="fw-bold small">First Name</label>
										<input id="firstName" name="first_name" type="text" class="form-control" required value="{{ old('first_name') }}" />
									</div>
									<div class="col-lg-6">
										<label for="lastName" class="fw-bold small">Last Name</label>
										<input id="lastName" name="last_name" type="text" class="form-control" required value="{{ old('last_name') }}" />
									</div>
								</div>
								<div class="row gap-3">
									<div class="col-lg-12">
										<label for="contactNo" class="fw-bold small">Contact Number</label>
										<input id="contactNo" name="contact_number" type="text" class="form-control" maxlength="11" required value="{{ old('contact_number') }}" />
									</div>
									<div class="col-lg-12">
										<label for="email" class="fw-bold small @error('email') is-invalid @enderror">Email Address</label>
										<input id="email" name="email" type="email" class="form-control" required value="{{ old('email') }}" />
									</div>
									<div class="col-lg-12">
										<label for="password" class="fw-bold small @error('password') is-invalid @enderror">Password</label>
										<input id="password" name="password" type="password" class="form-control" required value="{{ old('password') }}" />
									</div>
									<div class="col-lg-12">
										<label for="address" class="fw-bold small">Address</label>
										<textarea id="address" name="address" cols="30" rows="10" class="form-control" required>{{ old("address") }}</textarea>
									</div>
									<p class="small fst-italic">By registering on our website, you agree to the collection, use, and disclosure of your personal information to send you information about our services and promotions and to assist in booking our services.</p>
									<div class="d-flex justify-content-between">
										<div></div>
										<button type="submit" class="btn btn-primary text-uppercase fw-bold">Register</button>
									</div>
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
@endsection @section('javascript')
<script type="text/javascript">
	const prevImageOnUpload = function () {
		$("#img").change(function () {
			let reader = new FileReader();
			reader.onload = (e) => {
				$("#previewImageBeforeUpload").attr("src", e.target.result);
			};
			reader.readAsDataURL(this.files[0]);
		});
	};

	$(document).ready(function () {
		prevImageOnUpload();
	});
</script>
@endsection
