<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Request with Fetch</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

	<!--Request GET-->
	<div>
		<h2>Request GET with fetch</h2>
		<button type="button" onclick="getDataFetch();">generate XHR with fetch</button>

		<Script>

            function getDataFetch() {
                getRequestFetch();
            }

            async function getRequestFetch() {
                const url = 'http://127.0.0.1:8000/data/getall';

                try {
                    const response = await fetch(url, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                    });

                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }

                    const result = await response.json();

                    console.log(result);

                } catch (error) {
                    console.error('There was a problem with the fetch operation:', error);
                }
            }

		</Script>

	</div>

	<!--Request POST-->
	<hr>
	<div>
		<h2>Request POST with Fetch</h2>
			<label for="name">Name:</label>
			<input type="text" id="name" placeholder="name">
			<br>
			<label for="age">Age:</label>
			<input type="number" id="age" placeholder="age">
			<br>
			<label for="email">Email:</label>
			<input type="email" id="email" placeholder="email">
			<br>
			<button onclick="postDataFetch()">Create Data</button>
			<br>

		<Script>
			function postDataFetch() {
				let name = document.getElementById('name').value;
    			let age = parseFloat(document.getElementById('age').value);
    			let email = document.getElementById('email').value;
				
				let data = {
					name: name,
					age: age,
					email: email
				};

				postRequestFetch(data)
			}

            async function postRequestFetch(data) {
                const url = 'http://127.0.0.1:8000/data/create';
				let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                try {
                    let response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(data)
                    });

                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }

                    const result = await response.json();

                    console.log(result);

                } catch (error) {
                    console.error('There was a problem with the fetch operation:', error);
                }
            }

		</Script>

	</div>

	<!--Request POST-->
	<hr>
	<div>
		<h2>Request POST XHR with Fetch</h2>
		<label for="optionsG">Options:</label>
			<select id="optionsG" name="options">
				<option value="1">Data 1</option>
				<option value="2">Data 2</option>
				<option value="3">Data 3</option>
			</select>
			<br>
			<button onclick="getbyidDataFetch()">Obtain data</button>

		<Script>
			function getbyidDataFetch() {
				const selectedOption = document.getElementById('optionsG').value;

				const data = {
					id: selectedOption
				};

				getbyidRequestFetch(data)
			}

            async function getbyidRequestFetch(data) {
                const url = 'http://127.0.0.1:8000/data/getbyid';
				const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                try {
                    let response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(data)
                    });

                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }

                    const result = await response.json();

                    console.log(result);

                } catch (error) {
                    console.error('There was a problem with the fetch operation:', error);
                }
            }
		</Script>

	</div>

	<!--Request PUT-->
	<hr>
	<div>
		<h2>Request PUT XHR with Fetch</h2>
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
			<button onclick="updateDataFetch()">Update Datos</button>
			<br>

		<Script>
			function updateDataFetch() {
				const selectedOption = document.getElementById('optionsP').value;
				const name = document.getElementById('nameP').value;
    			const age = parseFloat(document.getElementById('ageP').value);
    			const email = document.getElementById('emailP').value;
				
				const data = {
					id: selectedOption,
					name: name,
					age: age,
					email: email
				};

				updateRequestFetch(data)
			}

            async function updateRequestFetch(data) {
                const url = 'http://127.0.0.1:8000/data/update';
				const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                try {
                    const response = await fetch(url, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(data)
                    });

                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }

                    const result = await response.json();

                    console.log(result);

                } catch (error) {
                    console.error('There was a problem with the fetch operation:', error);
                }
            }
		</Script>

	</div>

	<!--Request DELETE-->
	<hr>
	<div>
		<h2>Request DELETE XHR with Fetch</h2>
			<label for="optionsD">Options:</label>
			<select id="optionsD" name="options">
				<option value="1">Data 1</option>
				<option value="2">Data 2</option>
				<option value="3">Data 3</option>
			</select>
			<br>
			<button onclick="deleteDataFetch()">Delete data</button>
			<br>

		<Script>
			function deleteDataFetch() {
				const id = document.getElementById('optionsD').value;
				
				const data = {
					id: id,
				};

				deleteRequestFetch(data)
			}

            async function deleteRequestFetch(data) {
                const url = 'http://127.0.0.1:8000/data/delete';
				const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                try {
                    const response = await fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(data)
                    });

                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }

                    const result = await response.json();

                    console.log(result);

                } catch (error) {
                    console.error('There was a problem with the fetch operation:', error);
                }
            }
		</Script>

	</div>

</body>

</html>