<?php
       
       include('connection.php');
       include('theme/header.php');
       
        ?>  

<?php
			 $zz= $_POST['supid'];
                $n = $_POST['nme'];
                $a = $_POST['address'];
                $c = $_POST['city'];
                $p = $_POST['province'];
		
	 			$query = 'UPDATE supplier set  supname="'.$n.'",
					Address ="'.$a.'", City ="'.$c.'",
					Province ="'.$p.'" WHERE
					Supplier_id ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "Suppliertable.php";
		</script>