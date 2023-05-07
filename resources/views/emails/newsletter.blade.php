<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>NEWSLETTER</title>
		<style>
			body {
				font-family: Arial, sans-serif;
				font-size: 16px;
				line-height: 1.5;
				color: #333;
				margin: 0;
				padding: 0;
			}

			.container {
				max-width: 600px;
				margin: 0 auto;
				padding: 20px;
				background-color: #f9f9f9;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			}

			h1 {
				font-size: 24px;
				font-weight: bold;
				color: #333;
				margin: 0 0 20px;
				padding: 0;
			}

			p {
				margin: 0 0 20px;
				padding: 0;
			}

			a {
				color: #007bff;
				text-decoration: none;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<img src="https://i.imgur.com/e7YNx0i.png" alt="Linig-On Logo" style="display: block; max-width: 50%; margin: 0 auto" />
			<h1>Thanks for subscribing to Linig-on's Newsletter!</h1>
			<p>Dear subscriber,</p>
			<p>Stay tuned for future promotions and coupons we would randomly give out!</p>
			<p>Don't forget to check out our <a href="#">website</a> for more news and updates.</p>
			<p style="margin-top: 3rem; text-align: center">
				Privacy | General terms and conditions | Unsubscribe <br />
				Ateneo Ave, Naga, 4400 Camarines Sur <br />
				Philippines © {{ now()->year }} Linig-On!
			</p>
		</div>
	</body>
</html>
