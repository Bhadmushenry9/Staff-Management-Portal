<?php
    require_once('includes/functions.php');
	if (isset($_SESSION['admin'])) {
		$admin = $_SESSION['admin'];

		$adminquery = querydb("SELECT * FROM admin WHERE adminmail='$admin'");
		if (mysqli_num_rows($adminquery) > 0) {
			$admin_fetch = mysqli_fetch_assoc($adminquery);
			
			$adminid = $admin_fetch['id'];
			$admin_full_name = $admin_fetch['full_name'];
			$admin_phone_number = $admin_fetch['adminnumber'];
			$admin_role = $admin_fetch['role'];
			$admin_password = $admin_fetch['adminpass'];
			$admin_profile_img = $admin_fetch['admin_profile_pic'];

		}
		else{
			header('location: login.php');
		}


		//permanent staff query
		$query_permanent_staff = querydb("SELECT * FROM permanent_staff");
		$count_permanent_staff = mysqli_num_rows($query_permanent_staff);

		//temporary staff query
		$query_temporary_staff = querydb("SELECT * FROM temporary_staff");
		$count_temporary_staff = mysqli_num_rows($query_temporary_staff);


		

	    
	   
		

	}

	else{
		header('location: login.php');
	}

	// 	$vehicle_query = querydb("SELECT * FROM vehicles WHERE userid='$user'");
	// 	$vehicle_count = mysqli_num_rows($vehicle_query);
	// 	if ($vehicle_count > 0) {
	// 		$vehicle_fetch = mysqli_fetch_assoc($vehicle_query);
	// 		$engine_no_fetch = $vehicle_fetch['engine_no'];
	// 		$vehiclepic = $vehicle_fetch['vehicle_img'];
	// 	}
		

	// }
	// else{
	// 	header('location: login.php');
	// }





?>