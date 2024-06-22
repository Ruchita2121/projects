


<?php
include('connection.php');
       include('theme/header.php');
        ?>  

<?php include('theme/sidebar.php'); ?>
<?php 
$query = 'SELECT * FROM Shippers
              WHERE
              Shipper_id ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $zz=$row['Shipper_id'];
                $i=$row['Company_Name'];
              }
              
              $id = $_GET['id'];
         
?>

             <center>
             <div class="col-lg-12">
                  <h2>Edit Records</h2>
                      <div class="col-lg-6">

                        <form role="form" method="post" action="Shipperedit1.php">
                            <div class="form-group">
                                <input type="hidden" name="Shipper_id" value="<?php echo $zz; ?>" />
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Company Name" name="comname" value="<?php echo $i; ?>">
                            </div>
                            
                            <button type="submit" class="btn btn-default">Update Record</button>
                         


                      </form>  
                    </div>
                </div>
                </center>
<?php include('theme/stickyfooter.php'); ?>