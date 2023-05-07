<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>CONTACT US</title>
		<style>
			.p-5 {
				padding: 1.5rem;
			}
			.d-flex {
				display: flex;
			}
			.gap-3 {
				gap: 1rem;
			}
			.text-end {
				text-align: right;
			}
		</style>
	</head>
	<body class="p-5 d-flex gap-3">
		<div>
			<img src="https://i.imgur.com/e7YNx0i.png" alt="Linig-On Logo" style="display: block; max-width: 20%" />
			<hr />
			<p><b>Name:</b> {{ $data["name"] }}</p>
			<p><b>Email Address:</b> {{ $data["email"] }}</p>
			<p><b>Message:</b> {{ $data["message"] }}</p>
			<p class="text-end">Thanks,</p>
			<p class="text-end">
				<i>{{ $data["name"] }}</i>
			</p>
		</div>
	</body>
</html>
