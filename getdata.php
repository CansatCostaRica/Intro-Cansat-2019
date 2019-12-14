<?php
header('Content-Type: application/json');

include 'base.php';
if(isset($_GET['nombre'])){
$nombre=$_GET['nombre'];
}
else{
$nombre='hola';
}
$datos=array();
$datosx=array();
$datosy=array();
$datosz=array();

$sql = 'SELECT id,nombre, temperatura, x,y,z FROM cansat WHERE nombre="'.$nombre.'"';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$float  = floatval($row["temperatura"]);
		array_push($datos, $float);
		$float  = floatval($row["x"]);
		array_push($datosx, $float);
		$float  = floatval($row["y"]);
		array_push($datosy, $float);
		$float  = floatval($row["z"]);
		array_push($datosz, $float);
		
    }
} else {
    echo "0 results";
}
$dato=end($datos);
$datox=end($datosx);
$datoy=end($datosy);
$datoz=end($datosz);
//echo $dato;

$data = [
	'temperatura' => $dato,
	'x' => $datox,
	'y' => $datoy ,
	'z' => $datoz,
	
];

echo json_encode($data);
?>