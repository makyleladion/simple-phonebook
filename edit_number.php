<?php 
	require_once 'connect.php';
    $get_id = $_GET['contact_id'];
    $phonenum_id = $_GET['phonenum_id'];
	$title = "Phonebook System";
    $header = "Edit Number";
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
                                        <?php
                                            $sql = "SELECT * from contact_num WHERE phonenum_id = '$phonenum_id' ";
                                            $result = $conn->query($sql); 

                                            if($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()) {
                                                    $phonenum_id = $row['phonenum_id'];
                                                  ?>
                                                  <input class="form-control" type="hidden" name="phonenum_id" id="phonenum_id" placeholder="Enter contact number" value="<?php echo $phonenum_id; ?>" required>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Number</label>
                                                        <input class="form-control" type="text" name="contact_no" id="contact_no" placeholder="Enter contact number" value="<?php echo $row['number']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Line</label>
                                                        <input class="form-control" type="text" name="line" id="line" placeholder="Enter line" value="<?php echo $row['line']; ?>" required>
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
                            <div class="panel-footer">
                                <button type="submit" name="edit_number" class="btn btn-default">Save</button>
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