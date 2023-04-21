@extends('layouts.app') @section('content')
<div class="container fade-in mt-5">
	<form action="" class="d-flex flex-column gap-3">
		<div class="form-control-icon-start">
			<i class="fa fa-solid fa-search text-muted"></i>
			<input type="text" class="form-control ps-5" placeholder="Search Worker" />
		</div>
		<div class="row justify-content-between">
			<div class="col">
				<div class="row">
					<div class="col-3">
						<label class="fw-bold small" for="">Sort By:</label>
						<div class="dropdown-group">
							<div class="form-control-icon-end">
								<input type="text" class="form-control dropdown-toggle cursor-pointer" type="button" value="Relevance" readonly data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false" />
								<i class="fa fa-solid fa-angle-down"></i>
							</div>
							<ul class="dropdown-menu" aria-labelledby="defaultDropdown">
								<li><a class="dropdown-item cursor-pointer" value="All">All</a></li>
								<li><a class="dropdown-item cursor-pointer" value="Top Rated">Top Rated</a></li>
								<li><a class="dropdown-item cursor-pointer" value="Menu item">Menu item</a></li>
							</ul>
						</div>
					</div>
					<div class="col-3">
						<label class="fw-bold small" for="">Worker Type:</label>
						<div class="dropdown-group">
							<div class="form-control-icon-end">
								<input type="text" class="form-control dropdown-toggle cursor-pointer" type="button" value="Solo" readonly data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false" />
								<i class="fa fa-solid fa-angle-down"></i>
							</div>
							<ul class="dropdown-menu" aria-labelledby="defaultDropdown">
								<li><a class="dropdown-item cursor-pointer" value="Solo">Solo</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-2">
				<div class="row">
					<button type="button" class="btn btn-primary mt-4 text-uppercase fw-bold">Filter</button>
				</div>
			</div>
		</div>
		<div id="worker-card">
			<div id="row">
				@foreach($listOfWorkers as $worker)
				<div id="workerbox" class="col-md-12">
					<div class="card shadow border border-1 mb-4">
						<div class="card-body px-4 py-3">
							<div class="row">
								<div class="col-md-10">
									<div class="d-flex gap-3">
										<div class="d-flex justify-content-center">
											<div style="width: 7rem; height: 7rem">
												<div class="avatar w-100 h-100">
													@if ($worker['image_url'] != null)
													<img class="rounded-circle" src="{{ asset('img/profile') . '/' . $worker['image_url'] }}" />
													@else
													<div class="avatar w-100 h-100 rounded-circle bg-secondary text-white fw-bold">{{ $worker["first_name"][0] }}</div>
													@endif
												</div>
											</div>
										</div>
										<div class="d-flex flex-column">
											<h2 class="fw-bolder text-primary">{{ $worker["first_name"] . " " . $worker["last_name"] }}</h2>
											<tag-container>
												@foreach($worker['skills'] as $sk)
												<div class="view-tag">{{ $sk->skill }}</div>
												@endforeach
											</tag-container>
											<p class="mt-4">{{ $worker["short_bio"] }}</p>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="d-flex justify-content-between">
										<div></div>
										<a href="{{ route('services-worker-profile', ['id' => $worker['worker_id'] ]) }}" role="button" class="btn btn-primary mt-4 text-uppercase fw-bold text-decoration-none">See More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</form>
</div>
@endsection @section('javascript')
<script src="{{ asset('js/input-dropdown.js') }}"></script>
@endsection
