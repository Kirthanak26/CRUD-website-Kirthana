<?php
//update_delete.php
if ($_GET['action'] == 'Go Back') 
    {
             //action for No
        header('Location: template.html');
        exit;   
    }
else
    {
        echo $book_ID;
        echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
    
        require_once 'login.php';
        $conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
            if ($conn->connect_error) 
            {
             die("Connection failed: " . $conn->connect_error);
            }

	
        $sql = "SELECT * FROM student WHERE studentID='" . $_POST['update'] . "'";
        $result = $conn->query($sql);

        $book_ID = $row[0];
        $title = $row[1];
        $author = $row[2];
        $genre = $row[3];
        
        if ($result->num_rows > 0)//will only do this if there is something to be returned from the above line
	        {
	            echo "<body>";
                while($row = $result->fetch_assoc())
		            {
                        // HTML to display the form on this page.
                        echo"Edit the information for".$row['title'].".";
	                    echo "<TABLE><TR><TH>book_ID</TH><TH>title</TH><TH>author</TH><TH>genre</TH></TR>";
                        echo "<TR>";
	                    echo "<TD>".$row['book_ID']. "</TD><TD>". $row['title']. "</TD><TD>". $row['author']. "</TD><TD>".$row['genre'] ."</TD></TR>";
	                    echo "<TR><TD><input type='text' value=".$row['book_ID']." author='field left' readonly></TD>";
	                    echo "<form action='changeItem.php' method = 'post'>";
                        echo "<TD><input type='text' placeholder='Full Name' name='lastName' class='advancedSearchTextBox'></TD>";
                        echo "<TD><select id='select' name='genre'>";
                       
                        echo "<option value='Fantasy' >Fantasy</option>";
                        echo "<option value='Fiction' >Fiction</option>";
                        echo "<option value='Sci fi' >Sci fi</option>";
                        echo "<option value='Nonfiction' >Nonfiction</option>";
                        echo "<option value='Mystery' >Mystery</option>";
                      
                        echo "</select></TD>";
                        echo "<TD><select id='select' name='genre'>";

                        echo "</select></TD></TR></TABLE>";
                        echo "<input name = 'create' type = 'submit' value = 'Submit Changes'>";
                        echo "</form>";
	                    
	                    
                    } 
                 echo "</body>";   
	        }
    }
?>
</HTML>