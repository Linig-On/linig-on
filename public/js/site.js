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
