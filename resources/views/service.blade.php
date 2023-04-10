@extends('layouts.app') @section('content')
<div class="container mt-5">
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
								<li><a class="dropdown-item" href="#">All</a></li>
								<li><a class="dropdown-item" href="#">Top Rated</a></li>
								<li><a class="dropdown-item" href="#">Menu item</a></li>
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
								<li><a class="dropdown-item" href="#">Solo</a></li>
								<li><a class="dropdown-item" href="#">Team</a></li>
							</ul>
						</div>
					</div>
					<div class="col-3">
						<label class="fw-bold small" for="">Barangay:</label>
						<div class="dropdown-group">
							<div class="form-control-icon-end">
								<input type="text" class="form-control dropdown-toggle cursor-pointer" type="button" placeholder="--" readonly data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false" />
								<i class="fa fa-solid fa-angle-down"></i>
							</div>
							<ul class="dropdown-menu" aria-labelledby="defaultDropdown">
								<li><a class="dropdown-item" href="#">Menu item</a></li>
								<li><a class="dropdown-item" href="#">Menu item</a></li>
								<li><a class="dropdown-item" href="#">Menu item</a></li>
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
<script type="text/javascript">
	$(".dropdown-toggle").click(function () {
		var $dropdownMenu = $(this).closest(".dropdown-group").find(".dropdown-menu");
		$dropdownMenu.show();

		$(document).mousedown(function (event) {
			var container = $(".dropdown-menu")[0];
			if (!container.contains(event.target)) {
				$dropdownMenu.hide();
			}
		});
	});
</script>
@endsection
