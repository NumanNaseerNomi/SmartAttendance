<!DOCTYPE html>
<html lang="en">
	@include("components/headerComponent")
	<body>
		@include("components/navbarViewComponent")
		<br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-4 mb-4">
					<div class="card bg-light text-dark shadow">
						<div class="card-header text-center"><h5>Add New User</h5></div>
						<div class="card-body">
							<form id="saveUser">
								<div class="mb-3">
									<label for="id" class="form-label">Serial Number</label>
									<input type="text" class="form-control form-control-sm" id="id" name="id" disabled required>
								</div>
								<div class="mb-3">
									<label for="name" class="form-label">Name</label>
									<input type="text" class="form-control form-control-sm" id="name" name="name" required>
								</div>
								<div class="mb-3">
									<label for="cardId" class="form-label">Card ID</label>
									<input type="text" class="form-control form-control-sm" id="cardId" name="cardId" required>
								</div>
								<div class="mb-3">
									<label for="about" class="form-label">About</label>
									<input type="text" class="form-control form-control-sm" id="about" name="about" required>
								</div>
								<div class="mb-3">
									<label for="status" class="form-label">Status</label>
									<select class="form-select form-select-sm" id="status" required>
										<option disabled selected></option>
										<option value="0">Active</option>
										<option value="1">Block</option>
									</select>
								</div>
								<div class="d-grid gap-2">
									<button type="reset" class="btn btn-outline-primary btn-sm">Reset</button>
									<button type="submit" class="btn btn-primary btn-sm">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-8 mb-4">
					<div class="card text-center shadow">
						<div class="card-header"><h5>Manage Attendance Users</h5></div>
						<div class="container-fluid">
							<div class="card-body table-responsive">
								<table class="table table-bordered table-striped table-sm align-middle text-nowrap">
									<thead class="align-middle">
										<tr>
											<th scope="col">#</th>
											<th scope="col">NAME</th>
											<th scope="col">CARD ID</th>
											<th scope="col">ABOUT</th>
											<th scope="col">STATUS</th>
											<th scope="col">MANAGE</th>
										</tr>
									</thead>
									<tbody id="usersListTable"></tbody>
								</table>
							</dav>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include("components/footerComponent")
	</body>
</html>

<script>
	function plotUsersListTable(config)
	{
  		let row = document.getElementById("usersListTable").insertRow(-1);
		row.insertCell(0).innerHTML = config.srNumber;
		row.insertCell(1).innerHTML = config.name;
		row.insertCell(2).innerHTML = config.cardId;
		row.insertCell(3).innerHTML = config.about;
		row.insertCell(4).innerHTML = config.isBlocked;
		row.insertCell(5).innerHTML = config.manage;
	}
	
	function fetchUsersList()
	{
		fetch('/api/getUsers')
		.then((response) => response.json())
		.then((respondedJsonData) =>
		{
			for (let i = 0; i < respondedJsonData.length; i++)
			{
				let dataConfig =
				{
					srNumber 	: i + 1 + ' (' + respondedJsonData[i].id + ')',
					name 	: respondedJsonData[i].name + "<br/>(" + respondedJsonData[i].userName + ")",
					cardId 		: respondedJsonData[i].cardId,
					about 		: respondedJsonData[i].about,
					isBlocked 	: respondedJsonData[i].isBlocked ? '<span class="text-danger">Blocked</span>':'<span class="text-success">Active</span>',
					manage 		: respondedJsonData[i].isAdmin ? '' : '<button type="button" class="btn btn-primary btn-sm" value="' + respondedJsonData[i].id +
									'" onClick="editUser(' + respondedJsonData[i].id + ')"><i class="fas fa-edit"></i></button>'
									// + '<button type="button" class="btn btn-danger btn-sm" value="' + respondedJsonData[i].id +
									// '" onClick="deleteUser(' + respondedJsonData[i].id + ')"><i class="fas fa-trash-alt"></i></button>'
				};
				
				plotUsersListTable(dataConfig);
			}
			// console.log(respondedJsonData);
		});
	}
	fetchUsersList();
