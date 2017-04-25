<?php 
	require_once 'connect.php';
	$title = "Phonebook System";
    $header = "Edit Contact";
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
                    <form action="includes.php" method="post"> 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contact Details
                            <a href="contact_details.php?<?php echo 'contact_id='.$get_id; ?>" class="pull-right">Back</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                                <div class="col-lg-6">
                                	<?php
                                        $sql = "SELECT * from contact_details WHERE contact_id = '$get_id' ";
                                        $result = $conn->query($sql); 
                                        $row = $result->fetch_assoc();
                                    ?>                                  
                                        <input class="form-control" type="hidden" name="contact_id" id="contact_id"  value="<?php echo $row['contact_id']; ?>" required>
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Enter firstname" value="<?php echo $row['firstname']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Enter lastname" value="<?php echo $row['lastname']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input class="form-control" type="text" name="age" id="age" placeholder="Enter age" value="<?php echo $row['age']; ?>" required>
                                        </div>                                  
                                </div>
                                
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <button type="submit" name="edit_contact" class="btn btn-default">Save</button>
                        </div>
                    </div>
                    <!-- /.panel -->
                    </form>
                </div>               
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->





<?php require_once 'footer.php'; ?>