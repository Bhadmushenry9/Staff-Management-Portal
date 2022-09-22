<?php require_once('includes/header2.php'); ?>
	<div class="loginmain">
		<div class="loginCard">
			<div class="login-btn splits">
				<p>Already an user?</p>
				<button class="active">Login</button>
			</div>
			<div class="rgstr-btn splits">
				<p>Don't have an account?</p>
				<button>Register</button>
			</div>
			<div class="wrapper">
				<form id="login" tabindex="500">
					<h3>Login</h3>
					<div class="mail">
						<input type="text" placeholder="Input Assigned Username">
						<label>Username</label>
					</div>
					<div class="passwd" placeholder="Input Assigned Password">
						<input type="password">
						<label>Password</label>
					</div>
					<div class="text-end p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					<div class="submit">
						<button class="dark">Login</button>
					</div>
				</form>
				<form id="register" tabindex="502">
					<h3>Register</h3>
					<div class="name">
						<input type="text">
						<label>Full Name</label>
					</div>
					<div class="role">
  						<select>
						    <option>Head Human Resource</option>
						    <option>Head Of Operation</option>
						    <option>General Manager</option>
						    <option>ICT Manager</option>
						</select>
					  <label>Role</label>
					</div>
					<div class="mail">
						<input type="email">
						<label>Email Address</label>
					</div>
					<div class="uid">
						<input type="text">
						<label>User Name</label>
					</div>

					<div class="passwd">
						<input type="password">
						<label>Password</label>
					</div>
					<div class="submit">
						<button class="dark">Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Plugins Js -->
	<script src="assets/js/common.min.js"></script>
	<!-- Extra page Js -->
	<script src="assets/js/pages/examples/login-register.js"></script>
</body>


<!-- Mirrored from www.einfosoft.com/templates/admin/atrio/source/lighthr/pages/examples/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Sep 2022 10:03:11 GMT -->
</html>