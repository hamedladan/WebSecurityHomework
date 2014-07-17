<?php

$host='localhost';
$user='root';
$pwd='';
$dbase='administrationSecurity';

$conn = @mysql_connect($server,$user,$pwd);
//$conn = @mysql_connect($server,$user);
/*
// A persistant connection should be established if the server
// should open a lot of connexions (which costs lot of time).
$conn = @mysql_pconnect($server,$user,$pass);
*/
if($conn){
  mysql_select_db($dbase, $conn);
}
else{
  mysql_error();
  die("The connection could not be established");
}
?>