</script>

<script>
	const saveUserForm = document.getElementById('saveUser');

	saveUserForm.addEventListener('submit', (event) =>
	{
		event.preventDefault();

		const formData =
		{
			// "id": document.getElementById('id').value,
			"name"		: document.getElementById('name').value,
			// "userName"	: document.getElementById('name').value.replace(/\s+/g, '.').toLowerCase() + '.' + Math.floor(1000 + Math.random() * 9000),
			"pinCode"	: "$2y$10$ySankBlZrVm10Ki4NrVy8OxJTG.qQk5l.qO1eExNEKrd4KxWki.YK",
			"about"		: document.getElementById('about').value,
			"cardId"	: document.getElementById('cardId').value,
			// "isAdmin"	: 0,
			"isBlocked"	: document.getElementById('status').value
		}

		if(document.getElementById('id').value != "")
		{
			let alertText = "Are you really want to UPDATE this User?";
			
			if(confirm(alertText) == false)
			{
				saveUserForm.reset();
				return;
			}
			else
			{
				// alert('Updating');
				formData.id = document.getElementById('id').value;

				fetch('/api/updateUser',
				{
					method	: 'PATCH',
					headers	: {'Content-Type': 'application/json'},
					body	: JSON.stringify(formData)
				})
				.then((response) => response.json())
				.then((data) =>
				{
					// console.log(data);
					saveUserForm.reset();
					document.getElementById("usersListTable").innerHTML = "";
					fetchUsersList();
				})
				.catch((error) => {console.error('Error:', error);});
			}
		}
		else
		{
			// let userName =  document.getElementById('name').value.replace(/\s+/g, '.').toLowerCase() + '.' + Math.floor(Math.random() * 90 + 10);
			// alert(userName);
			formData.isAdmin = 0;
			formData.userName = document.getElementById('name').value.replace(/\s+/g, '.').toLowerCase() + '.' + Math.floor(Math.random() * 90 + 10);
			// console.log(formData);

			fetch('/api/addUser',
			{
				method	: 'PUT',
				headers	: {'Content-Type': 'application/json'},
				body	: JSON.stringify(formData)
			})
			.then((response) => response.json())
			.then((data) =>
			{
				// console.log(data);
				saveUserForm.reset();
				document.getElementById("usersListTable").innerHTML = "";
				fetchUsersList();
			})
			.catch((error) => {console.error('Error:', error);});
		}
	});
</script>

<script>
	function editUser(id)
	{
		fetch('/api/getUser',
		{
			method	: 'POST',
			headers	: {'Content-Type': 'application/json'},
			body	: JSON.stringify({'id':id})
		})
		.then((response) => response.json())
		.then((JsonData) =>
		{
			document.getElementById("id").value		= JsonData.id;
			document.getElementById("name").value	= JsonData.name;
			document.getElementById("cardId").value	= JsonData.cardId;
			document.getElementById("about").value	= JsonData.about;
			// console.log(JsonData);
		})
		.catch((error) => {console.error('Error:', error);});
	}
</script>

<script>
	// function deleteUser(id)
	// {
	// 	let alertText = "Are you really want to DELETE this User?";

	// 	if(confirm(alertText) == true)
	// 	{
	// 		fetch('/api/deleteUser',
	// 		{
	// 			method	: 'DELETE',
	// 			headers	: {'Content-Type': 'application/json'},
	// 			body	: JSON.stringify({'id':id})
	// 		})
	// 		.then((response) => response.json())
	// 		.then((data) =>
	// 		{
	// 			// console.log(data);
	// 			document.getElementById("usersListTable").innerHTML = "";
	// 			fetchUsersList();
	// 		})
	// 		.catch((error) => {console.error('Error:', error);});
	// 	}
	// }
</script>