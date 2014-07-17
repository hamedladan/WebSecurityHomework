<?php

require_once('connect.php');
session_start();
$logged = false;
if(isset($_SESSION['userID'])){
  $uid = $_SESSION['userID']; 
  $name = $_SESSION['name'];
  $firstName=$_SESSION['firstName'];
 }




$sql="select * from course where responsible=$uid";
//$sql="select user.name, user.firstName, course.name as courseName, studentcourse.mark from user,studentcourse,semester,course where coach='$uid' and semester.default='1' and semester.semesterID=course.semesterID and user.userID=studentcourse.idStudent and studentcourse.idCourse=course.courseID";

$result = mysql_query($sql , $conn);

$res = array();

if($result){
  $nbRows = mysql_num_rows($result);
  
  // arrayType can be : MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
  while ( $row = mysql_fetch_array($result, MYSQL_ASSOC)){
    //$courseName=$row['courseName'];
    //$mark=$row['mark'];
    $courseName=$row['name'];
    $courseID=$row['courseID'];
    $res[]= array('courseName'=>$courseName,
		  'courseID'=>$courseID);
  }
 }

 else{
   echo mysql_error();
 }
mysql_close($conn);

?>
<html>
<head><title>University Marks Manager: Prof Home-page</title>
<link rel="stylesheet" href="mainstyle.css" type="text/css" />
</head>
<body>
<div class="container">
<div class='top'>
<div class="title"><h1>University Marks Manager: list of courses</h1></div>

<?php
echo "<div class='login'>You are logged in as $firstName $name</div>";
?>
</div> <!-- end of div top -->
<?php
include('menu.php');
?>
<div class="content">
<h2>Courses you gives this semester</h2>

<?php

foreach($res as $row){
echo "<div class='line'><a href='course.php?courseID=".$row['courseID']."'>".$row['courseName']."</a></div>";

}

?>
</div>
<?php
include('footer.php');
?>
</div>
</body>