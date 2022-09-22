<?php 

	session_start();
	require_once 'connect.php';

	function querydb($db)
	{
		global $con;
		$query = mysqli_query($con, $db);
		return $query;
	}
 ?>