<?php
include('connection.php');
include('theme/header.php');
?>
<?php
include('theme/sidebar.php');?>
            <!-- Breadcrumbs-->
         <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Shipper</li>
          </ol> 

  <img src="ship1.jpg" alt="Mountain View" style="width:100%;height: 500px">
  <br>
  <br>

           <div class="col-lg-12">
                        <h2>Shippers Table</h2> <a href="Shipperadd.php?action=add" type="button" class="btn btn-xs btn-info">Add New</a>
                    </div>
                                
                        <div class="card-body">       
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTable" with="100%" cellspacing="0">
             
                        
                                <thead>
                                    <tr>
                                        <th>Shipper_id</th>
                                        <th>Company_Name</th>
                                        <th>Option</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php                  
                $query = 'SELECT * FROM Shippers';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['Shipper_id'].'</td>';
                            echo '<td>'. $row['Company_Name'].'</td>';
                           
                            echo '  <td> <a  type="button" class="btn btn-lg btn-warning fas fa-user-edit" href="Shipperedit.php?action=edit & id='.$row['Shipper_id'] . '"> EDIT </a> ';
                            echo ' <a  type="button" class="btn btn-lg btn-danger" href="Shipperdelete.php?type=shippers&delete & id=' . $row['Shipper_id'] . '">DELETE </a> </td>';
                            echo '</tr> ';
                }
            ?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


        <!-- Sticky Footer -->
        <?php
include('theme/stickyfooter.php');
?>