<?php
	session_start();
?>
<head>
	<link rel="stylesheet" type="text/css" href="./css/style_header.css">
</head>
	<header>
		<div class="container">
			<div id="branding">
				<!-- <h1><span class="highlight">ADP</span> Project</h1>				 -->
				<img src="./img/LOGO3.png">
			</div>
			<nav>
				<ul>
					<li ><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="problem.php">Problem Sets</a></li>
					<li><a href="rating.php">Rating Mechanism</a></li>
					<li><a href="faqs.php">FAQs</a></li>
					<?php
						if(isset($_SESSION["user"])){
							$name = $_SESSION["name"];
							echo "<li><a href=\"#\">Welcome $name </a></li>";
							echo '<li><a href="./includes/logout.inc.php">Logout</li>';
						}
						else{
							echo '<li><a href="login.php">Login</a></li>';
						}
					?>
					
				</ul>
			</nav>
		</div>
	</header>
	
