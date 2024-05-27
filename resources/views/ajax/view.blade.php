<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Request with ajax</title>

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
			<button onclick="sendData()">Send Data</button>
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
		<label for="options">Options:</label>
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
			<label for="optionsP">Options:</label>
			<select id="optionsP" name="optionsP">
				<option value="1">Data 1</option>
				<option value="2">Data 2</option>
				<option value="3">Data 3</option>
			</select>
			<br>

			<label for="nameP">Name:</label>
			<input type="text" id="nameP" placeholder="name">
			<br>
			<label for="ageP">Age:</label>
			<input type="number" id="ageP" placeholder="age">
			<br>
			<label for="emailP">Email:</label>
			<input type="email" id="emailP" placeholder="email">
			<br>
			<button onclick="updateData()">Update Datos</button>
			<br>

		<Script>
			function updateData() {
				let csrfToken = document.getElementById('csrf-token').value;
				let selectedOption = document.getElementById('optionsP').value;
				let name = document.getElementById('nameP').value;
    			let age = parseFloat(document.getElementById('ageP').value);
    			let email = document.getElementById('emailP').value;
				
				let data = {
					_token: csrfToken,
					id: selectedOption,
					name: name,
					age: age,
					email: email
				};

				updateRequestAjax(data)
			}

			function updateRequestAjax(data) {
				$.ajax({
					method: "PUT",
					url: "http://127.0.0.1:8000/data/update",
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

	<!--Request DELETE-->
	<hr>
	<div>
		<h2>Request DELETE XHR with jQuery</h2>
			<label for="optionsD">Options:</label>
			<select id="optionsD" name="options">
				<option value="1">Data 1</option>
				<option value="2">Data 2</option>
				<option value="3">Data 3</option>
			</select>
			<br>
			<button onclick="deleteData()">Delete data</button>
			<br>

		<Script>
			function deleteData() {
				let csrfToken = document.getElementById('csrf-token').value;
				let id = document.getElementById('optionsD').value;
				
				let data = {
					_token: csrfToken,
				};

				deleteRequestAjax(id, data)
			}

			function deleteRequestAjax(id, data) {
				$.ajax({
					method: "DELETE",
					url: "http://127.0.0.1:8000/data/delete/" + id,
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

	<script src="{{asset('libraries/jquery/jquery.min.js')}}"></script>

</body>

</html>