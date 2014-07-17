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

$messageID=$_GET['messageID'];

// Messages sent to the user
$sql="select message.messageID,message.fromUserID, message.title,message.time,user.firstname, user.name, message.body, message.toCourseID, message.toUserID from message,user where message.messageID=$messageID and message.fromUserID=user.userID";

$res = array();

$result = mysql_query($sql , $conn);

if($result){
  $nbRows = mysql_num_rows($result);

  // arrayType can be : MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
  while ( $row = mysql_fetch_array($result, MYSQL_ASSOC)){
    $res[$row['time']]= $row[''];
    $fromUserID= $row['fromUserID']; 
    $fromName= $row['name']; 
    $fromFirstName= $row['firstname']; 
    $from = $fromFirstName.' '.$fromName;
    if($row['toUserID']!=0){
      //$to = "$firstName $name";
      $to = "You";
    }
    else{
      $toCourseID=$row['toCourseID'];
      $sql2 = "select * from course where courseID=$toCourseID";
      
      
      $result2 = mysql_query($sql2 , $conn);
      
      if($result2){
	if ( $row2 = mysql_fetch_array($result2, MYSQL_ASSOC)){
	  $course= $row2['name'];
	}
      }
      else{
	echo mysql_error();
      }

      
      $to = "$course (course)";
    }
    $title = $row['title'];
    $message = $row['body'];
    $time = $row['time'];
  }
 }

 else{
   echo mysql_error();
 }

mysql_close($conn);

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
   <h2>Message:</h2>

<?php
echo "<div class='title'><b>$title</b></div>";
echo "<div class='from'>From : $from (<a href='message-user.php?userID=$fromUserID'>Reply</a>)</div>";
echo "<div class='to'>To : $to</div>";
echo "<div class='time'>Date : $time</div>";
echo "<div class='message'><i>$message</i></div>";

echo "<div class='line'><a href='deleteMessage.php?messageID=$messageID'>Delete Message</a></div>";

?>

</div>
<?php
include('footer.php');
?>
</div>

</body>