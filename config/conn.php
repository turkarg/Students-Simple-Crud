<?php
class Database 
{
	public function __construct()
	{
		$servername = "remotemysql.com";
		$username = "wx2j0z2kNU";
		$password = "tZrl2EMoOV";
		$db = "wx2j0z2kNU";
		// Create connection
		global $conn;
		$conn = new mysqli($servername, $username, $password,$db);

		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		} else{
			 // echo 'Connected!';
		}
	}
}
?>