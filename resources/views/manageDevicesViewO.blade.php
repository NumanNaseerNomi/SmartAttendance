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
						<div class="card-header text-center"><h5>Add New Device</h5></div>
						<div class="card-body">
							<form id="saveDevice">
								<div class="mb-3">
									<label for="id" class="form-label">Serial Number</label>
									<input type="text" class="form-control form-control-sm" id="id" name="id" disabled required>
								</div>
								<div class="mb-3">
									<label for="deviceName" class="form-label">Device Name</label>
									<input type="text" class="form-control form-control-sm" id="deviceName" name="deviceName" required>
								</div>
								<div class="mb-3">
									<label for="deviceToken" class="form-label">Device ID</label>
									<input type="text" class="form-control form-control-sm" id="deviceToken" name="deviceToken" required>
								</div>
								<div class="mb-3">
									<label for="deviceDescription" class="form-label">Device Description</label>
									<input type="text" class="form-control form-control-sm" id="deviceDescription" name="deviceDescription" required>
								</div>
								<div class="mb-3">
									<label for="deviceStatus" class="form-label">Device Status</label>
									<select class="form-select form-select-sm" id="deviceStatus" required>
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
						<div class="card-header"><h5>Manage Attendance Devices</h5></div>
						<div class="container-fluid">
							<div class="card-body table-responsive">
								<table class="table table-bordered table-striped table-sm align-middle text-nowrap">
									<thead class="align-middle">
										<tr>
											<th scope="col">#</th>
											<th scope="col">NAME</th>
											<th scope="col">TOKEN</th>
											<th scope="col">DESCRIPTION</th>
											<th scope="col">STATUS</th>
											<th scope="col">MANAGE</th>
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
		row.insertCell(2).innerHTML = config.deviceToken;
		row.insertCell(3).innerHTML = config.description;
		row.insertCell(4).innerHTML = config.isBlocked;
		row.insertCell(5).innerHTML = config.manage;
	}
	
	function fetchDevicesList()
	{
		fetch('/api/getDevices')
		.then((response) => response.json())
		.then((respondedJsonData) =>
		{
			for (let i = 0; i < respondedJsonData.length; i++)
			{
				let dataConfig =
				{
					srNumber 	: i + 1 + ' (' + respondedJsonData[i].id + ')',
					userName 	: respondedJsonData[i].name,
					deviceToken 	: respondedJsonData[i].token,
					description : respondedJsonData[i].description,
					isBlocked 	: respondedJsonData[i].isBlocked ? '<span class="text-danger">Blocked</span>':'<span class="text-success">Active</span>',
					manage 		: '<button type="button" class="btn btn-primary btn-sm" value="' + respondedJsonData[i].id + '" onClick="editDevice(' + respondedJsonData[i].id + ')"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-danger btn-sm" value="' + respondedJsonData[i].id + '" onClick="deleteDevice(' + respondedJsonData[i].id + ')"><i class="fas fa-trash-alt"></i></button>'
				};
				
				plotDevicesListTable(dataConfig);
			}
			// console.log(respondedJsonData);
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
			// "id"			: document.getElementById('id').value,
			"name"			: document.getElementById('deviceName').value,
			"token"			: document.getElementById('deviceToken').value,
			"description"	: document.getElementById('deviceDescription').value,
			"isBlocked"		: document.getElementById('deviceStatus').value
		}

		if(document.getElementById('id').value != "")
		{
			let alertText = "Are you really want to UPDATE this Device?";
			
			if(confirm(alertText) == false)
			{
				saveDeviceForm.reset();
				return;
			}
			else
			{
				// alert('Updating');
				formData.id = document.getElementById('id').value;

				fetch('/api/updateDevice',
				{
					method	: 'PATCH',
					headers	: {'Content-Type': 'application/json'},
					body	: JSON.stringify(formData)
				})
				.then((response) => response.json())
				.then((data) =>
				{
					// console.log(data);
					saveDeviceForm.reset();
					document.getElementById("devicesListTable").innerHTML = "";
					fetchDevicesList();
				})
				.catch((error) => {console.error('Error:', error);});
			}
		}
		else
		{
			// alert('New Device');
			fetch('/api/addDevice',
			{
				method	: 'PUT',
				headers	: {'Content-Type': 'application/json'},
				body	: JSON.stringify(formData)
			})
			.then((response) => response.json())
			.then((data) =>
			{
				// console.log(data);
				saveDeviceForm.reset();
				document.getElementById("devicesListTable").innerHTML = "";
				fetchDevicesList();
			})
			.catch((error) => {console.error('Error:', error);});
		}
	});
</script>

<script>
	function editDevice(id)
	{
		fetch('/api/getDevice',
		{
			method	: 'POST',
			headers	: {'Content-Type': 'application/json'},
			body	: JSON.stringify({'id':id})
		})
		.then((response) => response.json())
		.then((JsonData) =>
		{
			document.getElementById("id").value			= JsonData.id;
			document.getElementById("deviceName").value	= JsonData.name;
			document.getElementById("deviceToken").value	= JsonData.token;
			document.getElementById("deviceDescription").value	= JsonData.description;
			// console.log(JsonData);
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
			fetch('/api/deleteDevice',
			{
				method	: 'DELETE',
				headers	: {'Content-Type': 'application/json'},
				body	: JSON.stringify({'id':id})
			})
			.then((response) => response.json())
			.then((data) =>
			{
				// console.log(data);
				document.getElementById("devicesListTable").innerHTML = "";
				fetchDevicesList();
			})
			.catch((error) => {console.error('Error:', error);});
		}
	}
</script>
