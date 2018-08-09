<?php

//headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/room.php';

$database = new Database();
$db = $database->getConnection();

$room = new Room($db);

$stmt = $room->read();
$num = $stmt->rowCount();

if($num>0)
{
	$rooms_arr = array(); 
	$rooms_arr['rooms'] = array();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		extract($row);

		$room_item=array(
			"ID" => $ROOM_ID,
			"BUILDING" => $BUILDING,
			"ROOM NUMBER" => $ROOM_NUM,
			"CAPACITY" => $CAP
		);
		array_push($rooms_arr["rooms"], $room_item);
	}

	echo json_encode($rooms_arr, JSON_PRETTY_PRINT);
}
else
{
	echo json_encode(
		array("message" => "No items found.")
	);
}

?>