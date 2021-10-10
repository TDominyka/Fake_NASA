<?php	
		session_start();
		if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
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
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["title"]!="") {				
				$pdo = new PDO('mysql:host=localhost;dbname=demo_nasa', 'dominyka', 'fliperis'); //connecting to db
				$img_file=addslashes(file_get_contents($_FILES['image_file']['tmp_name']));
				$query = "INSERT INTO news (category, title, description, image) VALUES('".$_POST["category"]."','".$_POST["title"]."','". $_POST["content"]."','$img_file')"; 
				$rows=$pdo -> exec($query);
			}
		?>
		
	</head>
	<body>
		<form enctype="multipart/form-data" method="post" action="./first-page.php">  
			<div class="grid-admin">
				<?php echo "<h1 class=\"grid-item-admin\" id=\"header\">Welcome to the admin's area, " . $_SESSION['username'] . "!</h1>"; ?>
				<?php 
					if($rows==1 && $_SERVER["REQUEST_METHOD"] == "POST" ){
						echo "<h4 class=\"grid-item-admin\" id=\"response\">Your news successfully saved to database!</h4>"; 
					}elseif($_SERVER["REQUEST_METHOD"] == "POST"){
						echo "<h4 class=\"grid-item-admin\" id=\"response\">Something went wrong with saving your news!</h4>";
					}
						
				?>
				
				<input class="grid-item-admin input-text" type="text" id="title" name="title" placeholder="title"></input>	
				<input class="grid-item-admin input-text" type="text" id="content" name="content" placeholder="content"></input>
				<input class="grid-item-admin input-text" type="text" id="category" name="category" placeholder="category"></input>	

				<input type="hidden" name="MAX_FILE_SIZE" value="3000000"></input>
				<input id="image_file" class="grid-item-admin input-text" type="file" name="image_file" placeholder="image_file"></input>	
				
				<input id="apply" class="grid-item-admin button" type="submit" value="Apply"></input></br></br>
				<input id="save" class="grid-item-admin button" type="submit" value="Save" formaction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"></input>
			</div>
		</form>
	</body>
</html>
