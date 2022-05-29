<!DOCTYPE html>
<html lang="en">
	@include("components/headerComponent")
	<body class="bg-white text-dark">
		@include("components/navbarViewComponent")
		<br/>
		<div class="container">
			<div class="card text-center">
				<div class="card-header"><h5>Attendance Book</h5></div>
				<div class="card-body"><div id="AttendanceTable" class="overflow-auto"></div></div>
				<div class="card-footer text-muted">
					<button class="btn btn-primary" type="button" id="printTable"><i class="fas fa-print">&emsp;</i>Print</button>
					<button class="btn btn-primary" type="button" id="downloadTable"><i class="fas fa-file-code">&emsp;</i>Download as JSON</button>
				</div>
			</div>
		</div>
		@include("components/footerComponent")
	</body>
</html>

<script>
	// function plotAttendanceTable(config)
	// {
	// 	let row = document.getElementById("attendanceBookTable").insertRow(0);
	// 	row.insertCell(0).innerHTML = config.srNumber;
	// 	row.insertCell(1).innerHTML = config.userName;
	// 	row.insertCell(2).innerHTML = config.cardId;
	// 	row.insertCell(3).innerHTML = config.aboutUser;
	// 	row.insertCell(4).innerHTML = config.dateTime;
	// }
	
	// fetch('/api/getAttendances')
	// .then((response) => response.json())
	// .then((respondedJsonData) =>
	// {console.log(respondedJsonData);
	// 	for (let i = 0; i < respondedJsonData.length; i++)
	// 	{
	// 		let dataConfig =
	// 		{
	// 			srNumber 	: i + 1,
	// 			userName 	: respondedJsonData[i].user.name + '<br/> (' + respondedJsonData[i].user.userName + ')',
	// 			cardId 		: respondedJsonData[i].user.cardId,
	// 			aboutUser 	: respondedJsonData[i].user.about,
	// 			dateTime 	: "<span class='text-success'>IN: " + respondedJsonData[i].attendance.checkIn +
	// 							"</span><br/> <span class='text-primary'>OUT: " + respondedJsonData[i].attendance.checkOut + "</span>"
	// 		};
			
	// 		plotAttendanceTable(dataConfig);
	// 	}
	// });
</script>

<script>
	var table = new Tabulator(document.getElementById("AttendanceTable"),
	{
		layout:"fitColumns",
		ajaxURL:"/api/getAttendances",
		placeholder:"No Record Found.",
		pagination: true,
		paginationSize:10,
		paginationSizeSelector:true,
		paginationCounter:"rows",
		printHeader:"<h1 class='text-center'>ATTENDANCE BOOK</h1>",

		columns:
		[
			{title:"USER NAME", field:"user.userName", headerHozAlign:"center", hozAlign:"center", headerFilter:true, resizable:false, minWidth:150},
			{title:"CARD ID", field:"user.cardId", headerHozAlign:"center", hozAlign:"center", headerFilter:true, resizable:false, minWidth:150},
			{title:"ABOUT USER", field:"user.about", headerHozAlign:"center", hozAlign:"center", headerFilter:true, resizable:false, minWidth:150},
			{title:"CHECK IN", field:"attendance.checkIn", headerHozAlign:"center", hozAlign:"center", headerFilter:true, resizable:false, minWidth:150},
			{title:"CHECK OUT", field:"attendance.checkOut", headerHozAlign:"center", hozAlign:"center", headerFilter:true, resizable:false, minWidth:150},
			{title:"Is Present?", field:"attendance.isPresent", headerHozAlign:"center", hozAlign:"center", headerFilter:"tickCross", formatter:"tickCross",
				headerFilterParams:{"tristate":true},headerFilterEmptyCheck:function(value){return value === null}, topCalc:"count"},
		],
	});

	document.getElementById("printTable").addEventListener("click", () => table.print(false, true));
	document.getElementById("downloadTable").addEventListener("click", () => table.download("json", "AttendanceBook.json"));
</Script>