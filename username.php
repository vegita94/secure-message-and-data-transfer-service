<?php 
    include "database/des_db_con.php";

    if(isset($_POST['username']))
    {
        $username=$_POST['username'];
        $sql="SELECT * FROM user WHERE username='$username'";
        $rs=mysql_query($sql);
        if(mysql_num_rows($rs))
			{

				echo "1";


			}
        else{
            				echo "2";
        }
    }

?>
