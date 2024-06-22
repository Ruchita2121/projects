<?php /* Starting with a new php code */
 $pdo = new PDO('mysql:dbname=furniture;host=127.0.0.1', 'student', 'student',[PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION ]);/*this line of code will help to connect to the existing database*/
session_start();/* from here the coding for the webpage starts*/
?>
<!DOCTYPE html><!--the html codes of the webpage starts here  -->
<html><!--this line of code starts with html tag -->
	<head><!--this code starts the head tag -->
		<link rel="stylesheet" href="/styles.css"/><!--this code will include the css file  -->
		<title>Fran's Furniture - Home</title><!--this code will represent the title of the webpage -->
	</head><!--here the head tag is closed  -->
	<body><!--we start with the body of the webpage -->
	<header><!--here we start with the header of the page -->
		<section><!--one of the sections start here with the section tag -->
			<aside><!--this tag will help to put the following information on the side of the webpage -->
				<h3>Opening Hours:</h3><!--this represents the opening hours of the frans furniture  -->
				<p>Mon-Fri: 09:00-17:30</p><!--this line will show the week timings and days  -->
				<p>Sat: 09:00-17:00</p><!--for the weekend saturday the timings are included  -->
				<p>Sun: 10:00-16:00</p><!-- this code will help to show the timings for sunday -->
			</aside><!--the side tag ends here as the information we wanted on the side is over  -->
			<h1>Fran's Furniture</h1><!--the header tag has heading number one here  -->
</section><!--the first section has been closed here  -->
	</header><!--the main header tag is closed here  -->
	<nav><!--here we start with the nav tag -->
		<ul><!--all links are added under this tag -->
			<li><a href="/">Home</a></li><!--this link will open the home page -->
			<li><a href="/furniture.php">Our Furniture</a></li><!--this link will open the public furniture page -->
			<li><a href="/about.html">About Us</a></li><!--this page will open then link about the sellers who are frans furniture -->
			<li><a href="/contact.php">Contact us</a></li><!--this specific link will open the contacts page -->
			<li><a href="/admin/logout.php">Logout</a></li><!--this will logout of the admin page  -->
</ul><!--here we close the ul tag -->
</nav><!--the nav class is closed here  -->
<img src="/images/randombanner.php"/><!--this will get image for the partial background  -->
	<main class="admin"><!--here we enter in the main class called admin -->
<section class="left"><!--now we enter into new section class on the left of the page  -->
		<ul><!-- we start with the new ul tag-->
			<li><a href="furniture.php">Furniture</a></li><!-- this link will open the furniture page-->
			<li><a href="categories.php">Categories</a></li><!--this code will open the link that opens categories page -->
			<li><a href="users.php">Users</a></li><!--this link will open the adding users page  -->
			<li><a href="addupdate.php">Update Home Screen</a></li><!-- we can update the homepage on this specific link which opens-->
			<li><a href="customercontacts.php">Customer Contacts</a></li><!--this link will open the customer contacts -->
</ul><!--we close the ul tag here  -->
	</section><!--section tag is closed here  -->
<section class="right"><!--new section on the right is open here  -->


	<?php


		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { /*to login */

			$stmt = $pdo->prepare('DELETE FROM user WHERE id = :id'); /*deleting from the table user*/
			$stmt->execute(['id' => $_POST['id']]); /*executing the id*/

			echo 'User deleted'; /* after the user is deleted*/

		}

		else {
			?>
			<h2>Log in</h2>

			<form action="index.php" method="post" style="padding: 40px">
			<label>Username</label>
			<input type="text" name="username" />
			<label>Enter Password</label>
			<input type="password" name="password" />  <!-- for password-->
			<input type="submit" name="submit" value="Log In" />
		</form>
		<?php
		}
	?>

</section><!--we close another section tag here -->
	</main>
	<footer><!--here we start with the footer tag -->
		&copy; Fran's Furniture 
        <?php

echo date("Y");/*this php code helps to get the existing date */

?>
	</footer><!-- we close the footer tag here -->
</body><!-- body tag is closed here -->
</html><!--html tag is closed here  -->
