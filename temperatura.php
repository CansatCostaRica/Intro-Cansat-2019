<?php
if(isset($_GET['nombre'])){
$nombre='getdata.php?nombre='.$_GET['nombre'];	
}
else{
	$nombre='getdata.php?nombre=test';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
<link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<title>Temperatura</title>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
<div style="width:100%;">
<canvas id="mycanvas"></canvas>
</div>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script>
<script id="rendered-js">
      // used for example purposes

// create initial empty chart
var ctx_live = document.getElementById("mycanvas");
var myChart = new Chart(ctx_live, {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      data: [],
      borderWidth: 1,
      borderColor: '#00c0ef',
      label: 'Temperatura' }] },


  options: {
    responsive: true,
    title: {
      display: true,
      text: "Temperatura" },

    legend: {
      display: false },

    scales: {
						xAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Milisegundos'
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Grados (°C)'
							}
						}]
  }}});






// this post id drives the example data
var postId = 1;
var tiempo = 0;

function live(){
	setInterval(function (){
		fetch('<?php echo $nombre?>').then(function (response){
			return response.json();
		}).then(function (data) {
			var temperatura = data.temperatura;
			myChart.data.datasets[0].data.push(temperatura);
			myChart.data.labels.push(tiempo);
			if (tiempo>10){
				myChart.data.labels.splice(0,1);
				myChart.data.datasets[0].data.splice(0,1);
			}
			myChart.update();
			tiempo +=1;
			
		}).catch(function (error) {
			console.log(error);
		});
	},500);
	}
	document.addEventListener("DOMContentLoaded", function () {
		live();
	});

      //# sourceURL=pen.js
	  </script>
	  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    </script>
</body>
</html>