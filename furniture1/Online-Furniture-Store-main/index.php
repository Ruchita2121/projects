<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title> Fran's Furniture - Home</title>
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
		<p>Welcome to Fran's Furniture. We're a family run furniture shop based in Northampton.
		 We stock a wide variety of modern and antique furniture including laps, bookcases, beds and sofas.</p>



		 <h3>Updates</h3>
<ol>
<?php
$pdo = new PDO('mysql:dbname=furniture;host=127.0.0.1', 'student', 'student', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$updatesQuery = $pdo->prepare('SELECT * FROM updates');
$updatesQuery->execute();
$numResults = $updatesQuery->rowCount();
if ($numResults > 0) {
    echo "<p>Total Number of updates: " . $numResults . "</p>";
    foreach ($updatesQuery as $update) {
        echo '<li>';
        echo '<p>' . $update['date'] . '</p>';
        $filename = 'images/updates/' . $update['id'] . '.jpg';
        if (file_exists($filename)) {
            echo '<a href="' . $filename . '"><img src="' . $filename . '" /></a>';
        }
        echo '<div class="details">';
        echo '<h2>' . $update['title'] . '</h2>';
        echo '<p>' . $update['description'] . '</p>';
        echo '</div>';
        echo '</li>';
    }
} else {
    echo "<h2>Do watch this space for updates</h2>";
}
?>
</ol>





















	</main>


	<footer>
		&copy; Fran's Furniture <?php

echo date("Y");

?>
	</footer>
</body>
</html>
