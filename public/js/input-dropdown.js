$(".dropdown-toggle").click(function () {
	const $dropdownMenu = $(this).closest(".dropdown-group").find(".dropdown-menu");
	const $dropdownItem = $(this).closest(".dropdown-group").find(".dropdown-menu .dropdown-item");
	const $input = $(this).closest(".dropdown-group").find("input.form-control");

	$dropdownMenu.show();

	$($dropdownItem).each(function (i, el) {
		$(el).click(function () {
			$dropdownMenu.hide();
			$input.val($(el).attr("value"));
		});
	});

	$(document).mousedown(function (event) {
		if (!$dropdownMenu[0].contains(event.target)) {
			$dropdownMenu.hide();
		}
	});
});
