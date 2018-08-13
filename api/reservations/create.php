<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';

include_once '../objects/reservation.php';

$database = new Database();
$db = $database->getConnection();

$reservation = new Reservation($db);

$data = json_decode(file_get_contents("php://input"));

$test = file_get_contents("php://input");

if($test)
{
	echo "Success";
}
else echo "Lol";
//set properties
$reservation->START_TIME = $data->START_TIME;
$reservation->END_TIME = $data->END_TIME;
$reservation->DESCRIPTION = $data->DESCRIPTION;
$reservation->APPROVED = 0;
$reservation->BUILDING = $data->BUILDING;

if($reservation->create())
{
	echo '{';
		echo '"message": "Product was created."';
	echo '}';
}

else
{
	echo '{';
        echo '"message": "Unable to create product."';
    echo '}';
}

?>