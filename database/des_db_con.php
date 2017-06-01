<?php

/* this file is for database connection only 
   database name= des
   use for all php files which require des database
    
    */


if(mysql_connect("localhost","root",""))
{
    //this section indicates connection established
    
    if(mysql_select_db("des"))
    {
        //database DES found
    }
    else
    {
        echo "Server connected but database not found";
    }
}
else
{
    //this section indicates connection not established
    
    echo("Error:db1 Host database connection failed");
}


?>