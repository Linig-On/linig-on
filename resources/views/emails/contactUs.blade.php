<div style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5; color: #333; margin: 0; padding: 0">
	<div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)">
		<h2 style="font-size: 24px; font-weight: bold; color: #333; margin: 0 0 20px; padding: 0">I am {{ $data["name"] }}</h2>
		and I have a concern.
		<br />
		<strong>USER DETAILS </strong><br />
		<strong>Name: </strong>{{ $data["name"] }} <br />
		<strong>Email: </strong>{{ $data["email"] }} <br />
		<strong>Message: </strong>{{ $data["message"] }} <br />
		Thank you
	</div>
</div>
