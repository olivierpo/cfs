<!Doctype html>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
</head>
<body>
    <form method="post">
        <input type="submit" name="Tomorrow" id="Tomorrow" value="Tomorrow's Events" /><br/>
    </form>

    
	<?php
        function TomorrowEvent()
        {
        echo "Your test function on button click is working";
        }

        if(array_key_exists('Tomorrow',$_POST)){
        TomorrowEvent();
        }


        echo '<br />';
		$con = mysqli_connect('localhost', 'root', '');
		$db = mysqli_select_db($con, 'cfs');

		if($con){
			echo "List of public events on " . date("Y/m/d");
		}
    	else {
    		die('error');
    	}


    	$query = mysqli_query($con, "SELECT * FROM reservations");
    	

    	while($row = mysqli_fetch_array($query)){
            $approved = $row['APPROVED'];
            if ($approved == "0") {
                continue;
            }

    		$id = $row['RESERVATION_ID'];
    		$name = $row['DESCRIPTION'];
            $start = substr($row['START_TIME'], 11);
            $end = substr($row['END_TIME'], 11);
            $room = $row['ROOM_ID'];

    		echo '<br />';
    		echo '<br />';
        	echo $name . ' at room ' . $room. ' from ' . $start . ' to ' . $end. ' (Reservation ID: '  . $id . ')' . '<br />';

    	}
	?>

</body>
</html>

