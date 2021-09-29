<?php	
			session_start();
			if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
				echo "Please log in first to see this page.";
				header("Location: sign-in.php");
				die();	
			}
		?>
<!DOCTYPE html>
<html>
	<head>
		<title>Fake NASA Admin Page</title>
		<meta charset="UTF-8">
		<meta name="author" content="Dominyka Razanovaitė and Parmenion Charistos">
		<link rel="stylesheet" href="style/admin.css">
	</head>
	<body>
		<?php
			$file_name="";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$file_name=$_POST["news_file"];
			}
		?>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			<div class="grid-admin">
				<?php echo "<h1 class=\"grid-item-admin\" id=\"header\">Welcome to the admin's area, " . $_SESSION['username'] . "!</h1>"; ?>
				<label id="path-label" class="grid-item-admin" for="news_file">Enter a path to news file (json):</label>
				<input class="grid-item-admin" type="text" name="news_file" id="news_file" placeholder="e.g. media/Ass2News.json" value="<?php echo $file_name;?>"></input>
				<input id="submit-button" class="grid-item-admin" type="submit" value="Apply" formaction="./first-page.php"></input>
			</div>
		</form>
	</body>
</html>
</DOCTYPE>
