@extends('layouts.app') @section('content')
<div class="container fade-in mt-5">
	<form method="GET" action="{{ route('service-filter') }}" class="d-flex flex-column gap-3">
		<div class="form-control-icon-start">
			<i class="fa fa-solid fa-search text-muted"></i>
			<input id="searchWorker" type="text" class="form-control ps-5" placeholder="Search Worker" />
		</div>
		<div class="row justify-content-between">
			<div class="col">
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<label class="fw-bold small" for="">Sort By:</label>
						<div class="dropdown-group">
							<div class="form-control-icon-end">
								<input id="sortBy" name="sort_by" type="text" class="form-control cursor-pointer dropdown-toggle" type="button" value="All" readonly aria-expanded="false" />
								<i class="fa fa-solid fa-angle-down"></i>
							</div>
							<ul class="dropdown-menu" aria-labelledby="defaultDropdown">
								<li><a class="dropdown-item cursor-pointer" value="All">All</a></li>
								<li><a class="dropdown-item cursor-pointer" value="Top Rated">Top Rated</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
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
			<div class="col-md-2">
				<div class="row">
					<button type="submit" class="btn btn-primary mt-4 text-uppercase fw-bold">Filter</button>
				</div>
			</div>
		</div>
		<section>
			<ul id="paginatedList" data-current-page="1" aria-live="polite">
				@foreach($listOfWorkers as $worker)
				<li>
					<div class="card shadow border border-1 mb-4">
						<div class="card-body px-4 py-3">
							<div class="row">
								<div class="col-md-10">
									<div class="d-flex gap-3">
										<div class="d-flex justify-content-center">
											<div style="width: 7rem; height: 7rem">
												<div class="avatar w-100 h-100">
													@if ($worker['image_url'] != null)
													<img class="rounded-circle w-100 h-100" src="{{ asset('img/profile') . '/' . $worker['image_url'] }}" />
													@else
													<div class="avatar w-100 h-100 rounded-circle bg-secondary text-white fw-bold">{{ $worker["first_name"][0] }}</div>
													@endif
												</div>
											</div>
										</div>
										<div class="d-flex flex-column">
											<h2 worker-name class="fw-bolder text-primary">{{ $worker["first_name"] . " " . $worker["last_name"] }}</h2>
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
										<a href="{{ route('service-worker-profile', ['id' => $worker['worker_id'] ]) }}" role="button" class="btn btn-primary mt-4 text-uppercase fw-bold text-decoration-none">See More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
				@endforeach
			</ul>
		</section>
	</form>
	<nav class="pagination-container">
		<button type="button" class="pagination-button btn btn-primary text-white text-uppercase fw-bold px-4" id="prevButton" aria-label="Previous page" title="Previous page">Previous</button>
		<div id="paginationNumbers"></div>
		<button type="button" class="pagination-button btn btn-primary text-white text-uppercase fw-bold px-4" id="nextButton" aria-label="Next page" title="Next page">Next</button>
	</nav>
</div>
<div class="spacer"></div>
@endsection @section('javascript')
<script src="{{ asset('js/input-dropdown.js') }}"></script>
<!-- Pagination Script -->
<script src="{{ asset('vendor/pagination/pagination.js') }}"></script>
<script type="text/javascript">
	// NOTE: this shi- is confusing to read
	// NOTE: basically it waits for a few ms before adding the fade-in class
	$(document).ready(function () {
		initPagination();
	});

	const model = {!! json_encode($listOfWorkers) !!};
	let workerNames = [];

	model.forEach(element => {
		let fullName = `${element.first_name} ${element.last_name}`;
		workerNames.push(fullName);
	});

	$("#searchWorker").keyup(function (el) {
		const searchTerm = $(this).val().toLowerCase();

		// Filter the list based on the search term
		const filteredList = workerNames.filter(function(item) {
	    	return item.toLowerCase().indexOf(searchTerm) > -1;
	   	});

		console.log(filteredList);

		$("#paginatedList h2[worker-name]").each(function (i, el) {

			if ($(el).text().toLowerCase().indexOf(searchTerm) > -1) {
				$(this).closest("li").removeClass("hidden").addClass("fade-in");
			}
			else {
				$(this).closest("li").removeClass("fade-in").addClass("hidden");
			}
		});


		if ($(this).val().length == 0)
			$("#paginatedList li").slice(3).addClass("hidden");
	});

	const assignSortBy = function (element) {
		$("#sortBy").val(`${$(element).attr("value")}`);
	}
</script>
@endsection
