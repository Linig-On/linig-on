@extends('layouts.service', ['bi1' => 'Home', 'bi2' => 'Bookings']) @section('content')
<div class="container fade-in">
	<div id="loader" class="d-none my-4 d-flex justify-content-center gap-3 align-items-center w-100 h-100" style="z-index: 1000000">
		<i class="fw-bold">Please wait. Updating Table...</i>
		<i class="fa-solid fa-circle-notch fa-spin h4 text-primary"></i>
	</div>
	<h1 class="text-uppercase fw-bolder">Booking History</h1>
	<table id="bookingsTbl" class="table">
		<thead>
			<tr>
				<th scope="col">Booking Number</th>
				<th scope="col">Client Name</th>
				<th scope="col">Status</th>
				<th scope="col">Date Booked</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($listOfBookings as $booking)
			<tr id="bk-{{ $booking->id }}">
				<td>BK-{{ $booking->id . $booking->user_id . $booking->worker_id }}</td>
				<td>{{ $booking->client_first_name . ' ' . $booking->client_last_name }}</td>
				<td>
					@if ($booking->status == 'For Approval')
					<div class="view-tag info text-primary">{{ $booking->status }}</div>
					@endif @if ($booking->status == 'Done')
					<div class="view-tag success text-white">{{ $booking->status }}</div>
					@endif @if ($booking->status == 'Pending')
					<div class="view-tag warning text-white">{{ $booking->status }}</div>
					@endif @if ($booking->status == 'Cancelled')
					<div class="view-tag danger text-white">{{ $booking->status }}</div>
					@endif
				</td>
				<td>{{ \Carbon\Carbon::parse($booking->date_booked)->format('F j, Y') }}</td>
				<td>
					<a href="#" role="button" class="fw-bold text-decoration-underline" data-bs-toggle="modal" data-bs-target="#bookingInfoModal" onclick="setBkId('{{ $booking->id }}'); viewBookingDetails('{{ json_encode($booking) }}')">View</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Booking Info Modal -->
<div class="modal fade" id="bookingInfoModal" tabindex="-1" aria-labelledby="bookingInfoModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content position-relative overflow-hidden">
			<div class="modal-header bg-primary"></div>
			<div class="modal-body px-5 py-4 z-index-20 d-flex flex-column gap-4">
				<div class="d-flex align-items-center gap-1 mb-3">
					<h2 class="mb-0 fw-bolder text-uppercase" id="bookingInfoModalLabel">booking</h2>
					<div id="status" class="view-tag text-white"></div>
				</div>
				<section>
					<h4 class="fw-bolder text-uppercase">Client Details</h4>
					<div class="row">
						<div class="col">
							<label for="firstName" class="text-primary fw-bold small">First Name</label>
							<input id="firstName" type="text" class="form-control bg-white" disabled />
						</div>
						<div class="col">
							<label for="lastName" class="text-primary fw-bold small">Last Name</label>
							<input id="lastName" type="text" class="form-control bg-white" disabled />
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="emailAddress" class="text-primary fw-bold small">Email Address</label>
							<input id="emailAddress" type="text" class="form-control bg-white" disabled />
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="contactNumber" class="text-primary fw-bold small">Contact Number</label>
							<input id="contactNumber" type="text" class="form-control bg-white" disabled />
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label class="small text-muted fw-bold">Gender</label>
							<div class="row">
								<div class="col-2">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="gender" value="M" id="radioGenderM" />
										<label class="form-check-label" for="radioGenderM">Male</label>
									</div>
								</div>
								<div class="col-2">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="gender" value="F" id="radioGenderF" />
										<label class="form-check-label" for="radioGenderF">Female</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section>
					<h4 class="modal-title text-uppercase fw-bolder">Type of Area</h4>
					<input id="typeOfArea" class="form-control w-100" value="" />
				</section>
				<section>
					<div class="d-flex align-items-center gap-1">
						<h4 class="modal-title text-uppercase fw-bolder">address</h4>
						<i class="fa-solid fa-xl fa-location-dot text-primary"></i>
					</div>
					<div>
						<label for="address" class="text-primary fw-bold small">Home Address</label>
						<textarea id="address" class="form-control bg-white" disabled rows="3" aria-label=""></textarea>
					</div>
					<div class="my-3">
						<label for="landmarks" class="text-primary fw-bold small">Landmarks</label>
						<input id="landmarks" type="text" class="form-control bg-white" disabled />
					</div>
				</section>
				<section>
					<div class="d-flex flex-column">
						<div class="row d-flex justify-content-center">
							<h4 class="text-uppercase fw-bolder">specification</h4>
							<div class="col-md-5 flex-column align-items-center mx-auto" style="height: 200px">
								<label for="" class="fw-bold small">Image of the Area</label>
								<img id="imageOfArea" src="{{ asset('svg/illust/upload-photo.svg') }}" alt="preview image" class="shadow-sm bg-body-tertiary rounded-5 border border-1 img-fluid prev-img" style="width: 100%; height: 10rem" />
							</div>
							<div class="col-md-7 mx-auto">
								<div class="form-group">
									<label for="message" class="small fw-bold">Other requests/additional details</label>
									<textarea class="form-control bg-white" id="message" rows="3" disabled></textarea>
								</div>
								<div class="d-flex align-items-center gap-2">
									<div class="col-md-6 mt-2">
										<label for="preferredTime" class="small fw-bold">Preferred Time</label>
										<input type="time" class="form-control bg-white pe-4" id="preferredTime" disabled />
									</div>
									<div class="col-md-6 mt-2">
										<label for="preferredDate" class="small fw-bold">Preferred Date</label>
										<input type="date" class="form-control bg-white pe-4" id="preferredDate" disabled />
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="w-100 d-flex">
					<button id="closeBtn" type="button" class="btn btn-outline-primary me-auto fw-bold text-uppercase" data-bs-dismiss="modal">Close</button>
					<div class="w-mc ms-auto">
						<button id="markDoneBtn" onclick="completeBooking()" type="button" class="btn btn-success fw-bolder text-uppercase border border-1 text-primary">
							Mark as Done
							<i class="fa fa-solid fa-circle-check text-primary"></i>
						</button>
					</div>
					<div id="forApprovalBtns" class="w-mc ms-auto">
						<button id="acceptBtn" onclick="acceptBooking()" type="button" class="btn btn-success fw-bold text-uppercase border border-1 text-primary">
							Accept
							<i class="fa fa-solid fa-circle-check text-primary"></i>
						</button>
						<button id="declineBtn" onclick="declineBooking()" type="button" class="btn btn-danger fw-bold text-uppercase border border-1 text-danger text-white">
							Decline
							<i class="fa-regular fa-circle-xmark text-white"></i>
						</button>
					</div>
				</section>
			</div>
			<img class="opacity-50 position-absolute z-index-10" style="right: -2rem; top: 3rem" width="400" src="{{ asset('svg/illust/no-data.svg') }}" alt="" />
		</div>
	</div>
