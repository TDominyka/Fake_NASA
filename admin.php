<?php
	session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
				echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
			} else {
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
	</head>
	<body>
		<?php
			$file_name="";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$file_name=$_POST["news_file"];
			}
		?>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			<label for="news_file">Enter a path to a news file (json):</label>
			<input type="text" name="news_file" id="news_file" placeholder="e.g. media/Ass2News.json" value="<?php echo $file_name;?>"></input>
			<input type="submit" formaction="./first-page.php"></input>
		</form>
	</body>
</html>
</DOCTYPE>
