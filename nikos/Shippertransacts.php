<?php
 include('connection.php');
  include('theme/header.php');

 	?>
 	<?php include('theme/sidebar.php');?>
 <div class="col-lg-12">
                <?php
						$Shipper_id = $_POST['Shipper_id'];
					    $Company_Name = $_POST['Company_Name'];
				
					switch($_GET['action']){
						case 'add':			
								$query = "INSERT INTO shippers
								(Shipper_id, Company_Name)
								VALUES ('".$Shipper_id."','".$Company_Name."')";
								mysqli_query($db,$query)or die (mysqli_error($db));;
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "shipperadd.php";
		</script>
                    </div>