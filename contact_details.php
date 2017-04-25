<?php 
	require_once 'connect.php';
	$title = "Phonebook System";
    $header = "Contact Details";
	require_once 'header.php';
    $get_id = $_GET['contact_id'];
?>

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $header; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contact Details
                             <a href="edit_contact.php?<?php echo 'contact_id='.$get_id; ?>" class="pull-right">Edit</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" action="contact_add.php" method="post"> 
                                <div class="col-lg-6">
                                	<?php
                                        $sql = "SELECT * from contact_details WHERE contact_id = '$get_id' ";
                                        $result = $conn->query($sql); 
                                        $row = $result->fetch_assoc();
                                    ?>                                  
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Enter firstname" value="<?php echo $row['firstname']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Enter lastname" value="<?php echo $row['lastname']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input class="form-control" type="text" name="age" id="age" placeholder="Enter age" value="<?php echo $row['age']; ?>" readonly>
                                        </div>                                  
                                </div>
                                </form>
                                
                            </div>
                            <!-- /.row (nested) -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contact Number
                            <a href="add_number.php?<?php echo 'contact_id='.$get_id; ?>" class="pull-right">Add New</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                                                 
                                
                                    <?php
                                        $sql = "SELECT * from contact_num WHERE fk_contact = '$get_id' ";
                                        $result = $conn->query($sql); 

                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()) {
                                                $phonenum_id = $row['phonenum_id'];
                                              ?>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <input class="form-control" type="text" name="contact_no" id="contact_no" placeholder="Enter contact number" value="<?php echo $row['number']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label>Line</label>
                                                    <input class="form-control" type="text" name="line" id="line" placeholder="Enter line" value="<?php echo $row['line']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    &nbsp;<label>Edit</label> &nbsp;|&nbsp; <label>Delete</label><br>
                                                    <a href="edit_number.php?<?php echo 'contact_id='.$get_id; ?>&<?php echo 'phonenum_id='.$phonenum_id; ?>">
                                                        <button name="edit" class="btn btn-primary btn-sm fa fa-edit" title="Edit Contact"></button>
                                                    </a>&nbsp;
                                                    <a href="includes.php?<?php echo 'phonenum_id='.$phonenum_id; ?>">
                                                        <button name="delete" class="btn btn-danger btn-sm delbutton fa fa-trash" onclick="return confirm('Are you sure you wish to delete this Record?');" title="Delete Contact"></button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                   
                                                </div>
                                            </div>
                                              <?php
                                            }
                                          }else{
                                            echo "0 results";
                                          }
                                    ?>                                      
                                                                           
                                
                                
                            </div>
                            <!-- /.row (nested) -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->





<?php require_once 'footer.php'; ?>