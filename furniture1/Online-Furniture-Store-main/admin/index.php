<?php
$pdo = new PDO('mysql:dbname=furniture;host=127.0.0.1', 'student', 'student', [PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION ]);
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Fran's Furniture - Home</title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: 10:00-16:00</p>
			</aside>
			<h1>Fran's Furniture</h1>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/furniture.php">Our Furniture</a></li>
			<li><a href="/about.html">About Us</a></li>
			<li><a href="/contact.php">Contact us</a></li>
			<li><a href="/admin/logout.php">Logout</a></li>

		</ul>

	</nav>
<img src="/images/randombanner.php"/>
<main class="admin">



<?php
	if (isset($_POST['submit'])) {
		if (isset($_POST['username']) && isset($_POST['password'])) {  /* for the username */ 
			$stmt = $pdo->prepare("SELECT * FROM user WHERE username = ?");
			$stmt->execute([$_POST['username']]);  /*to execute the criteria*/ 
			$user = $stmt->fetch();
			if (password_verify($_POST['password'], $user['password'])) {  /*to verify the password */ 
				$_SESSION['loggedin'] = true;  /*logging in if true */ 
			}
		}
	}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>

	<section class="left">
<ul>	<li><a href="furniture.php">Furniture</a></li>

	<li><a href="categories.php">Categories</a></li>
			<li><a href="users.php">Users</a></li>
			<li><a href="addupdate.php">Update Home Screen</a></li>
			<li><a href="customercontacts.php">Customer Contacts</a></li>
</ul>
	</section>

	<section class="right">
	<h2>You are now logged in</h2>
	</section>
	<?php
} else {
    ?>
		<h2>Log in</h2>

		

		<form action="index.php" method="post" style="padding: 40px">
			<label>Username</label>
			<input type="text" name="username" />
			<label>Enter Password</label>
			<input type="password" name="password" />
			<input type="submit" name="submit" value="Log In" />
		</form>



	<?php
}
?>

</main>
	<footer>
		&copy; Fran's Furniture <?php

echo date("Y");

?>
	</footer>
</body>
</html>

