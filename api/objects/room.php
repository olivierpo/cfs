<?php
class Room{
	//database stuff
	private $connection;
	private $table_name = "rooms";
	
	//properties of room object
	public $ROOM_ID;
	public $BUILDING;
	public $ROOM_NUM;
	public $CAP;

	public function __construct($db)
	{
		$this->connection = $db;
	}

	public function read()
	{
		$query = "SELECT * from cfs.rooms";
		$stmt = $this->connection->prepare($query);

		$stmt->execute();

		return $stmt;
	}
}
?>	