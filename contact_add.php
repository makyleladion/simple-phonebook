<?php 
	require_once 'connect.php';
	$title = "Phonebook System";
	$header = "Add New Contact";
	require_once 'header.php';


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
                            <a href="index.php" class="pull-right">Back</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                                	<?php
                                        $sql = "SELECT contact_id from contact_details";
                                        $result = $conn->query($sql); 

                                        if (empty($result->num_rows)) { 
                                            $id="1" ;  
                                        }else{
                                            $result = $conn->query("SELECT max(contact_id) maxid from contact_details");
                                            $myrow = $result->fetch_assoc();
                                            $id=$myrow['maxid']+1;
                                        }
                                    ?>
                                    <div class="col-lg-6">
                                            <input class="form-control" type="hidden" name="contact_id" id="contact_id" placeholder="" value="<?php echo $id; ?>" readonly>
                                                                          
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Enter firstname" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Enter lastname" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input class="form-control" type="text" name="age" id="age" placeholder="Enter age" required>
                                        </div>                                   
                                	</div>
                                	<div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Number</label>
                                            <input class="form-control" type="text" name="contact_no" id="contact_no" placeholder="Enter contact number" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Line</label>
                                            <input class="form-control" type="text" name="line" id="line" placeholder="Enter line" required>
                                        </div>                                       
                                	</div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                        	<button type="submit" name="add_contact" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                    <!-- /.panel -->
                    </form>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->





<?php require_once 'footer.php'; ?>