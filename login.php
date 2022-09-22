<?php 

	require_once 'includes/functions.php';
	$page_title = 'Admin Login - Fresh FM NIgeria Staff Portal';

    $errors = "";

    if (isset($_POST['login'])) {
        $adminmail = $_POST['adminmail'];
        $adminpass = $_POST['adminpass'];

        if (empty($adminmail)) {
            $errors .= '<li>Email is required</li>'; 
        }
        if (empty($adminpass)) {
            $errors .= '<li>Password is required</li>'; 
        }

        if (empty($errors)) {
            $adminpassencrpt = md5($adminpass);
            $adminloginquery = querydb("SELECT * FROM admin WHERE adminmail = '$adminmail' AND adminpass = '$adminpass'");
            if (mysqli_num_rows($adminloginquery) > 0) {
                mysqli_fetch_assoc($adminloginquery);
                $_SESSION['admin'] = $adminmail;
                header('location: dashboard.php');
                exit;
            }
            else{
                $_SESSION['msg'] = '<div class="alert alert-danger">Email or Password is incorrect!</div>';
            }
        }
        else{
            $_SESSION['msg'] = '<div class="alert alert-danger">We found the following error(s):<ul>'.$errors.'</ul></div>';
        }
    }
	require_once('includes/header2.php');

?>


<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="">
					<span class="login100-form-title p-b-45">
						Admin Login
					</span>
					<?php 
						if (isset($_SESSION['msg'])){
							echo($_SESSION['msg']);
							unset($_SESSION['msg']);
						} 
					 ?>
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: hbtechng@freshfmnigeria.com">
						<input class="input100" type="email" name="adminmail">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="adminpass">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
					<div class="flex-sb-m w-full p-t-15 p-b-20">
						<div class="form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" value=""> Remember me
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
						</div>
						<div>
							<!-- <a href="#" class="txt1">
								Forgot Password?
							</a> -->
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>
					<!-- <div class="text-center p-t-45 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>
					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fab fa-twitter"></i>
						</a>
					</div> -->
				</form>
				<div class="login100-more" style="background-image: url('assets/images/pages/bg-01.png');">
				</div>
			</div>
		</div>
	</div>
	<!-- Plugins Js -->
	<script src="../../assets/js/common.min.js"></script>
	<!-- Extra page Js -->
	<script src="../../assets/js/pages/examples/pages.js"></script>
</body>

</html>