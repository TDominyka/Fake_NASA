<?php
	function if_exists($name,$pass){
		try{
			$pdo = new PDO('mysql:host=localhost;dbname=demo_nasa', 'dominyka', 'fliperis'); //connecting to db
			$statement = $pdo->query("SELECT username, user_password FROM users"); 
			$row = $statement->fetch(PDO::FETCH_ASSOC); //returns one row at a time
			while($row!=""){
				if(htmlentities($row['username'])==$name && password_verify($pass,htmlentities($row['user_password']))){
					return true;
				}
				$row = $statement->fetch(PDO::FETCH_ASSOC);
			}
		}catch(PDOException $e) {
			echo "<script>console.log('ERROR: ". $e->getMessage() . "' );</script>";
		}
		
		//an old way with json file
		
		/*$users=json_decode(file_get_contents("users.json"),true);
		foreach($users["admins"] as $admin){
			echo password_hash($admin["password"], PASSWORD_DEFAULT) . PHP_EOL;
			if($admin["username"]==$name && password_verify($pass,$admin["password"])){
				return true;
			}
		}*/ 
		
		return false;
	}
	function register($name,$pass){
		try{
			$pdo = new PDO('mysql:host=localhost;dbname=demo_nasa', 'dominyka', 'fliperis');
			$password=password_hash($pass, PASSWORD_DEFAULT);
			$query="insert into users(user_role, username, user_password) values('admin', '". $name ."','". $password."')";
			$pdo->exec($query); 
		}catch(PDOException $e) {
			echo "<script>console.log('ERROR: ". $e->getMessage() . "' );</script>";
		}
		
	}
?>
<?php	
			session_start();
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
				header("Location: admin.php");
				die();	
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
			if ($_SERVER["REQUEST_METHOD"] == "POST"){
				if ($_POST["submit"] == "Sign in" && if_exists($_POST["username"],$_POST["password"])) {
					session_start();
					$_SESSION['loggedin'] = true;
					$_SESSION['username'] = $_POST["username"];
					$_POST['password'] = "";
					echo "<script type=\"text/javascript\">
							window.location = \"admin.php\"
							</script>";
				}elseif($_POST["submit"] == "Register" && !if_exists($_POST["username"],$_POST["password"])){
					register($_POST["username"],$_POST["password"]);
				}
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
				<input class="grid-item button" type="submit" name="submit" value="Sign in" id="sign_in-button"></input>
				<input class="grid-item button" type="submit" name="submit" value="Register" id="register-button"></input>
			</div>
		</form>
	</body>
</html>
