<?php

require_once('connect.php');
session_start();
$logged = false;

if(isset($_SESSION['userID'])){
  $uid = $_SESSION['userID']; 
  $me = $_SESSION['userID']; 
  $name = $_SESSION['name'];
  $firstName=$_SESSION['firstName'];
  $level=$_SESSION['level'];
 }
if(isset($_GET['studentID'])){
  $uid=$_GET['studentID'];
 }




$sql="select user.name, user.firstName, course.name as courseName, studentcourse.mark, course.courseID from user,studentcourse,semester,course where userID='$uid' and semester.default='1' and semester.semesterID=course.semesterID and user.userID=studentcourse.idStudent and studentcourse.idCourse=course.courseID";

$result = mysql_query($sql , $conn);

if($result){
  $nbRows = mysql_num_rows($result);
  $res = array();
  // arrayType can be : MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
  while ( $row = mysql_fetch_array($result, MYSQL_ASSOC)){
    $courseName=$row['courseName'];
    $mark=$row['mark'];
    $courseID=$row['courseID'];
    $studentName=$row['name'];
    $studentFirstName=$row['firstName'];
    $res[]= array('course'=>$courseName, 'mark'=>$mark, 'courseID'=>$courseID);
  }
 }

 else{
   echo mysql_error();
 }
mysql_close($conn);

?>

<html>
<head><title>University Marks Manager: Student Home-page</title>
<link rel="stylesheet" href="mainstyle.css" type="text/css" />
</head>
<body>

<div class="container">
<div class='top'>
<div class="title"><h1>University Marks Manager: Student Home-Page</h1></div>
<?php
echo "<div class='login'>You are logged in as $firstName $name</div>";?>
</div> <!-- end of div top -->
<?php
include('menu.php');
?>
<div class="content">
<h2>Welcome to the system</h2>
<?php
   if($uid!=$me){
     echo "Notes of the student: <b>$studentFirstName $studentName</b> (id=$uid)<br />";
     echo "<a href='message-user.php?userID=$uid'>Contact </a>";
   }

foreach($res as $row){
  if($row['mark']!= -1){
    echo "<div class='line'>".$row['course']." : ".$row['mark']."(<a href='message-course.php?courseID=".$row['courseID']."'>Message to all</a>)</div>";
  }
  else{
    echo "<div class='line'>".$row['course']." : NA*</div>";
  }
}

?>

<div class='footnote'>* NA= Not available</div>
</div>
<?php
include('footer.php');
?>
</div>

</body>