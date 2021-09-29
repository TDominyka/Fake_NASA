<?php
	function if_exists($name,$pass){
		$users=json_decode(file_get_contents("users.json"),true);
		foreach($users["admins"] as $admin){
			echo password_hash($admin["password"], PASSWORD_DEFAULT) . PHP_EOL;
			if($admin["username"]==$name && password_verify($pass,$admin["password"])){
				return true;
			}
		}
		return false;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Fake NASA Admin Page</title>
		<meta charset="UTF-8">
		<meta name="author" content="Dominyka Razanovaitė and Parmenion Charistos">
		<link rel="stylesheet" href="style/sign-in.css">
	</head>
	<body>
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST" && if_exists($_POST["username"],$_POST["password"])) {
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $_POST["username"];
				$_SESSION['password'] = "";
				echo "<script type=\"text/javascript\">
						window.location = \"admin.php\"
						</script>";
			}
		?>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			<div class="grid" id="sign-in-grid">
				<div class="grid-item" id="logo"><img src="media/nasa-logo.svg" alt="NASA logo"></img></div>
				<div class="grid-item" id="title"><h1>Sign in</h1></div>
				<label class="grid-item" for="username" id="username-label">Username</label>
				<input class="grid-item" type="text" name="username" id="username" placeholder="e.g. IamMrNimbus"></input>
				<label class="grid-item" for="password" id="password-label">Password</label>
				<input class="grid-item" type="password" name="password" id="password" placeholder="e.g. NotYourBirthDate"></input>
				<input class="grid-item" type="submit" value="Sign in" id="submit-button"></input>
			</div>
		</form>
	</body>
</html>
