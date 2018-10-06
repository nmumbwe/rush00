<html>
	<head>
	<link rel="stylesheet" href="../styles/styles.css">
	</head>
	<body class="login_page">
		<h1 style="color: white;text-align: center;">Please Register</h1>
		<div class="login_form">
			<form method="post" class="login1">
				Username: <input type="text" name="login" value="<?php echo $_SESSION['login']?>" />
				<br />
				Password: <input type="password" name="passwd" value="<?php echo $_SESSION['password']?>">
				<br />
				<input type="submit" value="OK" name="submit">
			</form>
		</div>
	</body>
</html>
<?php
	$Y = 1;
	if (isset($_POST["submit"]) and $_POST['submit'] == "OK")
	{
		if (empty($_POST['login']) or empty($_POST['passwd']))
			header('location: ./register.php');
	}
	if (!file_exists("../private"))
		mkdir ("../private");
	else if (file_exists("../private/passwd"))
	{
		$check = unserialize(file_get_contents("../private/passwd"));
		foreach ($check as $key => $value)
		{
			if ($key["login"] == $_POST['login'])
			{
				echo "<html><body>That area is reserved for members only</body></html>\n";
				$Y = 0;
			}
		}
	}
	else if ($Y != 0)
	{
		$user = $_POST["login"];
		$passwd = hash("whirlpool", $_POST["passwd"]);
		$login[] = array("login" => $_POST["login"], "passwd" => $passwd);
		file_put_contents("../private/passwd", serialize($login));
		header('Location: ../shop/shop.php');
	}
?>