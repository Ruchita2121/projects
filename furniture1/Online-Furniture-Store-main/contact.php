<?php
$pdo = new PDO('mysql:dbname=furniture;host=127.0.0.1', 'student', 'student', [PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION ]);
session_start();
?><!DOCTYPE html>
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
			<li><a href="/faq.php">FAQs</a></li>

		</ul>

	</nav>
<img src="images/randombanner.php"/>
	<main class="home">

		
	
	
	
	<?php
	
	if (isset($_POST['submit'])) {

		$stmt = $pdo->prepare('INSERT INTO contact (name, emailaddress, telephone, enquiry)
		VALUES (:name, :emailaddress, :telephone, :enquiry)');

$criteria = [
	'name' => $_POST['name'],
	'emailaddress' => $_POST['emailaddress'],
	'telephone' => $_POST['telephone'],
	'enquiry' => $_POST['enquiry']
];

$stmt->execute($criteria);
	
	
echo "Thank you! We will contact you soon";
}
else{


?>
	
	
	<h2>Contact Details</h2>
	<form action="contact.php" method="POST" enctype="padding: 40px">

	<label>Name</label>
				<input type="text" name="name" />

				<label>email address</label>
				<input type="text" name="emailaddress" />
	
				<label>Telephone</label>
				<input type="text" name="telephone" />
	
				<label>Enquiry</label>
				<input type="text" name="enquiry" />
				<input type="submit" name="submit" value="Add" />
			</form>

<?php
		}
		
?>
			
	</main>


	<footer>
	<p>Please call us on  01604 90345 or email <a href="mailto:enquiries@fransfurniture.co.uk">enquiries@fransfurniture.co.uk</a>
	</p>
	&copy; Fran's Furniture <?php

echo date("Y");

?>
	</footer>
</body>
</html>
