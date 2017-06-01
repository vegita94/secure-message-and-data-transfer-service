<?php 
    include "database/des_db_con.php";
    
    if(isset($_POST['email']))
    {
        $email=$_POST['email'];
        $sql="SELECT * FROM user WHERE email='$email'";
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