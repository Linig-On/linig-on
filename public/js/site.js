$(".nav-link.active").append("<span>");

const prevImageOnUpload = function (inputfield, imgPrevContainer) {
	$(inputfield).change(function () {
		let reader = new FileReader();
		reader.onload = (e) => {
			$(imgPrevContainer).attr("src", e.target.result);
		};
		reader.readAsDataURL(this.files[0]);
	});
};
