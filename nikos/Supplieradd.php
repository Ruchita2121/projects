<?php
include('connection.php');
include('theme/header.php');
?>
<?php include('theme/sidebar.php'); ?>
<center>
                  <h2>Add new Records</h2>
                      <div class="col-lg-6">

                        <form role="form" method="post" action="Suppliertransacts.php?action=add">
                            
                            <div class="form-group">
                              <input class="form-control" placeholder="Supplier_id" name="Supplier_id">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="supame" name="supname">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Address" name="Address">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="City" name="City">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Province" name="Province">
                            </div> 
                            <button type="submit" class="btn btn-default">Save Record</button>
                            <button type="reset" class="btn btn-default">Clear Entry</button>


                      </form>  
                    </div>
</center>    
<?php include('theme/stickyfooter.php');?>     