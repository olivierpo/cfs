<!DOCTYPE html>
<html>
<body>

	<FORM method="POST" action="">
    	<INPUT type="text" name="search">
    	<INPUT type="submit" name ="button">
    	<input  type="text" name="start_input">
    	<input  type="text" name="end_input">
	</FORM>


<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'cfs';


$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['button'])){

	$starttime = $_POST['start_input'];
	$endtime = $_POST['end_input'];
	$building_name = $_POST['search'];

	$sql = "SELECT DISTINCT
				reservations.RESERVATION_ID, 
				rooms.BUILDING,
				rooms.ROOM_NUM,
				reservations.START_TIME,
				reservations.END_TIME,
				reservations.DESCRIPTION
			FROM 
				rooms,
				reservations
			WHERE
				reservations.ROOM_ID = rooms.ROOM_ID
				AND reservations.APPROVED = TRUE
				AND reservations.START_TIME >= '$starttime' 
				AND reservations.END_TIME <= '$endtime'
				AND rooms.BUILDING LIKE '%".$building_name."%'";

	if($result = $conn->query($sql)){
		echo "List of public events:" . "<br><br>";
		while($row = $result->fetch_assoc())
		{
			echo "Reservation ID: "  . $row['RESERVATION_ID'] . "<br>" . $row['BUILDING'] . ": " . $row['ROOM_NUM'] . "<br>" . $row['START_TIME'] . " - " . $row['END_TIME'] . "<br>" . $row['DESCRIPTION'] . "<br><br>";
		}
	}
}

$conn->close();
?>

</body>
</html>