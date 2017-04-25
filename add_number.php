<?php 
	require_once 'connect.php';
    $get_id = $_GET['contact_id'];
	$title = "Phonebook System";
    $header = "Add Number";
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
                    <form method="POST" action="includes.php">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Contact Number
                                 <a href="contact_details.php?<?php echo 'contact_id='.$get_id; ?>" class="pull-right">Back</a>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input class="form-control" type="hidden" name="contact_id" id="contact_id" value="<?php echo $get_id; ?>" required>
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
                                <button type="submit" name="add_number" class="btn btn-default">Save</button>
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