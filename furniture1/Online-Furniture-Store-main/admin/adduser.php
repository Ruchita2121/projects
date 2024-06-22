<?php /* Starting with a new php code */
 $pdo = new PDO('mysql:dbname=furniture;host=127.0.0.1', 'student', 'student',[PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION ]);/*this line of code will help to connect to the existing database*/
session_start();/* from here the coding for the webpage starts*/
?>
<!DOCTYPE html>
<html><!--this line of code starts with html tag -->
	<head><!--this code starts the head tag -->
		<link rel="stylesheet" href="/styles.css"/><!--this code will include the css file  -->
		<title>Fran's Furniture - Home</title><!--this code will represent the title of the webpage -->
	</head><!--here the head tag is closed  -->
	<body><!--we start with the body of the webpage -->
	<header><!--here we start with the header of the page -->
		<section>
			<aside><!-- the following information on the side of the webpage is put here -->
				<h3>Opening Hours:</h3><!--this represents the opening hours of the frans furniture  -->
				<p>Mon-Fri: 09:00-17:30</p><!--this line will show the week timings and days  -->
				<p>Sat: 09:00-17:00</p><!--for the weekend saturday the timings are included  -->
				<p>Sun: 10:00-16:00</p>
			</aside><!--the side tag ends here as the information we wanted on the side is over  -->
			<h1>Fran's Furniture</h1><!--the header tag has heading number one here  -->
</section>
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

if (isset($_POST['submit'])) {

    $stmt = $pdo->prepare('INSERT INTO user (username, password, name) VALUES (:username, :password, :name)'); /* insert into table called user */

    $criteria = [
        'username' => $_POST['username'],/* for username */
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT), /*  to enter the password*/
        'name' => $_POST['name'], /* for name */
    ];

    $stmt->execute($criteria); /* to execute the criteria */
    echo 'User added';
} else {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { /*for security of the page  */
        ?>

			<h2>Add User</h2>  <!-- header to add new user -->

			<form action="" method="POST">  <!--using method post  -->
				<label>Username</label>  <!-- for the username -->
				<input type="text" name="username" />
				<label>Password</label>
				<input type="password" name="password" />
				<label>Name</label>  <!-- display for name -->
				<input type="text" name="name" />  <!--textbox for name  -->


				<input type="submit" name="submit" value="Add User" />  <!--to submit the form  -->

			</form>


		<?php
} else {
        ?>
			<h2>Log in</h2>

			<form action="index.php" method="post">  <!-- new form tag  -->
				<label>Username</label>
				<input type="text" name="username" />

				<label>Password</label> <!-- for the password -->
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />  <!--  to submit the filed info-->
			</form>
		<?php
}

}
?>


</section><!--we close another section tag here -->
	</main><!--the main tag is closed here -->
	<footer><!--here we start with the footer tag -->
		&copy; Fran's Furniture <!--this is terms and condition notice --><?php

echo date("Y");/*this php code helps to get the existing date */

?>
	</footer><!-- we close the footer tag here -->
</body><!-- body tag is closed here -->
</html><!--html tag is closed here  -->
