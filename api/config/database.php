<?php
class Database
{
	private $servername = 'localhost';
	private $username = 'root';
	private $password = '';
	private $dbname = 'cfs';
	public $connection;

	public function getConnection()
	{
		$this->connection = null;

		try
		{
			$this->connection = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
			$this->connection->exec("set names utf8");
		}
		catch(PDOException $exception)
		{
			echo "Connection error: " . $exception->getMessage();
		}
		return $this->connection;
	}
}
?>