</div>

@endsection @section('javascript')
<script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">
	let bookingId = 0;

	$(document).ready(function () {
		$("#bookingsTbl").DataTable();
		$("#typeOfArea").tagify();
	});

	const setBkId = function (bookId) {
		bookingId = bookId;
	};

	const acceptBooking = function () {
		$.ajax({
			url: "{{ route('accept-booking') }}",
			data: {
				id: bookingId,
				_token: "{{ csrf_token() }}",
			},
			type: "POST",
			success: function (res) {
				const data = JSON.parse(res);

				$("#closeBtn").trigger("click");

				reloadDataTable(() => {
					$("#loader").removeClass("d-none");
					$(`#bk-${bookingId} [status]>div`).html("Pending").removeClass().addClass("view-tag warning text-white");
					setTimeout(() => {
						location.reload();
					}, 1000);
				});
			},
			error: function (res) {
				console.log(res);
			},
		});
	};

	const completeBooking = function () {
		$.ajax({
			url: "{{ route('complete-booking') }}",
			data: {
				id: bookingId,
				_token: "{{ csrf_token() }}",
			},
			type: "POST",
			success: function (res) {
				const data = JSON.parse(res);

				$("#closeBtn").trigger("click");

				reloadDataTable(() => {
					$("#loader").removeClass("d-none");
					$(`#bk-${bookingId}`).remove();
					setTimeout(() => {
						location.reload();
					}, 1000);
				});
			},
			error: function (res) {
				console.log(res);
			},
		});
	};

	const declineBooking = function () {
		$.ajax({
			url: "{{ route('cancel-booking') }}",
			data: {
				id: bookingId,
				_token: "{{ csrf_token() }}",
			},
			type: "POST",
			success: function (res) {
				const data = JSON.parse(res);

				$("#closeBtn").trigger("click");

				reloadDataTable(() => {
					$("#loader").removeClass("d-none");
					$(`#bk-${bookingId}`).remove();
					setTimeout(() => {
						location.reload();
					}, 1000);
				});
			},
			error: function (res) {
				console.log(res);
			},
		});
	};
</script>
@endsection
