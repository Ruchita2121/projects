
<?php
       
       include('connection.php');
       include('theme/header.php');
       
        ?>  

<body>
<?php

	

			if (!isset($_GET['do']) || $_GET['do'] != 1) {
								
	
			switch ($_GET['type']) {
				case 'shippers':
					$query = 'DELETE FROM shippers
							WHERE
							Shipper_id = ' . $_GET['id'];
						$result = mysqli_query($db, $query) or die(mysqli_error($db));
						
?>
			<script type="text/javascript">
				alert("Successfully Deleted.");
				window.location = "Shipperstable.php";
			</script>				
				
			<?php
			//break;
				}
			}
			?>

</body>
</html>