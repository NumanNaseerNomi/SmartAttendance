<!DOCTYPE html>
<html lang="en">
	@include("components/headerComponent")
	<body class="bg-white text-dark">
		@include("components/navbarViewComponent")
		<br/>
		<div class="container">
			<div class="card text-center">
				<div class="card-header"><h5>Attendance Book</h5></div>
					<div class="card-body">
						<div id="example-table" class="overflow-auto"></div>
					</div>
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
// console.log(testData);
// import TabulatorFull as Tabulator;
//     define some sample data
	// var tabledata =
	// [
	// 	{id:{a:1,b:1.1}, name:"Oli Bob", age:"12", col:"red", dob:""},
	// 	{id:{a:2,b:2.2}, name:"Mary May", age:"1", col:"blue", dob:"14/05/1982"},
	// 	{id:{a:3,b:3.3}, name:"Christine Lobowski", age:"42", col:"green", dob:"22/05/1982"},
	// 	{id:{a:4,b:4.4}, name:"Brendon Philips", age:"125", col:"orange", dob:"01/08/1980"},
	// 	{id:{a:5,b:5.5}, name:"Margret Marmajuke", age:"16", col:"yellow", dob:"31/01/1999"},
	// ];

	// console.log(tabledata);

	//create Tabulator on DOM element with id "example-table"
	var table = new Tabulator(document.getElementById("example-table"),
	{
		// height:"311px",
		layout:"fitColumns",
		ajaxURL:"/api/getAttendances",
		// progressiveLoad:"scroll",
		// paginationSize:20,
		placeholder:"No Record Found.",
		// sortOrderReverse:true,
		pagination: true,
		paginationSize:10,
		paginationSizeSelector:true,
		paginationCounter:"rows",

		// printAsHtml:true,
		// printStyled:true,
		printHeader:"<h1 class='text-center'>ATTENDANCE BOOK</h1>",

		columns:
		[
			{title:"USER NAME", field:"user.userName", headerHozAlign:"center", hozAlign:"center", headerFilter:true, resizable:false, minWidth:150},
			{title:"CARD ID", field:"user.cardId", headerHozAlign:"center", hozAlign:"center", headerFilter:true, resizable:false, minWidth:150},
			{title:"ABOUT USER", field:"user.about", headerHozAlign:"center", hozAlign:"center", headerFilter:true, resizable:false, minWidth:150},
			{title:"CHECK IN", field:"attendance.checkIn", headerHozAlign:"center", hozAlign:"center", headerFilter:true, resizable:false, minWidth:150},
			{title:"CHECK OUT", field:"attendance.checkOut", headerHozAlign:"center", hozAlign:"center", headerFilter:true, resizable:false, minWidth:150},
			{title:"Is Present?", field:"attendance.isPresent", headerHozAlign:"center", hozAlign:"center", headerFilter:"tickCross", formatter:"tickCross", headerFilterParams:{"tristate":true},headerFilterEmptyCheck:function(value){return value === null}, topCalc:"count"},
			// {title:"Favourite Color", field:"col", sorter:"string"},
			// {title:"Date Of Birth", field:"dob", sorter:"date", hozAlign:"center"},
			// {title:"Driver", field:"car", hozAlign:"center", formatter:"tickCross", sorter:"boolean"},
		],
	});

	document.getElementById("printTable").addEventListener("click", () => table.print(false, true));
	document.getElementById("downloadTable").addEventListener("click", () => table.download("json", "AttendanceBook.json"));


// 	var table = new Tabulator(document.getElementById("example-table"), {
//     ajaxURL:"/api/getAttendances", //ajax URL
// });
</Script>