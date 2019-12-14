<?php
function actualizar(){
include "base.php";
$sql = "SELECT id,nombre, temperatura, x,y,z FROM cansat WHERE nombre='Hola'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		json_encode( $row["temperatura"]);
		
    }
} else {
    echo "0 results";
}
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>The JavaScript setInterval() Method</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    var myVar;    
    function showTime(){
         jQuery.ajax({
    type: "POST",
    url: 'http://localhost/acae/test.php',
    dataType: 'json',
    data: {functionname: 'actualizar'},

    success: function (obj, textstatus) {
                  if( !('error' in obj) ) {
                      yourVariable = obj.result;
                  }
                  else {
                      console.log(obj.error);
                  }
            }
});
    }
    function stopFunction(){
        clearInterval(myVar); // stop the timer
    }
    $(document).ready(function(){
        myVar = setInterval("showTime()", 1000);
    });
</script>
</head>
<body>
    <p id="demo"></p>
    <button onclick="stopFunction()">Stop Timer</button>
</body>
</html>
