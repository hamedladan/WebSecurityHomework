<?php

require_once('connect.php');
session_start();
$logged = false;
if(isset($_SESSION['userID'])){
  $uid = $_SESSION['userID']; 
  $name = $_SESSION['name'];
  $firstName=$_SESSION['firstName'];
 }


$courseID = $_GET['courseID'];

$possibleMarks=array('1.0','1.3','1.7','2.0','2.3','2.7','3.0','3.3','3.7','4.0','4.3','4.7','5.0','5.3','5.7','6.0');

$sql="select user.firstName, user.name as studentName, course.name as courseName, mark, user.userID as studentID from course, studentcourse, user where courseID=$courseID and user.userID = studentcourse.idStudent and studentcourse.idCourse = course.courseID";
//$sql="select user.name, user.firstName, course.name as courseName, studentcourse.mark from user,studentcourse,semester,course where coach='$uid' and semester.default='1' and semester.semesterID=course.semesterID and user.userID=studentcourse.idStudent and studentcourse.idCourse=course.courseID";

$result = mysql_query($sql , $conn);

$res = array();

if($result){
  $nbRows = mysql_num_rows($result);
  
  // arrayType can be : MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
  while ( $row = mysql_fetch_array($result, MYSQL_ASSOC)){
    $res[]= $row;
    $courseName = $row['courseName'];
  }
 }

 else{
   echo mysql_error();
 }
mysql_close($conn);

?>

<html>
<head><title>University Marks Manager: Modify a course</title>
<link rel="stylesheet" href="mainstyle.css" type="text/css" />
</head>
<body>
<div class="container">
<div class='top'>
<div class="title"><h1>University Marks Manager: Give marks</h1></div>
<?php
echo "<div class='login'>You are logged in as $firstName $name</div>";?>
</div> <!-- end of div top -->
<?php
include('menu.php');
?>
<div class="content">
<h2>Enter marks for the course : <?php echo "$courseName"; ?></h2>

<?php
echo "<form action='enterMarks.php' method='POST'>";

echo "<input type='hidden' name='courseID' value ='$courseID' />";

foreach($res as $row){
  /*  if($row['mark']!= -1){
    //echo "<div class='student'>".$row['firstName']." ".$row['studentName'].":".$row['mark']." </div>";
    echo "<div class='student'>".$row['firstName']." ".$row['studentName']." </div>";
  }
  else{
    echo "<div class='student'>".$row['firstName']." ".$row['studentName']." </div>";

    }*/
  echo "<div>".$row['firstName']." ".$row['studentName']." = <select name='student".$row['studentID']."' >\n";
  $found=0;
  foreach($possibleMarks as $mark){

    if($mark == $row['mark']){
      echo "<option value='$mark' selected='1'>$mark</option>\n";
      $found=1;
    }
    else{
      echo "<option value='$mark'>$mark</option>\n";
    }
  }
  if($found==1){
    echo "<option value='-1'>N/A</option>\n";
  }
  else{
    echo "<option value='-1' selected='1'>N/A</option>\n";
  }
    echo "</select></div>";
}

?>

<input type='submit' value='Send marks' />
</form>
<?php
  echo " <div><a href='message-course.php?courseID=".$courseID."'>Contact</a></div>";
?>
</div>
<?php
include('footer.php');
?>
</div>

</body>