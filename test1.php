<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "des");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$term = $mysqli->real_escape_string($_REQUEST['term']);
 
if(isset($term)){
    // Attempt select query execution
    $sql = "SELECT * FROM user WHERE username LIKE '" . $term . "%'";
    if($result = $mysqli->query($sql)){
        if($result->num_rows > 0){            
            while($row = $result->fetch_array()){
                echo "<p>" . $row['username'] . "</p>";
            }
            // Free result set
            $result->free();
        } else{
            echo "<p>No matches found</p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
 
// Close connection
$mysqli->close();
?>