<?php 
	include 'function.php';
	$pdo = pdo_connect_mysql();
	
	session_start();
	$con = new mysqli("127.0.0.1", "root", "", "scrollid");
	
	$a = $con->query("SELECT address FROM email WHERE address = '{$_SESSION['email']}'");
	
	$vote = false;

	if($a->num_rows > 0){
		$vote = true;
	}

	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		$res = $con->query("INSERT INTO email VALUE (NULL, '{$_SESSION['email']}')");
		$emailId = $con->insert_id;
		
		$postId = $_POST['radio'];

		if($_POST['radio'] == 0){
			$res = $con->query("INSERT INTO polls VALUE (NULL, '{$_POST['topicNew']}')");
			$postId = $con->insert_id;
		}

		$con->query("INSERT INTO poll_answers VALUE ('$postId', '$emailId')");

	}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="votepage.css">
	<title>Vote a Topic</title>
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
	                    <a href="email.php">Create a Topic</a>
	                </div>
	            </span>
				<span><a href="aboutUs.html">ABOUT US</a></span>
			</div>
		</div>
	</header>

	<main>
		
		<h1 style="padding-top: 5vh;">VOTE A TOPIC!</h1>
		<div class="mid">
			<div>
				<img class="ppl1" src="assets/ppl1.png">
			</div>

			<div class="vote-part">
				<?php
					$con = new mysqli("127.0.0.1", "root", "", "scrollid");
					$res = $con->query("SELECT id, title, (
					    SELECT count(*) FROM poll_answers WHERE poll_id = polls.id
					)as p
					FROM polls");
					$sum = $con->query("SELECT *
					FROM poll_answers")->num_rows;
					while ($row = $res->fetch_assoc()) {
				?>
				<form method="POST">
				<div class="vote-part-text">
					<div><p><?php echo $row["title"]; ?></p></div>
					<!-- <div class="percentage"><p>
						<?php echo $row['p']; ?>
					</p></div> -->
				</div>

				<div class="voteimg">
					<div><img class="votebar" src="assets/votebar.png"></div>
					<div class="result-bar" style= "width:<?=@round(($row['p']/$sum)*51.2)?>vw">
	                <?=@round(($row['p']/$sum)*100)?>%
	            	</div>
					<label class="container">
					  <input type="radio" name="radio" value="<?= $row['id'] ?>" >
					  <span class="checkmark"></span>
					</label>
				</div>
				
				<?php } ?>
				<!-- <div class="vote-part-text">
					<div><p>BTS</p></div>
					<div class="percentage"><p>50%</p></div>
				</div>
				<div class="voteimg">
					<div><img class="votebar" src="assets/votebar.png"></div>
					<label class="container">
					  <input type="radio" name="radio">
					  <span class="checkmark"></span>
					</label>
				</div>

				<div class="vote-part-text">
					<div><p>Artificial Intelligence</p></div>
					<div class="percentage"><p>0%</p></div>
				</div>
				<div class="voteimg">
					<div><img class="votebar" src="assets/votebar.png"></div>
					<label class="container">
					  <input type="radio" name="radio">
					  <span class="checkmark"></span>
					</label>
				</div> -->

				
				<div class="voteimg">
					<input class="type" name="topicNew" placeholder="You can also type your own here!"/>
					<label class="container">
					  <input type="radio" name="radio" value="0">
					  <span class="checkmark"></span>
					</label>
				</div>
				
				<div class="button-container" style="color: white; font-weight: bold;">
					<?php if($vote == true){
						echo("YOU ALREADY VOTED");
					}
					else{ ?>
					<button>VOTE</button>

				<?php } ?>
					
				</div>
				</form>
				<br>
				<div class="under-button">
					<p>one email can only vote once each month, choose wisely :)</p>
				</div>
			</div>
			
			<div>
				<img class="ppl2" src="assets/ppl2.png">
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
	<script type="assets/JavaScript/"></script>
</body>
</html>