<?php
header('Content-Type: application/json');

include 'base.php';
$sql = "INSERT INTO cansat (nombre,temperatura, x, y,z)
VALUES ('".$_POST['nombre']."', '".$_POST['temperatura']."', '".$_POST['x']."','".$_POST['y']."','".$_POST['z']."')";
echo $sql;

$conn->query($sql);

?>