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

// Messages sent to the user
$sql="select message.messageID,message.fromUserID, message.title,message.time,user.firstname, user.name from message,user where message.toUserID=$uid and message.fromUserID=user.userID";

// Messages sent to the courses, where the user is responsible
$sql2="select message.messageID,message.fromUserID, message.title,message.time,user.firstname, user.name from message,user,course where message.toCourseID=course.courseID and course.responsible=$uid and message.fromUserID=user.userID";

// Messages sent to the courses, that the user is visiting
$sql3="select message.messageID,message.fromUserID, message.title,message.time,user.firstname, user.name from message,user,course,studentcourse where message.toCourseID=course.courseID and course.courseID=studentcourse.idcourse and studentcourse.idStudent=$uid and message.fromUserID=user.userID";

$res = array();

$result = mysql_query($sql , $conn);

if($result){
  $nbRows = mysql_num_rows($result);

  // arrayType can be : MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
  while ( $row = mysql_fetch_array($result, MYSQL_ASSOC)){
    $res[$row['time']]= $row;
  }
 }

 else{
   echo mysql_error();
 }

$result2 = mysql_query($sql2 , $conn);

if($result2){
  $nbRows = mysql_num_rows($result2);

  // arrayType can be : MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
  while ( $row = mysql_fetch_array($result2, MYSQL_ASSOC)){
    $res[$row['time']]= $row;
  }
 }

 else{
   echo mysql_error();
 }


$result3 = mysql_query($sql3 , $conn);

if($result3){
  $nbRows = mysql_num_rows($result3);

  // arrayType can be : MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
  while ( $row = mysql_fetch_array($result3, MYSQL_ASSOC)){
    $res[$row['time']]= $row;
  }
 }

 else{
   echo mysql_error();
 }


mysql_close($conn);

ksort($res);
?>

<html>
<head><title>University Marks Manager: View Messages</title>
<link rel="stylesheet" href="mainstyle.css" type="text/css" />
</head>
<body>
<div class="container">
<div class='top'>
<div class="title"><h1>University Marks Manager: View Messages</h1></div>
<?php
echo "<div class='login'>You are logged in as $firstName $name</div>";?>
</div> <!-- end of div top -->
<?php
include('menu.php');
?>

<div class="content">
<h2>Messages</h2>
<?php
foreach($res as $time => $row){
  echo "<div class='line'><a href='message.php?messageID=".$row['messageID']."'>".$row['title']."</a> from:".$row['firstname']." ".$row['name']." ($time) </div>";

}

?>
</div>
<?php
include('footer.php');
?>
</div>


</body>