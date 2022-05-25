<!DOCTYPE html>
<html lang="en">
	@include("components/headerComponent")
	<body class="bg-white text-dark">
		@include("components/navbarViewComponent")
		<br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-3 mb-4">
					<div class="card bg-light text-dark shadow">
						<div class="card-header text-center"><h5>Filter Attendance</h5></div>
						<div class="card-body">
							<form>
								<div class="mb-3">
									<label for="userName" class="form-label">Select User</label>
									<select class="form-select bg-white text-dark" aria-label="Default select example">
										<option value="*" selected>All Users</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
								</div>
								<div class="mb-3">
									<label for="cardID" class="form-label">Date From</label>
									<input type="date" class="form-control bg-white text-dark" id="cardID">
								</div>
								<div class="mb-3">
									<label for="cardID" class="form-label">Date To</label>
									<input type="date" class="form-control bg-white text-dark" id="cardID">
								</div>
								<div class="mb-3">
									<label for="cardID" class="form-label">Time In</label>
									<input type="time" class="form-control bg-white text-dark" id="cardID">
								</div>
								<div class="mb-3">
									<label for="cardID" class="form-label">Time Out</label>
									<input type="time" class="form-control bg-white text-dark" id="cardID">
								</div>
								<div class="d-grid gap-2">
									<button type="submit" class="btn btn-primary btn-sm">Filter</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-9 mb-4">
					<div class="card text-center bg-light shadow">
						<div class="card-header"><h5>Attendance Book</h5></div>
						<div class="container-fluid">
							<div class="card-body table-responsive">
								<table class="table table-bordered table-striped table-sm bg-light text-dark align-middle text-nowrap">
									<thead class="align-middle">
										<tr>
											<th scope="col">#</th>
											<th scope="col">USER NAME</th>
											<th scope="col">CARD ID</th>
											<th scope="col">ABOUT USER</th>
											<th scope="col">Attendance</th>
										</tr>
									</thead>
									<tbody id="attendanceBookTable"></tbody>
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
	function plotAttendanceTable(config)
	{
		let row = document.getElementById("attendanceBookTable").insertRow(0);
		row.insertCell(0).innerHTML = config.srNumber;
		row.insertCell(1).innerHTML = config.userName;
		row.insertCell(2).innerHTML = config.cardId;
		row.insertCell(3).innerHTML = config.aboutUser;
		row.insertCell(4).innerHTML = config.dateTime;
	}
	
	fetch('/api/getAttendances')
	.then((response) => response.json())
	.then((respondedJsonData) =>
	{
		for (let i = 0; i < respondedJsonData.length; i++)
		{
			let dataConfig =
			{
				srNumber 	: i + 1,
				userName 	: respondedJsonData[i].user.name + '<br/> (' + respondedJsonData[i].user.userName + ')',
				cardId 		: respondedJsonData[i].user.cardId,
				aboutUser 	: respondedJsonData[i].user.about,
				dateTime 	: "<span class='text-success'>IN: " + respondedJsonData[i].attendance.checkIn +
								"</span><br/> <span class='text-primary'>OUT: " + respondedJsonData[i].attendance.checkOut + "</span>"
			};
			
			plotAttendanceTable(dataConfig);
		}
	});
</script>