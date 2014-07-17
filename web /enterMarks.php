<?php
require_once('connect.php');
session_start();
$logged = false;
if(isset($_SESSION['userID'])){
  $uid = $_SESSION['userID']; 
  $name = $_SESSION['name'];
  $firstName=$_SESSION['firstName'];
  $level=$_SESSION['level'];
 }

$courseID = $_POST['courseID'];

$marks = array();

foreach($_POST as $key => $value){
  if(preg_match('/^student(\d+)$/',$key,$match)){
      $marks[$match[1]]=$value;      
    }
}

foreach($marks as $studentID => $mark){
  $query = "UPDATE studentcourse SET mark = $mark WHERE idStudent =$studentID and idCourse=$courseID LIMIT 1" ;
  mysql_query($query , $conn);
}

mysql_close($conn);

if($level == 3){
  header("Location: admin2.php");
 }
 else{
   header("Location: prof2.php");
 }
exit;

?>