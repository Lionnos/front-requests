<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Request with ajax</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<input type="hidden" id="csrf-token" value="{{ csrf_token() }}">

</head>

<body>

	<!--Request GET-->
	<div>
		<h2>Request GET XHR with jQuery</h2>
		<button type="button" onclick="getRequestAjax();">generate XHR with jQuery</button>

		<Script>

			function getRequestAjax() {
				$.ajax({
					method: "GET",
					url: "http://127.0.0.1:8000/data/getall",
					data: '',
					cache: false,
					async: true, 
					success: function(response) {
						console.log(response);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.error('Error:', textStatus, errorThrown);
					}
				});
        	}

		</Script>

	</div>

	<!--Request POST-->
	<hr>
	<div>
		<h2>Request POST XHR with jQuery</h2>
			<label for="name">Name:</label>
			<input type="text" id="name" placeholder="name">
			<br>
			<label for="age">Age:</label>
			<input type="number" id="age" placeholder="age">
			<br>
			<label for="email">Email:</label>
			<input type="email" id="email" placeholder="email">
			<br>
			<button onclick="sendData()">Enviar Datos</button>
			<br>

		<Script>
			function sendData() {
				let csrfToken = document.getElementById('csrf-token').value;
				let name = document.getElementById('name').value;
    			let age = parseFloat(document.getElementById('age').value);
    			let email = document.getElementById('email').value;
				
				let data = {
					_token: csrfToken,
					name: name,
					age: age,
					email: email
				};

				sendRequestAjax(data)
			}

			function sendRequestAjax(data) {
				$.ajax({
					method: "POST",
					url: "http://127.0.0.1:8000/data/create",
					data: data,
					cache: false,
					async: true, 
					success: function(response) {
						console.log(response);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.error('Error:', textStatus, errorThrown);
					}
				});
        	}

		</Script>

	</div>

	<!--Request POST-->
	<hr>
	<div>
		<h2>Request POST XHR with jQuery</h2>
		<label for="options">Opciones:</label>
			<select id="options" name="options">
				<option value="1">Data 1</option>
				<option value="2">Data 2</option>
				<option value="3">Data 3</option>
			</select>
			<br>
			<button onclick="getbyidData()">Obtain data</button>

		<Script>
			function getbyidData() {
				let csrfToken = document.getElementById('csrf-token').value;
				let selectedOption = document.getElementById('options').value;

				let data = {
					_token: csrfToken,
					id: selectedOption
				};

				getbyidRequestAjax(data)
			}

			function getbyidRequestAjax(data) {
				$.ajax({
					method: "POST",
					url: "http://127.0.0.1:8000/data/getbyid",
					data: data,
					cache: false,
					async: true, 
					success: function(response) {
						console.log(response);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.error('Error:', textStatus, errorThrown);
					}
				});
        	}

		</Script>

	</div>

	<!--Request PUT-->
	<hr>
	<div>
		<h2>Request PUT XHR with jQuery</h2>
		<label for="options">Opciones:</label>
			<select id="options" name="options">
				<option value="1">Data 1</option>
				<option value="2">Data 2</option>
				<option value="3">Data 3</option>
			</select>
			<br>
			<button onclick="getbyidData()">Obtain data</button>

		<Script>
			function getbyidData() {
				let csrfToken = document.getElementById('csrf-token').value;
				let selectedOption = document.getElementById('options').value;

				let data = {
					_token: csrfToken,
					id: selectedOption
				};

				getbyidRequestAjax(data)
			}

			function getbyidRequestAjax(data) {
				$.ajax({
					method: "POST",
					url: "http://127.0.0.1:8000/data/getbyid",
					data: data,
					cache: false,
					async: true, 
					success: function(response) {
						console.log(response);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.error('Error:', textStatus, errorThrown);
					}
				});
        	}

		</Script>

	</div>
</body>

</html>