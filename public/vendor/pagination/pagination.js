let paginationNumbers;
let paginatedList;
let listItems;
let nextButton = document.getElementById("nextButton");
let prevButton = document.getElementById("prevButton");
let noOfWorker = document.getElementById("noOfWorker");

let paginationLimit;
let pageCount;
let currentPage;

const disableButton = (button) => {
	button.classList.add("disabled");
	button.setAttribute("disabled", true);
};

const enableButton = (button) => {
	button.classList.remove("disabled");
	button.removeAttribute("disabled");
};

const handlePageButtonsStatus = () => {
	if (currentPage === 1) {
		disableButton(prevButton);
	} else {
		enableButton(prevButton);
	}

	if (pageCount === currentPage) {
		disableButton(nextButton);
	} else {
		enableButton(nextButton);
	}
};

const handleActivePageNumber = () => {
	document.querySelectorAll(".pagination-number").forEach((button) => {
		button.classList.remove("active");
		const pageIndex = Number(button.getAttribute("page-index"));
		if (pageIndex == currentPage) {
			button.classList.add("active");
		}
	});
};

const appendPageNumber = (index) => {
	const pageNumber = document.createElement("button");
	pageNumber.className = "pagination-number";
	pageNumber.innerHTML = index;
	pageNumber.setAttribute("page-index", index);
	pageNumber.setAttribute("aria-label", "Page " + index);

	paginationNumbers.appendChild(pageNumber);
};

const getPaginationNumbers = () => {
	for (let i = 1; i <= pageCount; i++) {
		appendPageNumber(i);
	}
};

const setCurrentPage = (pageNum) => {
	currentPage = pageNum;

	handleActivePageNumber();
	handlePageButtonsStatus();

	const prevRange = (pageNum - 1) * paginationLimit;
	const currRange = pageNum * paginationLimit;

	listItems.forEach((item, index) => {
		item.classList.add("hidden");
		if (index >= prevRange && index < currRange) {
			item.classList.remove("hidden");
		}
	});
};

noOfWorker.addEventListener("change", () => {
	// region new
	$("#paginatedLists, #paginationNumbers").empty();

	let value = parseInt(noOfWorker.value);

	for (let i = 0; i < value; i++) {
		let html = $(`[reg-form]`)[0].content.cloneNode(true).children[0];
		let h4 = html.querySelectorAll("h4");
		$(h4).html(`Registration ${i + 1}`);

		const li = $("<li>").html(html);
		$("#paginatedLists").append(li);
	}
	// endregion

	paginationNumbers = document.getElementById("paginationNumbers");
	paginatedList = document.getElementById("paginatedLists");
	listItems = paginatedList.querySelectorAll("li");

	paginationLimit = 1;
	pageCount = Math.ceil(listItems.length / paginationLimit);
	currentPage = 1;

	getPaginationNumbers();
	setCurrentPage(1);

	const paginationNumber = document.querySelectorAll(".pagination-number");
	paginationNumber.forEach((button) => {
		const pageIndex = Number(button.getAttribute("page-index"));
		if (pageIndex) {
			button.addEventListener("click", () => {
				setCurrentPage(pageIndex);

				// region new
				// if its at the last page
				if (currentPage === pageCount) {
					$(".register-btn").show();
				} else {
					$(".register-btn").hide();
				}
				// endregion
			});
		}
	});
});

prevButton.addEventListener("click", () => {
	if (listItems != undefined) setCurrentPage(currentPage - 1);
});
nextButton.addEventListener("click", () => {
	if (listItems != undefined) setCurrentPage(currentPage + 1);

	// region new
	// if its at the last page
	if (currentPage === pageCount) {
		$(".register-btn").show();
	} else {
		$(".register-btn").hide();
	}
	// endregion
});
