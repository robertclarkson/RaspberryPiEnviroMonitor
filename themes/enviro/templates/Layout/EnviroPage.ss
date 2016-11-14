<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  		<div id="chart_temp"></div>
  		<div id="chart_moist"></div>
  		<div id="chart_press"></div>
  		<div id="chart_soiltemp"></div>
  		<div id="chart_lux"></div>

  		<script type="text/javascript">
		tempArr = [];
		moistArr = [];
		pressArr = [];
		soiltempArr = [];
		luxArr = [];
		
		<% loop Readings.sort('Created ASC') %>
			curdate = new Date($Created.Year,$Created.Format('m'),$Created.Format('d'),$Created.Format('H'),$Created.Format('i'));
			tempArr.push([curdate, $temp]);
			moistArr.push([curdate, $moist]);
			pressArr.push([curdate, $press]);
			soiltempArr.push([curdate, $soiltemp]);
			luxArr.push([curdate, $lux]);

		<% end_loop %>

  		google.charts.load('current', {packages: ['corechart', 'line']});
		google.charts.setOnLoadCallback(drawAllGraphs);
		
		function drawAllGraphs() {

			drawGraph('chart_temp', tempArr, 'Outside Temperature', 'Deg C');
			drawGraph('chart_moist', moistArr, 'Soil Mosture', 'Voltage');
			drawGraph('chart_press', pressArr, 'Pressure', 'hPa');
			drawGraph('chart_soiltemp', soiltempArr, 'Soil Temperature', 'Voltage');
			drawGraph('chart_lux', luxArr, 'Sunlight', 'Luminousity');
			
		}

		function drawGraph(divID, valuesArray, graphTitle, fieldTitle) {
			console.log(valuesArray);
			var data = new google.visualization.DataTable();
			data.addColumn('date', 'Date');
			data.addColumn('number', graphTitle);
			data.addRows(valuesArray);
			var options = {
				hAxis: {
					title: 'Date',
					gridlines: {
						count: -1,
						units: {
						  days: {format: ['dd MMM']},
						  hours: {format: ['HH:mm', 'ha']},
						}
					},
					minorGridlines: {
						units: {
						  hours: {format: ['hh:mm:ss a', 'ha']},
						  minutes: {format: ['HH:mm a Z', ':mm']}
						}
					}
				},
				vAxis: {
				  title: fieldtitle
				}
			};
			var chart = new google.visualization.LineChart(document.getElementById(divID));
			chart.draw(data, options);
		}


		</script>
	</article>
		$Form
		$CommentsForm
</div>