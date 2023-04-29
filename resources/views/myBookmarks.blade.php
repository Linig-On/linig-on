@extends('layouts.app') @section('content')
<div class="container w-50 fade-in">
	<h1 class="fw-bolder text-uppercase mt-5">Bookmarks</h1>
	<hr class="py-3" />
	<ul id="paginatedList" data-current-page="1" aria-live="polite">
		@foreach ($userBookmarks as $bookmark)
		<li>
			<div class="card shadow border border-1 mb-4">
				<div class="card-body px-4 py-3">
					<div class="row">
						<div class="col-md-12">
							<div class="d-flex gap-3">
								<div class="d-flex justify-content-center">
									<div style="width: 5rem; height: 5rem">
										<div class="avatar w-100 h-100">
											@if ($bookmark['image_url'] != null)
											<img class="mt-4 rounded-circle w-100 h-100" src="{{ asset('img/profile') . '/' . $bookmark['image_url'] }}" />
											@else
											<div class="mt-4 avatar w-100 h-100 rounded-circle bg-secondary text-white fw-bold">{{ $bookmark["worker_name"][0] }}</div>
											@endif
										</div>
									</div>
								</div>
								<div class="d-flex flex-column">
									<h2 class="mt-3 fw-bolder text-primary">{{ $bookmark["worker_name"] }}</h2>
									<p>{{ Str::limit($bookmark['short_bio'], $limit = 200, $end = '...') }}</p>
								</div>
							</div>
							<div class="w-100">
								<div class="ms-auto w-mc d-flex gap-3">
									<a class="small text-primary fw-bold text-decoration-underline" href="{{ route('service-worker-profile', ['id' => $bookmark['worker_id']]) }}">View</a>
									<a class="small text-danger fw-bold text-decoration-underline cursor-pointer" onclick="unBookmarkWorker(this, `{{ $bookmark['worker_id'] }}`)">Delete</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</li>
		@endforeach
	</ul>
	<nav class="pagination-container">
		<button type="button" class="pagination-button btn btn-primary text-white text-uppercase fw-bold px-4" id="prevButton" aria-label="Previous page" title="Previous page">Previous</button>
		<div id="paginationNumbers"></div>
		<button type="button" class="pagination-button btn btn-primary text-white text-uppercase fw-bold px-4" id="nextButton" aria-label="Next page" title="Next page">Next</button>
	</nav>
</div>
@endsection @section('javascript')
<!-- Pagination Script -->
<script src="{{ asset('vendor/pagination/pagination.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function () {
		initPagination();
	});

	const initPagination = function () {
		setTimeout(() => {
			animateList();

			$("#nextButton, #prevButton").click(function () {
				setTimeout(() => {
					$("#paginatedList li").removeClass("fade-in");
					animateList();
				}, 100);
			});
		}, 100);
	};

	const animateList = function () {
		$("#paginatedList li:not(.hidden)").each(function (i, el) {
			setTimeout(function () {
				$(el).addClass("fade-in");
			}, i * 150);
		});
	};

	const unBookmarkWorker = function (element, workerId) {
		$.ajax({
			url: "{{ route('un-bookmark-worker') }}",
			data: {
				id: parseInt(workerId),
				_token: "{{ csrf_token() }}",
			},
			type: "POST",
			success: function (res) {
				$(element).closest("li").remove();
			},
		});
	};
</script>
@endsection
