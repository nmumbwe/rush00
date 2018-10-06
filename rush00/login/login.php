<html>
	<head>
	<link rel="stylesheet" href="../styles/styles.css">
	</head>
	<body class="login_page">
		<h1 style="color: white;text-align: center;">Please login</h1>
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
$S = 1;
if (isset($_POST['submit']) and $_POST['submit'] == 'OK')
	{
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['passwd'] = $_POST['passwd'];
		if (!file_exists("../private"))
		{
			echo "<html><body>Error 1, no users found. Please register a new account</body></html>";
			$S = 0;
			unset($_SESSION['login']);
			unset($_SESSION['passwd']);
			header('Location: ../index.php');
		}
		else if (file_exists("../private/passwd") and $S != 0)
		{
			$check = unserialize(file_get_contents("../private/passwd"));
			echo "<>"
			foreach ($check as $key => $value)
			{
				if ($key["login"] == $_POST['login'] && $key["passwd"] == hash("whirlpool", $_POST['passwd']))
				{
					header('Location: ../shop/shop.php');
				}
			}
		}
	}
?>