<?php

require_once('connect.php');
session_start();
$logged = false;
if(isset($_SESSION['userID'])){
  $uid = $_SESSION['userID']; 
  $name = $_SESSION['name'];
  $firstName=$_SESSION['firstName'];
 }




$sql="select user.name, user.firstName, user.userID from user,studentcourse,semester,course where coach='$uid' and semester.default='1' and semester.semesterID=course.semesterID and user.userID=studentcourse.idStudent and studentcourse.idCourse=course.courseID group by user.userID";
//$sql="select user.name, user.firstName, course.name as courseName, studentcourse.mark from user,studentcourse,semester,course where coach='$uid' and semester.default='1' and semester.semesterID=course.semesterID and user.userID=studentcourse.idStudent and studentcourse.idCourse=course.courseID";

$result = mysql_query($sql , $conn);

if($result){
  $nbRows = mysql_num_rows($result);
  $res = array();
  // arrayType can be : MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
  while ( $row = mysql_fetch_array($result, MYSQL_ASSOC)){
    //$courseName=$row['courseName'];
    //$mark=$row['mark'];
    $courseName='';
    $mark=0;
    $studentName=$row['name'];
    $studentFirstName=$row['firstName'];
    $studentUserID=$row['userID'];
    $res[]= array('studentName'=>$studentName,
		  'studentFirstName'=>$studentFirstName,
		  'userID'=>$studentUserID);
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
<div class="title"><h1>University Marks Manager: Prof Home-Page</h1></div>
<?php
echo "<div class='login'>You are logged in as $firstName $name</div>";?>
</div> <!-- end of div top -->
<?php
include('menu.php');
?>
<div class="content">
<h2>Students you coach</h2>

<?php
foreach($res as $row){
echo "<div class='line'>Student : <a href='student.php?studentID=".$row['userID']."'>".$row['studentFirstName']." ".$row['studentName']."</a> (<a href='message-user.php?userID=".$row['userID']."'>contact</a>)</div>";

}

?>
</div>
<?php
include('footer.php');
?>
</div>
</body>