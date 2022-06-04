<!DOCTYPE html>
<html lang="en">
	@include("components/headerComponent")
	<body>
		@include("components/navbarViewComponent")
		<br/>
		<div class="container">
			<div class="card text-center">
				<div class="card-header"><h5>Attendance Book</h5></div>
				<div class="card-body"><div id="attendanceTable" class="overflow-auto"></div></div>
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
	var table = new Tabulator(document.getElementById("attendanceTable"),
	{
		layout:"fitColumns",
		data:<?php echo $attendanceDetail; ?>,
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
</script>
