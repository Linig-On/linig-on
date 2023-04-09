@extends('layouts.app') @section('content')
<div class="container fade-in">
	<div class="card shadow border border-1 rounded-5 p-5">
		<div class="card-body px-5 py-4">
			<div class="row px-5 py-4">
				<div class="col-md-6">
					<h1 class="text-uppercase fw-bolder">Login</h1>
					<br />
					<div class="d-flex flex-column gap-3">
						<div class="d-flex align-items-center gap-3 col-9">
							<div class="col-1">
								<i class="fa-solid fa-user h3"></i>
							</div>
							<a href="/login/user" role="button" class="w-100 btn btn-primary btn-lg text-uppercase text-decoration-none fw-bold">Login as user</a>
						</div>
						<div class="d-flex align-items-center gap-3 col-9">
							<div class="col-1">
								<i class="fa-solid fa-gear h3"></i>
							</div>
							<a href="/login/worker" role="button" class="w-100 btn btn-secondary btn-lg text-uppercase text-decoration-none fw-bold">Login as worker</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 d-flex justify-content-center flex-column gap-3">
					<div class="text-center">
						<img src="{{ asset('svg/illust/undraw-login.svg') }}" alt="" width="500" />
					</div>
					<h5 class="text-uppercase fw-bolder">LINIG-ON, YOUR TRUSTED HOME SERVICE APPLICATION</h5>
					<p>Our team provides janitorial services that is easily available within your fingertips, forget the hassle of doing everything by yourself. Sign up now!</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
