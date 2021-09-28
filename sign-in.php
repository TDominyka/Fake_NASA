<!DOCTYPE html>
<html>
	<head>
		<title>Fake NASA Admin Page</title>
		<meta charset="UTF-8">
		<meta name="author" content="Dominyka Razanovaitė and Parmenion Charistos">
	</head>
	<body>
		<?php
			//needs checking if this user exists.
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $_POST["username"];
				echo "<script type=\"text/javascript\">
						window.location = \"admin.php/\"
						</script>";
			}
		?>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			<label for="username">Username:</label>
			<input type="text" name="username" id="username"></input>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password"></input>
			<input type="submit"></input>
		</form>
	</body>
</html>
