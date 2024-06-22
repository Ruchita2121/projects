<?php
include('connection.php');
include('theme/header.php');
?>
<?php include('theme/sidebar.php'); ?>
<center>
<div class="col-lg-12">
                  <h2>Add new Records</h2>
                      <div class="col-lg-6">

                        <form role="form" method="post" action="Shippertransacts.php?action=add">
                            
            
                            
                            <div class="form-group">
                              <input class="form-control" placeholder="Shipper_id" name="Shipper_id">
                            </div>  
                            <input class="form-control" placeholder="Company_Name" name="Company_Name">
                            </div>  
                            <button type="submit" class="btn btn-default">Save Record</button>
                            <button type="reset" class="btn btn-default">Clear Entry</button>

  </form>  
                    </div>
</center>    
<?php include('theme/stickyfooter.php');?>     