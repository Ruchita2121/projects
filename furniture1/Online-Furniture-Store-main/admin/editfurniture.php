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


	if (isset($_POST['submit'])) { /*after submitting   */

		$stmt = $pdo->prepare('UPDATE furniture /* variables in the furniture table */
								SET name = :name,
								    description = :description,
								    price = :price,
								    categoryId = :categoryId, /* for category */
									hide = :hide,
									`condition` = :condition /* for condition */
								   WHERE id = :id'
						);

		$criteria = [
			'name' => $_POST['name'],
			'description' => $_POST['description'], /* criteria for description */
			'price' => $_POST['price'],
			'categoryId' => $_POST['categoryId'], /*criteria for categoryid  */
			'hide' => isset($_POST['hide']) ? 1 : 0,
			'condition' => $_POST['condition'], /*criteria for condition  */
			'id' => $_POST['id'] /* for id */
		];

		$stmt->execute($criteria);

		if ($_FILES['image']['error'] == 0) {
			$fileName = $_POST['id'] . '.jpg';
			move_uploaded_file($_FILES['image']['tmp_name'], '../images/furniture/' . $fileName);
			/* for the iamge file */
		}

		echo 'Product saved'; /*after the product is saved   */
	}
	else {

			$furniture = $pdo->query('SELECT * FROM furniture WHERE id = ' . $_GET['id'])->fetch(); /*query for furniture  */


		?>

			<h2>Edit Furniture</h2>  <!-- to edit furniture -->

			<form action="editfurniture.php" method="POST" enctype="multipart/form-data"> <!--  action on the page-->

				<input type="hidden" name="id" value="<?php echo $furniture['id']; ?>" /> <!--  for the id -->
				
				
				<label>Hide Product</label>
				<input type="checkbox" name="hide" <?php if ($furniture['hide']) {echo "checked";}?> /> <!-- to check if hide the furniture -->

				

				<label>Name</label>
				<input type="text" name="name" value="<?php echo $furniture['name']; ?>" />

				<label>Description</label>
				<textarea name="description"><?php echo $furniture['description']; ?></textarea>

				<label>Condition</label>
				<select name="condition">
					<option value="1" <?php if ($furniture['condition'] == 1) {echo "selected";}?>>New</option>
					<option value="2" <?php if ($furniture['condition'] == 2) {echo "selected";}?>>Second hand</option>
				</select> <!-- for the condition of the furniture -->

				<label>Price</label>
				<input type="text" name="price" value="<?php echo $furniture['price']; ?>" /> <!-- for the price of the product -->

				<label>Category</label>

				<select name="categoryId"> <!-- for category id  -->

				

				<?php
					$stmt = $pdo->prepare('SELECT * FROM category');  /*data from table category  */
					$stmt->execute();

					foreach ($stmt as $row) {
						if ($furniture['categoryId'] == $row['id']) { /* for category id */
							echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
						}
						else {
							echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>'; /* for id and name */
						}

					}	

				?>

				</select>


				<?php
 
					if (file_exists('../images/furniture/' . $furniture['id'] . '.jpg')) { /*  for the image file*/
						echo '<img style="width: 200px; clear: both" src="../images/furniture/' . $furniture['id'] . '.jpg" />';
					}/*for the image file  */
				?>
				<label>Product Image </label> 
				<input type="file" name="image" /> 
				
				<input type="submit" name="submit" value="Save Product" />

			</form>

		<?php
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
