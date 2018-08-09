<?php
class Reservation{
	//database stuff
	private $connection;
	private $table_name = "reservations";
	
	//properties of room object
	public $RESERVATION_ID;
	public $START_TIME;
	public $END_TIME;
	public $DESCRIPTION;
	public $APPROVED;
	public $ROOM_ID;
	public $BUILDING;

	public function __construct($db)
	{
		$this->connection = $db;
	}

	public function read()
	{
		$query = "SELECT * from cfs.reservations";
		$stmt = $this->connection->prepare($query);

		$stmt->execute();

		return $stmt;
	}

	function create()
	{
		$query = "INSERT INTO
					" . $this->table_name . "
					SET
						START_TIME=:START_TIME,
						END_TIME:=END_TIME,
						DESCRIPTION:=DESCRIPTION
						APPROVED:=APPROVED";

		$stmt = $this->connection->prepare($query);

		//sanitize
		$this->START_TIME=htmlspecialchars(strip_tags($this->START_TIME));
		$this->END_TIME=htmlspecialchars(strip_tags($this->END_TIME));
		$this->DESCRIPTION=htmlspecialchars(strip_tags($this->DESCRIPTION));
		$this->APPROVED=htmlspecialchars(strip_tags($this->APPROVED));

		//binding
		$stmt->bindParam(":START_TIME", $this->START_TIME);
		$stmt->bindParam("END_TIME", $this->END_TIME);
		$stmt->bindParam("DESCRIPTION", $this->DESCRIPTION);
		$stmt->bindParam("APPROVED", $this->APPROVED);

		if($stmt->execute())
		{
			return true;
		}
		return false;
	}
}
?>	