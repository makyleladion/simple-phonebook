<?php 
	require_once 'connect.php';

	/* ADD NEW CONTACT */
	if (isset($_POST['add_contact'])) 
	{
		$contact_id = test_input($_POST['contact_id']);
		$firstname = test_input($_POST['firstname']);
		$lastname = test_input($_POST['lastname']);
		$age = test_input($_POST['age']);

		$contact_no = test_input($_POST['contact_no']);
		$line = test_input($_POST['line']);
		$line = strtoupper($line);
		$line = strtoupper($line);

		$query = "INSERT INTO contact_details (contact_id, firstname, lastname, age) VALUES ('$contact_id', '$firstname', '$lastname', '$age')";

		if ($conn->query($query)) 
		{
			$sql = $conn->query("INSERT INTO contact_num (fk_contact, number, line) VALUES('$contact_id','$contact_no','$line') ");
			?>
            <script>                
                window.location.href = "index.php"
            </script>
        	<?php
		}
	}

	/* ADD CONTACT NUMBER */
	if (isset($_POST['add_number'])) 
	{
		$contact_id = test_input($_POST['contact_id']);
		$contact_no = test_input($_POST['contact_no']);
		$line = test_input($_POST['line']);
		$line = strtoupper($line);

		$query = "INSERT INTO contact_num (fk_contact, number, line) VALUES('$contact_id','$contact_no','$line') ";

		if ($conn->query($query)) 
		{
			?>
            <script>                
                window.location.href = "contact_details.php?<?php echo 'contact_id='.$contact_id; ?>";
            </script>
        	<?php
		}
	}


	/* UPDATE CONTACT DETAILS */
	if (isset($_POST['edit_contact']))
	{
		$contact_id = test_input($_POST['contact_id']);
		$firstname = test_input($_POST['firstname']);
		$lastname = test_input($_POST['lastname']);
		$age = test_input($_POST['age']);

		$query = "UPDATE contact_details set firstname='$firstname', lastname='$lastname', age='$age' WHERE contact_id='$contact_id' ";

		if ($conn->query($query)) 
		{
			?>
            <script>                
                window.location.href = "contact_details.php?<?php echo 'contact_id='.$contact_id; ?>";
            </script>
            <?php	
		}
	}

	/* UPDATE CONTACT NUMBER */
    if (isset($_POST['edit_number'])) 
    {
    	$phonenum_id = test_input($_POST['phonenum_id']);
        $number = test_input($_POST['contact_no']);
        $line = test_input($_POST['line']);
        $line = strtoupper($line);

        $query = "UPDATE contact_num SET number='$number', line='$line' WHERE phonenum_id='$phonenum_id' ";

        $sql=$conn->query("SELECT fk_contact FROM contact_num WHERE phonenum_id='$phonenum_id' ");
        $row=$sql->fetch_assoc();

        $contact_id = $row['fk_contact'];


        if ($conn->query($query)) 
        {                
            ?>
            <script>                
                window.location.href = "contact_details.php?<?php echo 'contact_id='.$contact_id; ?>";
            </script>
            <?php
        }
    }

    /* DELETE CONTACT */
    if (isset($_GET['contact_id'])) 
    {
    	$contact_id = $_GET['contact_id'];
    	$query = "DELETE from contact_details WHERE contact_id='$contact_id' ";

        if ($conn->query($query)) 
        {                
        	$conn->query("DELETE from contact_num WHERE fk_contact='$contact_id' ");
            ?>
            <script>                
                window.location.href = "index.php";
            </script>
            <?php
        }
    }

    /* DELETE CONTACT NUMBER */
    if (isset($_GET['phonenum_id'])) 
    {
    	$phonenum_id = $_GET['phonenum_id'];
    	$query = "DELETE from contact_num WHERE phonenum_id='$phonenum_id' ";

    	$sql=$conn->query("SELECT fk_contact FROM contact_num WHERE phonenum_id='$phonenum_id' ");
        $row=$sql->fetch_assoc();

        $contact_id = $row['fk_contact'];


        if ($conn->query($query)) 
        {                
            ?>
            <script>                
                window.location.href = "contact_details.php?<?php echo 'contact_id='.$contact_id; ?>";
            </script>
            <?php
        }
    }
    

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>