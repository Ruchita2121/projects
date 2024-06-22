<?php /* Starting with a new php code */
 $pdo = new PDO('mysql:dbname=furniture;host=127.0.0.1', 'student', 'student',[PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION ]);/*this line of code will help to connect to the existing database*/
session_start();/* from here the coding for the webpage starts*/
?>
<!DOCTYPE html><!--the html codes of the webpage starts here  -->
<html><!--this line of code starts with html tag -->
	<head>
		<link rel="stylesheet" href="/styles.css"/><!--this code will include the css file  -->
		<title>Fran's Furniture - Home</title><!--this code will represent the title of the webpage -->
	</head><!--here the head tag is closed  -->
	<body><!--we start with the body of the webpage -->
	<header>
		<section><!--one of the sections start here with the section tag -->
			<aside><!--this tag will help to put the following information on the side of the webpage -->
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p><!--this line will show the week timings and days  -->
				<p>Sat: 09:00-17:00</p><!--for the weekend saturday the timings are included  -->
				<p>Sun: 10:00-16:00</p><!-- this  help to show the timings for sunday -->
			</aside><!--the side tag ends here as the information we wanted on the side is over  -->
			<h1>Fran's Furniture</h1><!--the header tag has heading number one here  -->
</section><!--the first section  closed here  -->
	</header><!-- header tag is closed here  -->
	<nav><!--here we start with the nav tag -->
		<ul><!--all links are added in this tag -->
			<li><a href="/">Home</a></li><!--this link will open the home page -->
			<li><a href="/furniture.php">Our Furniture</a></li><!--this link will open the public furniture page -->
			<li><a href="/about.html">About Us</a></li>
			<li><a href="/contact.php">Contact us</a></li><!--this specific link will open the contacts page -->
			<li><a href="/admin/logout.php">Logout</a></li><!--this will logout of the admin page  -->
</ul><!--here we close the ul tag -->
</nav><!--the nav class is closed here  -->
<img src="/images/randombanner.php"/><!--this will get image for the partial background  -->
	<main class="admin"><!--here we enter in the main class called admin -->
<section class="left"><!--now we enter into new section class on the left of the page  -->
		<ul><!-- we start with the new ul tag-->
			<li><a href="furniture.php">Furniture</a></li><!-- this link will open the furniture page-->
			<li><a href="categories.php">Categories</a></li>
			<li><a href="users.php">Users</a></li><!--this link will open the adding users page  -->
			<li><a href="addupdate.php">Update Home Screen</a></li><!-- we can update the homepage on this specific link which opens-->
			<li><a href="customercontacts.php">Customer Contacts</a></li><!--this link will open the customer contacts -->
</ul><!--we close the ul tag here  -->
	</section><!--section tag is closed here  -->
<section class="right"><!--new section on the right is open here  -->



	<?php

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>


			<h2>Categories</h2>  <!--header for categories  -->

			<a class="new" href="addcategory.php">Add new category</a>  <!-- new class -->

			<?php
			echo '<table>';  
			echo '<thead>'; /* to echo  */
			echo '<tr>';
			echo '<th>Name</th>'; /* for name */
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			$categories = $pdo->query('SELECT * FROM category'); /* selecting from the table categories*/

			foreach ($categories as $category) {
				echo '<tr>';
				echo '<td>' . $category['name'] . '</td>'; /* for category */
				echo '<td><a style="float: right" href="editcategory.php?id=' . $category['id'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deletecategory.php"> 
				<input type="hidden" name="id" value="' . $category['id'] . '" />  
			   	<input type="submit" name="submit" value="Delete" /> 
				</form></td>';
				echo '</tr>';/* echo for category */
			}

			echo '</thead>';
			echo '</table>'; /* data from table */

		}

		else {
			?>
			<h2>Log in</h2>  <!-- to logon -->

			<form action="index.php" method="post" style="padding: 40px">
			<label>Username</label>
			<input type="text" name="username" />  <!--  for username-->
			<label>Enter Password</label>
			<input type="password" name="password" />  <!-- textbox for password -->
			<input type="submit" name="submit" value="Log In" />
		</form>
		<?php
		}
	?>


</section><!--we close another section tag here -->
	</main>
	<footer><!--here we start with the footer tag -->
		&copy; Fran's Furniture <!--this is terms and condition notice --><?php

echo date("Y");/*this php code helps to get the  date */

?>
	</footer><!-- we close the footer tag here -->
</body><!-- body tag is closed here -->
</html>
