<?php

require_once('connect.php');
session_start();
$logged = false;
if(isset($_SESSION['userID'])){
  $uid = $_SESSION['userID']; 
  $name = $_SESSION['name'];
  $firstName=$_SESSION['firstName'];
 }




$sql="select course.name,course.courseID, semester.name as semesterName from course, semester where semester.semesterID= course.semesterID and semester.default='1'";

$result = mysql_query($sql , $conn);

$res = array();

if($result){
  $nbRows = mysql_num_rows($result);
  
  while ( $row = mysql_fetch_array($result, MYSQL_ASSOC)){
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
<head><title>University Marks Manager: Admin Home-page</title>
<link rel="stylesheet" href="mainstyle.css" type="text/css" />
</head>
<body>
<div class="container">
<div class='top'>
<div class="title"><h1>University Marks Manager: list of courses</h1></div>
<?php
echo "<div class='login'>You are logged in as $firstName $name</div>";?>
</div> <!-- end of div top -->

<?php
include('menu.php');
?>
<div class="content">

<h2>Courses given this semester</h2>

<?php

foreach($res as $row){
echo "<div class='line'><a href='course.php?courseID=".$row['courseID']."'>".$row['courseName']."</a> (<a href='message-course.php?courseID=".$row['courseID']."'>Contact</a>)</div>";

}

?>
</div>
<?php
include('footer.php');
?>
</div>

</body>