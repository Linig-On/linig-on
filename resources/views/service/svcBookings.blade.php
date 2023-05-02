@extends('layouts.service', ['bi1' => 'Home', 'bi2' => 'Bookings']) @section('content')
<div class="container fade-in">
	<h1 class="text-uppercase fw-bolder">Booking History</h1>
	<table id="bookingsTbl" class="table">
		<thead>
			<tr>
				<th scope="col">Client Name</th>
				<th scope="col">Status</th>
				<th scope="col">Date Booked</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($listOfBookings as $booking)
			<tr>
				<td>{{ $booking->client_first_name . ' ' . $booking->client_last_name }}</td>
				<td>
					@if ($booking->status == 'Done')
					<div class="view-tag bg-success text-white">{{ $booking->status }}</div>
					@endif @if ($booking->status == 'Pending')
					<div class="view-tag bg-warning text-white">{{ $booking->status }}</div>
					@endif @if ($booking->status == 'Cancelled')
					<div class="view-tag bg-danger text-white">{{ $booking->status }}</div>
					@endif
				</td>
				<td>{{ \Carbon\Carbon::parse($booking->date_booked)->format('F j, Y') }}</td>
				<td>
					<a href="#" role="button" class="fw-bold text-decoration-underline" data-bs-toggle="modal" data-bs-target="#bookingInfoModal" onclick="viewBookingDetails('{{ json_encode($booking) }}')">View</a>
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
					<div class="w-mc ms-auto">
						<button type="button" class="btn btn-outline-primary fw-bold text-uppercase" data-bs-dismiss="modal">Close</button>
					</div>
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
				<input id="typeOfArea" class="form-control w-100" value="" />
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
					<div class="d-flex flex-column mb-5">
						<div class="row d-flex justify-content-center">
							<h4 class="text-uppercase fw-bolder">specification</h4>
							<div class="col-md-5 flex-column align-items-center mx-auto" style="height: 200px">
								<label for="" class="fw-bold small">Image of the Area</label>
								<img id="previewImageBeforeUpload" src="{{ asset('svg/illust/upload-photo.svg') }}" alt="preview image" class="shadow-sm bg-body-tertiary rounded-5 border border-1 img-fluid prev-img" style="width: 100%; height: 10rem" />
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
			</div>
			<img class="opacity-50 position-absolute z-index-10" style="right: -2rem; top: 3rem" width="400" src="{{ asset('svg/illust/no-data.svg') }}" alt="" />
		</div>
	</div>
</div>

@endsection @section('javascript')
<script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#bookingsTbl").DataTable();
		$("#typeOfArea").tagify();
	});

	const viewBookingDetails = function (data) {
		const booking = JSON.parse(data);

		console.log(booking);

		const $status = $("#status");
		$status.removeClass();

		switch (booking["status"]) {
			case "Done":
				$status.html(booking["status"]);
				$status.addClass("view-tag bg-success text-white");
				break;
			case "Pending":
				$status.html(booking["status"]);
				$status.addClass("view-tag bg-warning text-white");
				break;
			case "Cancelled":
				$status.html(booking["status"]);
				$status.addClass("view-tag bg-danger text-white");
				break;
		}

		$("#radioGenderM, #radioGenderF").removeProp("checked");
		switch (booking["client_gender"]) {
			case "M":
				$("#radioGenderM").prop("checked", "checked");
				break;
			case "F":
				$("#radioGenderF").prop("checked", "checked");
				break;
		}

		$("#typeOfArea").val(booking["type_of_area"]);
		$("#firstName").val(booking["client_first_name"]);
		$("#lastName").val(booking["client_last_name"]);
		$("#emailAddress").val(booking["client_email_address"]);
		$("#contactNumber").val(booking["client_contact_number"]);

		$("#address").val(booking["client_address"]);
		$("#landmarks").val(booking["landmarks"]);
		$("#message").val(booking["additional_details_requests"]);
		$("#preferredTime").val(booking["preferred_time"]);
		$("#preferredDate").val(booking["preferred_date"]);
	};
</script>
@endsection