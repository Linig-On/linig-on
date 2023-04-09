@extends('layouts.error') @section('content')
<div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
	<div class="text-center">
		<h1 class="display-1 fw-bolder text-uppercase">Oops!</h1>
		<p class="">We currently don’t have what you’re looking for.</p>
		<a role="button" href="/" class="btn btn-outline-secondary rounded-pill text-uppercase text-decoration-none fw-bold">Back to Home</a>
	</div>
	<img src="{{ asset('svg/illust/freepik-404.svg') }}" alt="" />
</div>
@endsection
