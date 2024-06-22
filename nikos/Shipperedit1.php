<?php
       
       include('connection.php');
       include('theme/header.php');
       
        ?>  

<?php
			 $zz= $_POST['Shipper_id'];
                $cn = $_POST['comname'];
		
	 			$query = "UPDATE shippers set  Company_Name='".$cn."' WHERE
					Shipper_id ='".$zz."'";
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "Shipperstable.php";
		</script>