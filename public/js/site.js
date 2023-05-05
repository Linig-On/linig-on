$(".nav-link.active").append("<span>");

const prevImageOnUpload = function (inputfield, imgPrevContainer, defaultAvatar) {
	$(inputfield).change(function () {
		let reader = new FileReader();
		reader.onload = (e) => {
			$(imgPrevContainer).attr("src", e.target.result);
		};
		reader.readAsDataURL(this.files[0]);

		if (defaultAvatar != undefined) $(defaultAvatar).hide();
	});
};

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

const reloadDataTable = function (changes) {
	$("#activeBookingTbl").DataTable().destroy();
	if (typeof changes === "function") {
		changes();
	}
	$("#activeBookingTbl").DataTable();
};

const viewBookingDetails = function (data) {
	const booking = JSON.parse(data);

	const $status = $("#status");
	const $markDoneBtn = $("#markDoneBtn");
	const $forApprovalBtns = $("#forApprovalBtns");
	$markDoneBtn.hide();
	$forApprovalBtns.hide();
	$status.removeClass();

	// status checks
	switch (booking["status"]) {
		case "For Approval":
			$status.html(booking["status"]);
			$status.addClass("view-tag info text-primary");
			$forApprovalBtns.show();
			break;
		case "Done":
			$status.html(booking["status"]);
			$status.addClass("view-tag success text-white");
			break;
		case "Pending":
			$status.html(booking["status"]);
			$status.addClass("view-tag warning text-white");
			$markDoneBtn.show();
			break;
		case "Cancelled":
			$status.html(booking["status"]);
			$status.addClass("view-tag danger text-white");
			break;
	}

	// assign client gender
	$("#radioGenderM, #radioGenderF").removeProp("checked");
	switch (booking["client_gender"]) {
		case "M":
			$("#radioGenderM").prop("checked", "checked");
			break;
		case "F":
			$("#radioGenderF").prop("checked", "checked");
			break;
	}

	// assign client details
	$("#typeOfArea").val(booking["type_of_area"]);
	$("#firstName").val(booking["client_first_name"]);
	$("#lastName").val(booking["client_last_name"]);
	$("#emailAddress").val(booking["client_email_address"]);
	$("#contactNumber").val(booking["client_contact_number"]);

	// assign client address
	$("#address").val(booking["client_address"]);
	$("#landmarks").val(booking["landmarks"]);

	// assign client specification
	$("#message").val(booking["additional_details_requests"]);
	$("#preferredTime").val(booking["preferred_time"]);
	$("#preferredDate").val(booking["preferred_date"]);
};
