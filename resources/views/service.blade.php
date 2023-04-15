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
	</form>
</div>
@endsection @section('javascript')
<script src="{{ asset('js/input-dropdown.js') }}"></script>
@endsection
