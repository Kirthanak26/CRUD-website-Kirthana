<HTML>
	<head></head><body>
<?php
//delete.php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {//Check it is coming from a form
		//mysql credentials
	require_once 'login.php';
	
	$item = $_POST["delete"];
	
	$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "Delete FROM Books WHERE book_id='" . $_POST['delete'] . "'";
	$result = $conn->query($sql);
	echo"book_id #".$item." has been deleted.";	
	echo"<br><form action= 'update.php' method = 'get'>";
	echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form>";
	}
else{
    echo ("error");
    }         
?>
</body>
</HTML>