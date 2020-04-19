<?php 
	include 'function.php';
	$pdo = pdo_connect_mysql();
	
	session_start();
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$_SESSION['email'] = $_POST['email'];
		// die("asd");
		header("Location: votepage.php");
	}
	
	// $email = isset($_POST['email']) ? explode(PHP_EOL, $_POST['email']) : '';
	// if(is_array($email) || is_object($email)) {
 //    	foreach ($email as $email) {
 //    		if (empty($email)) continue;
 //    		$stmt = $pdo->prepare('INSERT INTO email VALUES (NULL, ?)');
 //    		$stmt->execute([$answers]);
 //    	}    
	// }
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="email.css">
	<title>Email</title>
	<script type="text/javascript" src="email.js"></script>
</head>


<body>
	<header class="d-flex flex-col">
		<h1><img class="logo" src="assets/logo.png"></h1>
		<div class="color-nav d-flex navBar">
			<div class="dempet">
				<span><a href="index.html">HOME</a></span>
				<span class="dropdown"><a href="">TOPIC ∇</a>
	                <div class="dropdown-content">
	                    <a href="index.html">Choose a Topic</a>
	                    <a href="">Create a Topic</a>
	                </div>
	            </span>
				<span><a href="aboutUs.html">ABOUT US</a></span>
			</div>
		</div>
	</header>

	<main>
		<div class="d-flex thumbnail">
			<div class="container">
				<div class="box">
					<div class="voteside1">
						<img class="vote1" src="assets/vote1.png">
						<img class="vote2" src="assets/vote2.png">
						<img class="vote4" src="assets/vote4.png">
					</div>

					<div class="vote">
						<div class="imgBox">
							<img src="./assets/ideas.png">
						</div>
						
						<div class="details">
							<div id="link" class="content">
								<h2>Before we get started,<br>mind telling us your email?</h2>
								<br>
								<form method="POST">
									<input id="email" type="email" name="email" placeholder="type your email here" style="font-size: 18px; width: 28vw; height: 5vh; border: none; border-radius: 50px;" onchange="checkEmail();" required/>
									<p id="emailValidation" class="notif">email must be filled to proceed</p>
									<br>
									<br>

									<div class="button-container">
										
											<button id="button" >SUBMIT</button>
										
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="voteside2">
						<img class="vote3" src="assets/vote3.png">
						<img class="vote5" src="assets/vote5.png">
					</div>
				</div>
			</div>
		</div>
	</main>

	<footer>
		<span class="social-media">
			<div class="icon-text">
				<div>
					<img class="icon" src="assets/location.svg" style="transform: scale(1.2);">
				</div>
				<div class="text">
					<h1 class="color-white">BLI</h1>
					<p>Sentul City, Jl. Pakuan No.3,<br>Sumur Batu, Babakan Madang,<br>Bogor, West Java 16810</p>
				</div>
			</div>
			<div class="icon-text">
				<div>
					<img class="icon" src="assets/phone.svg">
				</div>
				<div class="text">
					<p>+62 878 8979 267</p>
				</div>
			</div>
			<div class="icon-text">
				<div>
					<img class="icon" src="assets/mail.svg">
				</div>
				<div class="text">
					<p>scroll.id@gmail.com</p>
				</div>
			</div>
		</span>
		<div class="alignCenter copyright">
			<h4 style="color: white; margin-top: 38vh;">Copyright by SCROLL.ID 2020</h4>
		</div>
		<span class="about">
			<h1>About Us</h1>
			<p>Scroll.id is a group who strives to deliver information in a creative way using interactive animation and amazing visualization suitable for all ages, especially kids.</p>
			<br>
			<div>
				<span class="social-media">
					<a title="Facebook" target="blank" href="https://www.facebook.com"><img src="assets/facebook.svg"></a>
					<a title="Twitter" target="blank" href="https://www.twitter.com"><img src="assets/twitter.svg"></a>
					<a title="Instagram" target="blank" href="https://www.instagram.com"><img src="assets/instagram.svg"></a>
					<a title="Github" target="blank" href="https://www.github.com"><img src="assets/git.svg"></a>
				</span>
			</div>
		</span>
	</footer>
	<script src="assets/JavaScript/jquery-3.4.1.min.js"></script>
</body>
</html>