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
			<li class="breadcrumb-item active" aria-current="page">Register</li>
		</ol>
	</nav>
</div>
<div class="container fade-in">
	<div class="card shadow border border-1 rounded-5 p-5">
		<div class="card-body px-5 py-4">
			<div class="row px-5 py-4">
				<div class="col-md-6">
					<h1 class="text-uppercase fw-bolder">Register as a worker</h1>
					<label for="" class="small text-muted fw-bold mb-3">Type of Worker</label>
					<div class="d-flex flex-column gap-3">
						<div class="d-flex align-items-center gap-3 col-9">
							<div class="col-1">
								<i class="fa-solid fa-user h3 mb-0"></i>
							</div>
							<a href="/register/worker/individual" role="button" class="w-100 btn btn-primary btn-lg text-uppercase text-decoration-none fw-bold">Individual</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 d-flex justify-content-center flex-column gap-3">
					<div class="text-center">
						<img src="{{ asset('svg/illust/freepik-login.svg') }}" alt="" width="500" />
					</div>
					<h5 class="text-uppercase fw-bolder">LINIG-ON, YOUR TRUSTED HOME SERVICE APPLICATION</h5>
					<p>Our team provides janitorial services that is easily available within your fingertips, forget the hassle of doing everything by yourself. Sign up now!</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
