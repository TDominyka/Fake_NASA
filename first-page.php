<?php
		$pdo = new PDO('mysql:host=localhost;dbname=demo_nasa', 'root', ''); // $pdo = new PDO('mysql:host=localhost;dbname=demo_nasa', 'dominyka', 'fliperis'); //connecting to db
		$statement = $pdo->query("SELECT COUNT(*) as ids FROM news"); 
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$news_id=$row["ids"];
?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Fake NASA Page</title>
		<meta charset="UTF-8">
		<meta name="description" content="Fake NASA page for learning purposes">
		<meta name="keywords" content="NASA, learning, HTML, CSS, JS, JavaScript">
		<meta name="author" content="Dominyka Razanovaitė and Parmenion Charistos">
		<link rel="stylesheet" href="style/general.css">
		<link rel="stylesheet" href="style/header.css">
		<link rel="stylesheet" href="style/main-board.css">
		<link rel="stylesheet" href="style/footer.css">
		<?php
		function getNews($data,$id){
			try{
				$pdo = new PDO('mysql:host=localhost;dbname=demo_nasa', 'root', ''); // $pdo = new PDO('mysql:host=localhost;dbname=demo_nasa', 'dominyka', 'fliperis'); //connecting to db
				$statement = $pdo->query("SELECT title, description, category FROM news WHERE news_id=$id"); 
				$row = $statement->fetch(PDO::FETCH_ASSOC);
				switch($data){
					case "title":
						return htmlentities($row['title']);
					case "content":
						return htmlentities($row['description']);
					case "category":
						return htmlentities($row['category']);
					case "image";
						return getImage($id);
				}
			
			} catch(PDOException $e) {
				echo "<script>console.log('ERROR: ". $e->getMessage() . "' );</script>";
			}
			return false;
		}
		
		function getImage($id){
			$pdo = new PDO('mysql:host=localhost;dbname=demo_nasa', 'root', ''); // $pdo = new PDO('mysql:host=localhost;dbname=demo_nasa', 'dominyka', 'fliperis'); //connecting to db
			$sql = "SELECT image FROM news WHERE news_id=$id";
			$query = $pdo->prepare($sql);
			$query->execute();
			$query->bindColumn(1, $image, PDO::PARAM_LOB);
			$query->fetch(PDO::FETCH_BOUND);
			return $image;
		}
		?>
		
	</head>
	<body>
		<header class="grid-container"> 
			<div class="grid-item" id="logo"><img src="media/nasa-logo.svg" alt="NASA logo"></img></div>
			<ul class="grid-item">
				<li>Missions</li>
				<li>Galleries</li>
				<li>NASA TV</li>
				<li>Follow NASA</li>
				<li>Downloads</li>
				<li>About</li>
				<li>NASA Audiences</li>
			</ul>
			<form class="grid-item dropdown">
				<input id="search" type="text" placeholder="Search" onkeyup="suggest(this.value)"> </input>
				<input id="searchsubmit" type="submit" value=""></input>
				<div id="dd-menu" class="dropdown-menu">
					<a id="first-suggestion" href="#"></a>
					<a id="second-suggestion" href="#"></a>
					<a id="third-suggestion" href="#"></a>
					<a id="fourth-suggestion" href="#"></a>
					<a id="fifth-suggestion" href="#"></a>
				</div>
			</form>

			<img id="share" class="grid-item" src="media/share.svg" alt="Button for sharing on social media"></img>
			<div class="grid-item" id="secondmenu">
				<ul>
					<li>International Space Station</li><li>Journey to Mars</li><li>Earth</li><li>Technology</li><li>Aeronautics</li><li>Solar System and Beyond</li><li>Education</li><li>History</li><li>Benefits to You</li>
				</ul>
			</div>
		</header>

		<section id="main-board" class="grid-board">
			
			<div class="first-cell img-container mySlides">
				<?php
					echo "<img src=\"data:image/jpg;base64,".base64_encode( getNews("image",$news_id) )."\"/>";
					echo "<p class=\"category\">".getNews("category",$news_id)."</p>";
					echo "<div class=\"img-description\">
							<h4 id=\"carousel-text\">".getNews("title",$news_id)."</h4>
							<p>".getNews("content",$news_id--). "</p>
						</div>";
				?>
			</div>
						
			<div id="second-cell" class="img-container">
				<?php
					echo "<img id=\"second-img\" src=\"data:image/jpg;base64,".base64_encode( getNews("image",$news_id) )."\"/>";
					echo "<p class=\"category\">".getNews("category",$news_id)."</p>";
					echo "<div class=\"img-description\">
							<h4>".getNews("title",$news_id)."</h4>
							<p>".getNews("content",$news_id--). "</p>
						</div>";
				?>
			</div>
	
			<div id="events-box">
				NASA Events<hr></hr>
				<?php
					echo getNews("title",$news_id). PHP_EOL;
					echo getNews("content",$news_id--). PHP_EOL;
				?>
			</div>
				
			<div id="third-cell" class="img-container">
				<?php
					echo "<img id=\"third-img\" src=\"data:image/jpg;base64,".base64_encode( getNews("image",$news_id) )."\"/>";
					echo "<p class=\"category\">".getNews("category",$news_id)."</p>";
					echo "<div class=\"img-description\">
							<h4>".getNews("title",$news_id)."</h4>
							<p>".getNews("content",$news_id--). "</p>
						</div>";
				?>
			</div>
			
			<div id="fourth-cell" class="img-container">
				<?php
					echo "<img id=\"fourth-img\" src=\"data:image/jpg;base64,".base64_encode( getNews("image",$news_id) )."\"/>";
					echo "<p class=\"category\">".getNews("category",$news_id)."</p>";
					echo "<div class=\"img-description\">
							<h4>".getNews("title",$news_id)."</h4>
							<p>".getNews("content",$news_id--). "</p>
						</div>";
				?>
			</div>
			
			<div id="fifth-cell" class="img-container">
				<?php
					echo "<img id=\"fifth-img\" src=\"data:image/jpg;base64,".base64_encode( getNews("image",$news_id) )."\"/>";
					echo "<p class=\"category\">".getNews("category",$news_id)."</p>";
					echo "<div class=\"img-description\">
							<h4>".getNews("title",$news_id)."</h4>
							<p>".getNews("content",$news_id--). "</p>
						</div>";
				?>
				</div>
			</div>
			

			<div id="sixth-cell" class="img-container">
				<?php
					echo "<img id=\"sixth-img\" src=\"data:image/jpg;base64,".base64_encode( getNews("image",$news_id) )."\"/>";
					echo "<p class=\"category\">".getNews("category",$news_id)."</p>";
					echo "<div class=\"img-description\">
							<h4>".getNews("title",$news_id)."</h4>
							<p>".getNews("content",$news_id--). "</p>
						</div>";
				?>
			</div>
			
			<div id="seventh-cell" class="img-container">
				<video id="video" poster="style/images/thumbnail.png"> 
					<source src="media/Kate Rubins - Scientist in Space.mp4" type="video/mp4">
					Your browser does not support HTML video.
				</video>
				<button onclick="playPause()" id="play">
					<img id="play_butt_img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAD2ElEQVRoge2ZT2wUZRjGn3d2usqyUwOIAlusLcQ24bgEDp4gXiAxsQeCEUk8NKnrFmO8GpOaGM+K3S174WJJoDVRonLszQPYvUtjykbWhbR0D93JNt125vGwNTYzs50/+001ob/j+73fvM+z8+3M970D7LHH840oucoME/31xhnNxjlCshowTOAogPRWhkmgBuChgGWCc5Wl3geYELvb0l0ZOFFoHqfYeYDvE8iErFylLdO6pRX++DhVjaohkoGT1xuHLR1fAvgAQDJq8S1aAtzUE/x8Yaz3WdjJoQ0MFs33CH4L4GDYuT6sUDBeyRm3w0wKbCBbYk/dMosARkNLC4EQpQN6+lp5TDYC5QdJOlZi6kWr8T0hF7qTFwyS91q6cak2Jk2/XM0vIVtiz26KBwARufiCZd49NUPf/5evgbplFndT/DbeWntmfuOXtOMSGpwyr5CcVqcpPCTereSNO53GOxrITK4eSmryO4CXY1EWnHpPgkOdHrEdl1BSk6/w34sHgIMbtnzRadDTwMnrzT60X1KBmB3Zhzf7EhG0BYQYHSytveY15GnA1u1xhHjDZo8k8N3b++I0krQ3rZzXgNvABDUKr0SpEqcRTXgVM3Rd1GWg/0jjLIi+borFYYRAZmBlNeuMuwxoNs4pqQj1RgRy3hlzGRDK6a4rOVBlhBD/O2AL3ohcwQcFRoacAfcdaJ+kYiWyEbq1eT1G0x6xWIhgxHAGfDdz/3d0j5gJ9actT8pPLXz9Wwu/Vq2gUxrOgMsAgScSs4EIwtsInjhDLgMasUDBqejyOhNZ+L88dAbcd0A4D8hI1ApeKBAOACA574x5LCHOiaJ+lyrh/6AxMeeMuQxUlnofDLxiPgZwPGoh1cK3+HNxOVV2Bj12o2KTcitKhfJTC1d/WsOlH9ZUiwcht7xakV6PUeiWVrB061MEPBPcr7V/8fs1taK3sb4pWsFroONiHyw2pgh8GJeiUBCTj/LGNa+hjm/iVtL+DEDoXmUMrPToDHcmBoDq6Et1Cjxd7zK5nZq+O+6FKjnjthAl9ZoCU3j0kTG7U4LvZm7xcDovwI/qNAVFfulfSn/imxXkUsdKTCU3G7MicrF7YUGQn9cT+y8rae4CQG1Mmod04x0BbnQvzpdC/9L+kSDigQgfOF4vNC6LYBLqu3bLAPJ+a95J6ANNJW/cadkchqAIYD3sfA/WQUxuJO3hsOKBLj/y9U01M7ptj0u7ERZ27/SYkOlN0QrVXOqvqBrUbDsnqA28unpaIOe3Wh9DIDLY9pkVQBWCBZLzGhNzi8upsorPrHvs8bzzN6YVcIlux5q/AAAAAElFTkSuQmCC"/>
				</button>
			</div>

			<div id="eighth-cell" class="img-container">
				<?php
					echo "<img id=\"eighth-img\" src=\"data:image/jpg;base64,".base64_encode( getNews("image",$news_id) )."\"/>";
					echo "<p class=\"category\">".getNews("category",$news_id)."</p>";
					echo "<div class=\"img-description\">
							<h4>".getNews("title",$news_id)."</h4>
							<p>".getNews("content",$news_id--). "</p>
						</div>";
				?>
			</div>
			
			<div id="ninth-cell" class="img-container">
				<?php
					echo "<img id=\"ninth-img\" src=\"data:image/jpg;base64,".base64_encode( getNews("image",$news_id) )."\"/>";
					echo "<p class=\"category\">".getNews("category",$news_id)."</p>";
					echo "<div class=\"img-description\">
							<h4>".getNews("title",$news_id)."</h4>
							<p>".getNews("content",$news_id--). "</p>
						</div>";
				?>
			</div>
			
			<div id="tenth-cell" class="img-container">
				<?php
					echo "<img id=\"tenth-img\" src=\"data:image/jpg;base64,".base64_encode( getNews("image",$news_id) )."\"/>";
					echo "<p class=\"category\">".getNews("category",$news_id)."</p>";
					echo "<div class=\"img-description\">
							<h4>".getNews("title",$news_id)."</h4>
							<p>".getNews("content",$news_id--). "</p>
						</div>";
				?>
			</div>
		</section>
		
		<button id="more-stories">
			MORE STORIES
		</button>

		<footer>	
			<div id="footer-info">		
				<img src="media/nasa-logo.svg" alt="NASA logo"></img>
				<p> National Aeronautics and Space Administration </br> NASA Official: Brian Dunbar </p>
			</div>
			<ul>
				<li>No Fear Act</li>
				<li>FOIA</li>
				<li>Privacy</li>
				<li>Office of Inspector General</li>
				<li>Office of Special Counsel</li>
				<li>Agency Financial Reports</li>
				<li>Contact NASA</li>
				<li><a href="admin.php">Admin page</a></li>
			</ul>
		</footer>
	</body>
		<script type="text/javascript" src="js/animations.js"></script>
		<script>
			function suggest(str) {
				var nodes = document.getElementById("dd-menu").children;
				//If the search bar is empty, exit the function.
				if (str.length==0) {
					document.getElementById("search").innerHTML="";
					document.getElementById("search").style.border="0px";
					for (let i = 0; i < nodes.length; i++) {
						nodes[i].innerHTML = "";
					}
					return;
				}

				
				//Send the search bar's content to the server.
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.responseType = 'json';

				xmlhttp.open("GET","search.php?q="+str,true);

				xmlhttp.onload = function() {
					if (this.readyState === this.DONE && this.status === 200) {
						if (this.response !== null )
							for (let i = 0; i < this.response.length; i++) {
								nodes[i].innerHTML = this.response[i].substr(0,20) + "..<br>";
						} 
						else {
							for (let i = 0; i < nodes.length; i++) {
								nodes[i].innerHTML = "";
							}
						}
					}
				};
							
				xmlhttp.send();
			}
		</script>
	</html>
</DOCTYPE>
