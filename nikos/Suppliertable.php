<?php
include('connection.php');
include('theme/header.php');
?>
<?php include('theme/sidebar.php');
include 'supbreadcrumbs.php';?>
    
          <!-- Breadcrumbs-->


           <div class="col-lg-12">
                        <h2>Suppliers Table</h2> <a href="Supplieradd.php?action=add" type="button" class="btn btn-xs btn-info">Add New</a>
                                
                        <div class="card-body">       
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTable" with="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Supplier_id</th>
                                        <th>supname</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Province</th>
                                         <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php                  
                $query = 'SELECT * FROM supplier';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['Supplier_id'].'</td>';
                            echo '<td>'. $row['supname'].'</td>';
                            echo '<td>'. $row['Address'].'</td>';
                            echo '<td>'. $row['City'].'</td>';
                            echo '<td>'. $row['Province'].'</td>';
                           
                            echo '  <td> <a  type="button" class="btn btn-lg btn-warning fas fa-user-edit" href="Supplieredit.php?action=edit & id='.$row['Supplier_id'] . '"> </a> ';
                            echo ' <a  type="button" class="btn btn-lg btn-danger fas fa-trash-alt" href="Supplierdelete.php?type=supplier&delete & id=' . $row['Supplier_id'] . '"> </a> </td>';
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
  <?php include('theme/stickyfooter.php');?>