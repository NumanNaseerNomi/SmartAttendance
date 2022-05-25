<!DOCTYPE html>
<html lang="en">
	@include("components/headerComponent")
	<body class="bg-white text-dark">
		@include("components/navbarViewComponent")
		<br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-4 mb-4">
					<div class="card bg-light text-dark shadow">
						<div class="card-header text-center"><h5>Add New Device</h5></div>
						<div class="card-body">
							<form id="saveDevice">
								<input type="text" id="id" name="id" hidden>
								<div class="mb-3">
									<label for="deviceName" class="form-label">Device Name</label>
									<input type="text" class="form-control bg-white text-dark" id="deviceName" name="deviceName" required>
								</div>
								<div class="mb-3">
									<label for="deviceID" class="form-label">Device ID</label>
									<input type="text" class="form-control bg-white text-dark" id="deviceID" name="deviceID" required>
								</div>
								<div class="mb-3">
									<label for="deviceDescription" class="form-label">Device Description</label>
									<input type="text" class="form-control bg-white text-dark" id="deviceDescription" name="deviceDescription">
								</div>
								<div class="d-grid gap-2">
									<button type="reset" class="btn btn-secondary btn-sm">Reset</button>
									<button type="submit" class="btn btn-primary btn-sm">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-8 mb-4">
					<div class="card text-center bg-light shadow">
						<div class="card-header"><h5>Manage Attendance Devices</h5></div>
						<div class="container-fluid">
							<div class="card-body table-responsive">
								<table class="table table-bordered table-sm bg-light text-dark align-middle text-nowrap">
									<thead class="align-middle">
										<tr>
											<th scope="col">#</th>
											<th scope="col">DEVICE NAME</th>
											<th scope="col">DEVICE ID</th>
											<th scope="col">DEVICE DESCRIPTION</th>
											<th scope="col">MANAGE DEVICE</th>
										</tr>
									</thead>
									<tbody id="devicesListTable"></tbody>
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
	function plotDevicesListTable(config)
	{
  		let row = document.getElementById("devicesListTable").insertRow(-1);
		row.insertCell(0).innerHTML = config.srNumber;
		row.insertCell(1).innerHTML = config.userName;
		row.insertCell(2).innerHTML = config.deviceId;
		row.insertCell(3).innerHTML = config.description;
		row.insertCell(4).innerHTML = config.manage;
	}
	
	function fetchDevicesList()
	{
		fetch('/api/getUsers')
		.then((response) => response.json())
		.then((respondedJsonData) =>
		{
			for (let i = 0; i < respondedJsonData.length; i++)
			{
				// let srNum = i + 1;
				let dataConfig =
				{
					srNumber 	: i + 1,
					userName 	: respondedJsonData[i].name + "<br/>(" + respondedJsonData[i].userName + ")",
					deviceId 	: respondedJsonData[i].cardId,
					description : respondedJsonData[i].about,
					manage 		: '<button type="button" class="btn btn-primary btn-sm" value="' + respondedJsonData[i].id + '" onClick="editDevice(' + respondedJsonData[i].id + ')"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-danger btn-sm" value="' + respondedJsonData[i].id + '" onClick="deleteDevice(' + respondedJsonData[i].id + ')"><i class="fas fa-trash-alt"></i></button>'
				};
				
				plotDevicesListTable(dataConfig);
			}
			console.log(respondedJsonData);
		});
	}
	fetchDevicesList();
</script>

<script>
	const saveDeviceForm = document.getElementById('saveDevice');

	saveDeviceForm.addEventListener('submit', (event) =>
	{
		event.preventDefault();

		const formData =
		{
			id					: document.getElementById('id').value,
			deviceName			: document.getElementById('deviceName').value,
			deviceID			: document.getElementById('deviceID').value,
			deviceDescription	: document.getElementById('deviceDescription').value
		}

		if(formData.id != "")
		{
			let alertText = "Are you really want to UPDATE this Device?";
			
			if(confirm(alertText) == false)
			{
				saveDeviceForm.reset();
				return;
			}
		}
		
		fetch('Database/users/saveDevice.php',
		{
			method	: 'POST',
			headers	: {'Content-Type': 'application/json'},
			body	: JSON.stringify(formData)
		})
		.then((response) => response.json())
		.then((data) =>
		{
			console.log(data);
			saveDeviceForm.reset();
			document.getElementById("devicesListTable").innerHTML = "";
			fetchDevicesList();
		})
		.catch((error) => {console.error('Error:', error);});
	});
</script>

<script>
	function editDevice(id)
	{
		fetch('Database/users/getUser.php',
		{
			method	: 'POST',
			headers	: {'Content-Type': 'application/json'},
			body	: JSON.stringify(id)
		})
		.then((response) => response.json())
		.then((JsonData) =>
		{
			document.getElementById("id").value			= JsonData[0].id;
			document.getElementById("deviceName").value	= JsonData[0].name;
			document.getElementById("deviceID").value	= JsonData[0].cardId;
			document.getElementById("deviceDescription").value	= JsonData[0].about;
			console.log(JsonData);
		})
		.catch((error) => {console.error('Error:', error);});
	}
</script>

<script>
	function deleteDevice(id)
	{
		let alertText = "Are you really want to DELETE this Device?";

		if(confirm(alertText) == true)
		{
			fetch('Database/users/deleteUser.php',
			{
				method	: 'POST',
				headers	: {'Content-Type': 'application/json'},
				body	: JSON.stringify(id)
			})
			.then((response) => response.json())
			.then((data) =>
			{
				console.log(data);
				document.getElementById("devicesListTable").innerHTML = "";
				fetchDevicesList();
			})
			.catch((error) => {console.error('Error:', error);});
		}
	}
</script>