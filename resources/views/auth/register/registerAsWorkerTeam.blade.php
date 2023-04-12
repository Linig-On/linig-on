@extends('layouts.app') @section('content')
<div class="container">
	<nav style="--bs-breadcrumb-divider: url('{{ asset('svg/icon/breadcrumb-divider.svg') }}');" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/login" class="fw-bolder">Login</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/login/worker" class="fw-bolder">Worker</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/register/worker" class="fw-bolder">Register Worker</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Team</li>
		</ol>
	</nav>
</div>
<template reg-form>
	<div class="card shadow border border-1 rounded-5 p-0 fade-in">
		<div class="card-body p-0">
			<div class="row">
				<div class="col-md-2 ps-4 py-4">
					<div class="ps-4 py-4">
						<div class="row gap-3">
							<div class="col-12">
								<div class="d-flex flex-column gap-3">
									<img class="img-fluid" src="{{ asset('svg/illust/upload-photo.svg') }}" alt="" />
									<button class="btn btn-primary w-100 fw-bold text-uppercase">Upload photo</button>
									<button class="btn btn-secondary w-100 fw-bold text-uppercase">Upload resume</button>
								</div>
							</div>
							<div class="col-12">
								<label for="" class="small text-muted fw-bold">Gender</label>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
											<label class="form-check-label" for="flexRadioDefault1"> Male </label>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" />
											<label class="form-check-label" for="flexRadioDefault2"> Female </label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5 px-3 py-4">
					<div class="px-3 py-4">
						<h1 class="text-uppercase fw-bolder">Register as a team</h1>
						<br />
						<form action="" class="d-flex flex-column gap-3">
							<div class="row">
								<div class="col-lg-6">
									<label for="" class="fw-bold small">First Name</label>
									<input type="text" class="form-control" />
								</div>
								<div class="col-lg-6">
									<label for="" class="fw-bold small">Last Name</label>
									<input type="text" class="form-control" />
								</div>
							</div>
							<div class="row gap-3">
								<div class="col-lg-12">
									<label for="" class="fw-bold small">Contact Number</label>
									<input type="text" class="form-control" />
								</div>
								<div class="col-lg-12">
									<label for="" class="fw-bold small">Email Address</label>
									<input type="email" class="form-control" />
								</div>
								<div class="col-lg-12">
									<label for="" class="fw-bold small">Password</label>
									<input type="password" class="form-control" />
								</div>
								<div class="col-lg-12">
									<label for="" class="fw-bold small">Address</label>
									<textarea name="" cols="30" rows="10" class="form-control"></textarea>
								</div>
								<p class="small fst-italic">By registering on our website, you agree to the collection, use, and disclosure of your personal information to send you information about our services and promotions and to assist in booking our services.</p>
								<!-- TODO: show this only at the last page -->
								<div class="d-flex justify-content-between">
									<div></div>
									<button class="register-btn btn btn-primary text-uppercase fw-bold" style="display: none">Register</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="position-relative col-md-5 p-0" style="background-color: #3fd4f8">
					<img class="bottom-0 end-0 position-absolute" src="{{ asset('svg/illust/undraw-register.svg') }}" alt="" width="95%" />
				</div>
			</div>
		</div>
	</div>
</template>
<div class="container fade-in">
	<div class="row my-3">
		<div class="col">
			<label for="" class="fw-bold small">Number of Workers</label>
			<div class="d-flex gap-3">
				<input id="noOfWorker" class="form-control w-25" type="text" placeholder="00" pattern="\d*" maxlength="2" />
				<button class="btn btn-primary text-uppercase fw-bold">Enter</button>
			</div>
		</div>
	</div>
	<nav class="pagination-container">
		<button class="pagination-button" id="prevButton" aria-label="Previous page" title="Previous page">
			<i class="fa fa-solid fa-caret-left"></i>
		</button>
		<div id="paginationNumbers"></div>
		<button class="pagination-button" id="nextButton" aria-label="Next page" title="Next page">
			<i class="fa fa-solid fa-caret-right"></i>
		</button>
	</nav>
	<div id="noRegFormsState">
		<div class="d-flex justify-content-center py-5">
			<div class="d-flex flex-column text-center">
				<img src="{{ asset('svg/illust/no-data.svg') }}" alt="" width="400" />
				<div>
					<h4 class="fw-bolder text-uppercase mt-5">Register your team!</h4>
					<p class="p-0">Specify the number of workers that will be on your team to get started.</p>
				</div>
			</div>
		</div>
	</div>
	<ul id="paginatedLists" data-current-page="1" aria-live="polite"></ul>
</div>
<div class="spacer"></div>

@endsection @section('javascript')
<!-- Pagination Script -->
<script src="{{ asset('vendor/pagination/pagination.js') }}"></script>

<script type="text/javascript">
	$("#noOfWorker").change(function () {
		setTimeout(() => {
			if (!$("#paginationNumbers").is(":empty")) $("#noRegFormsState").slideUp(300);
			else $("#noRegFormsState").slideDown(300);
		}, 100);
	});
</script>
@endsection
