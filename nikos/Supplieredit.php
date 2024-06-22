


<?php
include('connection.php');
       include('theme/header.php');
        ?>  

<?php include('theme/sidebar.php'); ?>
<?php 
$query = 'SELECT * FROM supplier
              WHERE
              Supplier_id ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $zz= $row['Supplier_id'];
                $i= $row['supname'];
                $a=$row['Address'];
                $b=$row['City'];
                $c=$row['Province'];
              }
              
              $id = $_GET['id'];
         
?>

             <center>
             <div class="col-lg-12">
                  <h2>Edit Records</h2>
                      <div class="col-lg-6">

                        <form role="form" method="post" action="Supplieredit1.php">
                            
                            <div class="form-group">
                                <input type="hidden" name="supid" value="<?php echo $zz; ?>" />
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="supname" name="nme" value="<?php echo $i; ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Address" name="address" value="<?php echo $a; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="City" name="city" value="<?php echo $b; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Province" name="province" value="<?php echo $c; ?>">
                            </div> 
                            <button type="submit" class="btn btn-default">Update Record</button>
                         


                      </form>  
                    </div>
                </div>
                </center>
<?php include('theme/stickyfooter.php'); ?>