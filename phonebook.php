<?php 
    require_once 'connect.php';
    $title = "Phonebook System";
    require_once 'header.php';


?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Phonebook</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">                        
                        <div class="panel-heading">
                            <?php 
                                $sql = $conn->query("SELECT * FROM contact_details");
                                if ($sql->num_rows > 0) 
                                {
                                    $count = $sql->num_rows;
                                }
                                else
                                {
                                    $count = 0;
                                }
                               

                            ?>
                            Phonebook (<?php echo $count; ?>)
                            <a href="contact_add.php" class="pull-right">Add New</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Age</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                  $sql = "SELECT * FROM contact_details";
                                  $result = $conn->query($sql);

                                  if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()) {
                                      $id=$row['contact_id'];
                                      ?>
                                        <tr class="odd gradeX">
                                        <td><?php echo $row['firstname']; ?></td>
                                        <td><?php echo $row['lastname']; ?></td>
                                        <td><?php echo $row['age']; ?></td>
                                        <td>
                                            <a href="contact_details.php<?php echo '?contact_id='.$id; ?>">
                                                 <button name="edit" class="btn btn-info btn-sm fa fa-phone" title="View Contact"></button>
                                            </a>
                                            <a href="includes.php?<?php echo 'contact_id='.$id; ?>">
                                                <button name="delete" class="btn btn-danger btn-sm delbutton fa fa-trash" onclick="return confirm('Are you sure you wish to delete this Record?');" title="Delete Contact"></button>
                                            </a>
                                        </td>
                                    </tr>
                                      <?php
                                    }
                                  }else{
                                    echo "0 results";
                                  }
                                    
                                ?>
                                                              

                                </tbody>
                            </table>      

                          


                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php require_once 'footer.php'; ?>


