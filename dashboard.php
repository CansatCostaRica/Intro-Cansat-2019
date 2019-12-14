<?php
include 'base.php';
if(isset($_GET['nombre'])){
	$nombre=$_GET['nombre'];
}else{
	$nombre='hola';
}
$nombres=array();
$sql = 'SELECT DISTINCT nombre FROM cansat';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		array_push($nombres, $row['nombre']);
    }
} else {
    echo "0 results";
}
?>

<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style>
	/* Hide scrollbar for Chrome, Safari and Opera */
body::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE and Edge */
body {
  -ms-overflow-style: none;
}	</style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Dashboard Cansat 2019</title>
  </head>
  <body>
  <center>
    <h1>TALLER CANSAT 2019</h1>
<table style="height: 534px;" width="564">
<tbody>
<tr>
<td style="width: 44px;"><iframe style="border: 0px #ffffff none;" src="http://localhost/acae/temperatura.php?nombre=<?php echo $nombre?>" name="temperatura" width="600px" height="500px" frameborder="0" marginwidth="0px" marginheight="0px" scrolling="no" allowfullscreen="allowfullscreen"></iframe></td>
<td style="width: 44px;"><iframe style="border: 0px #ffffff none;" src="http://localhost/acae/x.php?nombre=<?php echo $nombre?>" name="temperatura" width="600px" height="500px" frameborder="0" marginwidth="0px" marginheight="0px" scrolling="no" allowfullscreen="allowfullscreen"></iframe></td>
</tr>
<tr>
<td style="position:relative; top: -200px; left: 0px;"><iframe style="border: 0px #ffffff none;" src="http://localhost/acae/y.php?nombre=<?php echo $nombre?>" name="temperatura" width="600px" height="500px" frameborder="0" marginwidth="0px" marginheight="0px" scrolling="no" allowfullscreen="allowfullscreen"></iframe></td>
<td style="position:relative; top: -200px; left: 0px;"><iframe style="border: 0px #ffffff none;" src="http://localhost/acae/z.php?nombre=<?php echo $nombre?>" name="temperatura" width="600px" height="500px" frameborder="0" marginwidth="0px" marginheight="0px" scrolling="no" allowfullscreen="allowfullscreen"></iframe></td>
</tr>
</tbody>
</table>
<a style="position:relative; top: -300px; left: 100px;" href="http://localhost/acae/salir.html" class="btn btn-outline-danger" role="button" aria-pressed="true">Salir</a>
<div class="dropdown">
  <a style="position:relative; top: -338px; left: -110px;" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    CANSAT
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <?php
	foreach ($nombres as $cansat){
		echo '<a class="dropdown-item" href="http://localhost/acae/dashboard.php?nombre='.$cansat.'">'.$cansat.'</a>';
	}
  ?>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>