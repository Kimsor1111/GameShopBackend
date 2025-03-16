<?php
include '../Admin/connection/conect.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>

<body>
	<a href="../index.php" style="width: 70px; height: 40px; background: #573b8a; position: absolute; top:10px;left:10px;color: white; text-decoration: none; 
	border-radius: 10px;display: flex; justify-content: center; align-items:center;">
		Back
	</a>
	<a href="../Admin/login.php" style="width: 100px; height: 40px; background: #573b8a; position: absolute; top:10px;left:100px;color: white; text-decoration: none; 
	border-radius: 10px;display: flex; justify-content: center; align-items:center;">
		Admin Login
	</a>
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">
		<div class="signup">
			<form action="../Admin/model/User/action.php" method="post">
				<label for="chk" aria-hidden="true">Log in</label>
				<input type="email" name="email" placeholder="Email" required>
				<input type="password" name="pass" placeholder="Password" required>
				<button name="login" type="submit">Login</button>
				<div style="text-align: center; color: red;">
					<?php
					if (isset($_SESSION['msg']) != '') {
						echo $_SESSION['msg'];
					}
					?>
				</div>
			</form>
		</div>
		<div class="login">
			<form action="../Admin/model/User/action.php" method="post">
				<label for="chk" aria-hidden="true">Signup</label>
				<input type="text" name="name" placeholder="Username" required>
				<input type="email" name="email" placeholder="Email" required>
				<input type="password" name="pass" placeholder="Password" required>
				<button name="signup" type="submit">Sign up</button>
			</form>
		</div>
	</div>
	<?php session_destroy();?>
</body>

</html>

</body>

</html>