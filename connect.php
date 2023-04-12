<html>
<body>

<?php

$dbname = 'simonel';
$dbuser = 'root';  
$dbpass = ''; 
$dbhost = 'localhost'; 

$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}

echo "Connection Success!<br><br>";

$voltageA = $_GET["voltageA"];
$currentA = $_GET["currentA"]; 
$dayasemuA = $_GET["dayasemuA"]; 
$dayanyataA = $_GET["dayanyataA"]; 
$dayareaktifA = $_GET["dayareaktifA"]; 

$voltageB = $_GET["voltageB"];
$currentB = $_GET["currentB"]; 
$dayasemuB = $_GET["dayasemuB"]; 
$dayanyataB = $_GET["dayanyataB"]; 
$dayareaktifB = $_GET["dayareaktifB"]; 


$query = "INSERT INTO pzem_data (voltageA, currentA, dayasemuA, dayanyataA, dayareaktifA, voltageB, currentB, dayasemuB, dayanyataB, dayareaktifB) VALUES ('$voltageA', '$currentA', '$dayasemuA', '$dayanyataA', '$dayareaktifA', '$voltageB', '$currentB', '$dayasemuB', '$dayanyataB', '$dayareaktifB')";
$result = mysqli_query($connect,$query);

echo "Insertion Success!<br>";

?>
</body>
</html>