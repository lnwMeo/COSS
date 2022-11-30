<!DOCTYPE HTML>

<?php
include_once "../config/config.php";
$cnf = new Config();
$rootPath = $cnf->path;
?>
<html>

<head>
	<link rel="stylesheet" href="css/mainDashBoard2.css">
	<meta charset="UTF-8">
	<script>
		var datasets = [];

		function displayPie() {

			var url = "<?= $rootPath ?>/Dashboard/getSumaryByIssueType.php";
			var data = queryData(url);

			for (i = 0; i < data.length; i++) {
				datasets.push({
					"name": "ประเภทการร้องขอ :" + data[i].IssueType,
					y: parseInt(data[i].CNT)
				});
			}

			var chart = new CanvasJS.Chart("dvPie", {
				exportEnabled: true,
				animationEnabled: true,
				title: {
					text: "สัดส่วนจำนวนการขอรับบริการ",
					fontFamily: " 'Prompt', sans-serif",
					fontSize: 25,
					fontWeight: "bold"
				},
				legend: {
					cursor: "pointer",
					itemclick: explodePie

				},
				data: [{
					type: "doughnut",
					showInLegend: false,
					indexLabel: "#percent%",
					percentFormatString: "#0.##",
					toolTipContent: "{name}: <strong>{y}(#percent%) .</strong>",
					dataPoints: datasets

				}]
			});
			chart.render();
		}

		$(document).ready(function() {
			displayPie();
		});

		function explodePie(e) {
			if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
				e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
			} else {
				e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
			}
			e.chart.render();

		}
	</script>

</head>

<body>
	<div class="Dglss2">
		<div id="dvPie"  style="height: 400px; max-width: 920px; margin: 0px auto; "></div>
	</div>
</body>

</html>