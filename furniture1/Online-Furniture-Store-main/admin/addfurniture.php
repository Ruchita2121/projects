<?php /* Starting with a new php code */
 $pdo = new PDO('mysql:dbname=furniture;host=127.0.0.1', 'student', 'student',[PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION ]);/*this line of code will help to connect to the existing database*/
session_start();/* from here the coding for the webpage starts*/
?>
<!DOCTYPE html><!--the html codes of the webpage starts here  -->
<html>
	<head><!--this code starts the head tag -->
		<link rel="stylesheet" href="/styles.css"/><!--this code will include the css file  -->
		<title>Fran's Furniture - Home</title><!-- the title of the webpage -->
	</head><!--here the head tag is closed  -->
	<body>
	<header><!--here we start with the header of the page -->
		<section><!-- sections start here with the section tag -->
			<aside><!--this tag will help to put the following information on the side of the webpage -->
				<h3>Opening Hours:</h3><!-- the opening hours of the frans furniture  -->
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p><!--for  saturday the timings are included  -->
				<p>Sun: 10:00-16:00</p><!-- this code will help to show the timings for sunday -->
			</aside>
			<h1>Fran's Furniture</h1><!--the header tag has heading number one here  -->
</section><!--the first section has been closed here  -->
	</header><!--the  header tag is closed here  -->
	<nav><!--here we start with the nav tag -->
		<ul><!--all links are added under this tag -->
			<li><a href="/">Home</a></li><!--this link will open the home page -->
			<li><a href="/furniture.php">Our Furniture</a></li><!--this link will open the public furniture page -->
			<li><a href="/about.html">About Us</a></li>
			<li><a href="/contact.php">Contact us</a></li><!--this specific link will open the contacts page -->
			<li><a href="/admin/logout.php">Logout</a></li><!--this will logout of the admin page  -->
</ul><!--here we close the ul tag -->
</nav>
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

	if (isset($_POST['submit'])) { /*this is the submit button */

		$stmt = $pdo->prepare('INSERT INTO furniture (name, description, price, categoryId)
							   VALUES (:name, :description, :price, :categoryId)');/* to inserty values in the table called furniture*/

		$criteria = [/* the following are the criterias*/
			'name' => $_POST['name'],/*variable for name */
			'description' => $_POST['description'],/*variable for description */
			'price' => $_POST['price'],/*variable for price */
			'categoryId' => $_POST['categoryId'] /*variable for category */
		];/* those were the criterias required by the webpage*/

		$stmt->execute($criteria);/*to execute the criteria */

		if ($_FILES['image']['error'] == 0) {
			$fileName = $pdo->lastInsertId() . '.jpg';
			move_uploaded_file($_FILES['image']['tmp_name'], '../images/furniture/' . $fileName);/* this line of code is for image file to be inserted*/
			
		}

	echo 'Furniture added';/*after successful addition of furniture */
	}
	else {

		?>


			<h2>Add Furniture</h2><!-- new header  --> 

			<form action="addfurniture.php" method="POST" enctype="multipart/form-data"><!-- start of a form tag for new furniture  --> 
				<label>Name</label><!-- label for name   --> 
				<input type="text" name="name" /><!--textbox for name   --> 

				<label>Description</label> <!--  highlighting the description --> 
				<textarea name="description"></textarea> <!-- text box for description  --> 

				<label>Condition</label> <!-- for condition  --> 
				<select name="condition"> <!-- selecting the condition of the furniture  --> 
					<option value="1">New</option>
					<option value="2">Second hand</option>
				</select> <!--closing the select tag    --> 


				<label>Price</label> <!-- for price of the furniture  --> 
				<input type="text" name="price" /> <!--  text box for price --> 

				<label>Category</label>

				<select name="categoryId"> <!--  select tag for category --> 
				<?php
					$stmt = $pdo->prepare('SELECT * FROM category'); /* to give a category to the furniture*/
					$stmt->execute(); /* executing the category */

					foreach ($stmt as $row) {
						echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';/*getting the id amd the name */
					} /*taking the data from the database */

				?>

				</select>


				

				<label>Image </label> <!--label for image   --> 
				<input type="file" name="image" />
				
				
				<input type="submit" name="submit" value="Add" /><!-- to submit the image  --> 

			</form>



		<?php
		}
	



	?>


</section><!--we close another section tag here -->
	</main><!--the main tag is closed here -->
	<footer>
		&copy; Fran's Furniture <!--this is terms and condition notice --><?php

echo date("Y");/*this php code helps to get the existing date */

?>
	</footer>
</body><!-- body tag is closed here -->
</html><!--html tag is closed here  -->
