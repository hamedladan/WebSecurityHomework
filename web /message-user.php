<?php

require_once('connect.php');
session_start();
$logged = false;
if(isset($_SESSION['userID'])){
  $uid = $_SESSION['userID']; 
  $name = $_SESSION['name'];
  $firstName=$_SESSION['firstName'];
 }

$toUser = $_GET['userID'];

$sql = "select * from user where userID=$toUser";
$result = mysql_query($sql , $conn);


if($result){
  $nbRows = mysql_num_rows($result);
  
  // arrayType can be : MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
  if ( $row = mysql_fetch_array($result, MYSQL_ASSOC)){
    $toName = $row['name'];
    $toFirstName = $row['firstname'];
  }
 }

 else{
   echo mysql_error();
 }


 


mysql_close($conn);

?>

<html>
<head>
<title>Send a message</title>
<link rel="stylesheet" href="mainstyle.css" type="text/css" />
</head>
<body>
<div class="container">
<div class='top'>
<div class="title">
<h1>University Marks Manager</h1></div>
<?php
echo "<div class='login'>You are logged in as $firstName $name</div>";?>
</div> <!-- end of div top -->
<?php
include('menu.php');
?>
<div class="content">
<h2>Send a message</h2>
<div class="messageTo"><b>To <?php echo "$toFirstName $toName";?></b></div>
<form action="message-user2.php" method="POST">
<input type="hidden" name="toUserID" value="<?php echo $toUser; ?>" />
<div class="messageTitle">  Title : <input type="text" name="title" /> </div>
  <div class="messageContent"> Message: <textarea name="message"></textarea>
<br />
<input type="submit" value="Send Message" />
</div>
</div>  
<?php
include('footer.php');
?>
</div>
</body>
</html>

