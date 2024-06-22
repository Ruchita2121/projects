<?php
 include('connection.php');
 include('theme/header.php');
?>
<?php include('theme/sidebar.php');?>
 <div class="col-lg-12">
                <?php
						$Supplier_id = $_POST['Supplier_id'];
					    $supname = $_POST['supname'];
					    $Address = $_POST['Address'];
					    $City = $_POST['City'];
					    $Province = $_POST['Province'];
				
					switch($_GET['action']){
						case 'add':			
								$query = "INSERT INTO supplier
								(Supplier_id, supname, Address, City, Province)
								VALUES ('".$Supplier_id."','".$supname."','".$Address."','".$City."','".$Province."')";
								mysqli_query($db,$query)or die (mysqli_error($db));;
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "Supplieradd.php";
		</script>
                    </div>
                    <?php include('theme/stickyfooter.php');?>