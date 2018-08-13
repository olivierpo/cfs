<?php

//headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/reservation.php';

$database = new Database();
$db = $database->getConnection();

$reservation = new Reservation($db);

$stmt = $reservation->read();
$num = $stmt->rowCount();

if($num>0)
{
	$reservations_arr = array(); 
	$reservations_arr['reservations'] = array();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		extract($row);

		$reservation_item=array(
			"RESERVATION ID" => $RESERVATION_ID,
			"START TIME" => $START_TIME,
			"END TIME" => $END_TIME,
			"DESCRIPTION" => $DESCRIPTION,
			"IS APPROVED" => $APPROVED,
			"BUILDING" => $BUILDING
		);
		array_push($reservations_arr["reservations"], $reservation_item);
	}

	echo json_encode($reservations_arr, JSON_PRETTY_PRINT);
}
else
{
	echo json_encode(
		array("message" => "No data found")
	);
}

?>