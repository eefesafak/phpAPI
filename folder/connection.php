<?php

error_reporting(0);


//getting database variables
$db_name = "odev3";
$mysql_username = "root";
$mysql_pass = "";
$server_name = "localhost";

//connection --> connect to db
$con = mysqli_connect($server_name, $mysql_username, $mysql_pass, $db_name);

//if we can not connect
if(!$con){
    echo '{"message":"Unable to connect to database"}';
    die();
}

/*
1- Get 
2- Insert
3- Update
4- Delete
*/

?>