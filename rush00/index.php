<html>
	<head>
	<link rel="stylesheet" href="./styles/styles.css">
	<title></title>
	</head>
	<body class="index">
		<div class="top">
			<H1 id="header">Welcome to our sneaker shop</h1>
			<div class="login">
				<form name="login" method="post">
						<input type="submit" name="login" value="LOGIN" id="login_button"/>
					</div>
						<div class="register">
						<input type="submit" name="register" value="REGISTER" id="register_button"/>
					</div>
				</form>
		</div>
	</body>
</html>
<?php
	session_start();
	if (isset($_POST['login']))
		header('Location: ./login/login.php');
	else if (isset($_POST['register']))
		header('Location: ./login/register.php');

?>