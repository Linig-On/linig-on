@extends('layouts.error') @section('content')
<div class="container d-flex min-vh-100 align-items-center">
	<div class="card shadow border border-1 rounded-5 py-4 px-5">
		<div class="card-body p-5 text-center d-flex flex-column justif-content-center gap-3">
			<i class="fa-solid fa-circle-check display-1 text-success"></i>
			<div class="mt-3">
				<h1 class="fw-bolder text-uppercase display-5">
					Your Request for Registration <br />
					is on for Approval!
				</h1>
				<p class="">Thank you for your sign up! Expect a response from us on your email within this week for your approval. In the meantime, feel free to visit our site!</p>
				<a role="button" href="/" class="btn btn-outline-secondary rounded-pill text-uppercase text-decoration-none fw-bold">Back to Home</a>
			</div>
		</div>
	</div>
</div>
@endsection
