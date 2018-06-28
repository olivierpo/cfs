<html>
<head><title>testing php</title></head>

<?php

$name = $_GET['name'];
$room = $_GET['room'];
$starttimes = $_GET['stime'];
$endtimes = $_GET['etime'];

echo gettype($starttimes);
echo gettype($endtimes);

$con = mysqli_connect("localhost","my_user","test", "cfs");

// Check connection
if (mysqli_connect_errno()) // making sure connection worked
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$query = $con->prepare("SELECT * from rooms WHERE ROOM_NUM = ?");
$query->bind_param("s", $room);
$query->execute();
$query->store_result();
$query->bind_result($roomID, $building, $roomNum, $cap);
while($query->fetch())
{
    //might have to add another connection?
    // $query2 = $con->prepare("INSERT INTO reservations (START_TIME, END_TIME, ROOM_ID) VALUES (?, ?, ?)");
    // $query2->bind_param("ssi, $starttimes, $endtimes, $roomID");
    // $query2->execute();
    echo "col1=$roomID col2=$building col3=$roomNum col4=$cap\n";
}
$query->close();

if(1)
{
  //echo "room not in database"; // error check
}
else
{
  //echo "worked";
  // $sql = "INSERT INTO reservations (START_TIME, END_TIME, ROOM_ID)
  // VALUES (?, ?, ?)",
  // $starttimes, $endtimes, $room;
  //
  // if ($con->query($sql) === TRUE)
  // {
  //   echo "New record created successfully";
  // }
  // else
  // {
  //   echo "Error: " . $sql . "<br>" . $con->error;
  // }
}
// $sql = "INSERT INTO testing (name, room)
// VALUES ('$name', '$room')";
//
// if ($con->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $con->error;
// }
//
// $sql = "INSERT INTO testing2 (startTime, endTime)
// VALUES ($starttimes, $endtimes)";
//
// if ($con->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $con->error;
// }

?>

</body>
</html>
