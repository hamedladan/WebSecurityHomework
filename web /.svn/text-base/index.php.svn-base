<?php


require_once('connect.php');
  session_start();
$logged = false;
if(isset($_POST['username']) && isset($_POST['password'])){
  $sql="select * from user where username='". $_POST['username']."'and password='".$_POST['password']."'";

  $result = mysql_query($sql , $conn);

  if($result){
    $nbRows = mysql_num_rows($result);
    
    // arrayType can be : MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
    if ( $row = mysql_fetch_array($result, MYSQL_ASSOC)){
      $_SESSION['userID']=$row['userID'];
      $_SESSION['username']=$row['username'];
      $_SESSION['name']=$row['name'];
      $_SESSION['firstName']=$row['firstname'];
      $_SESSION['level']=$row['level'];
      $logged = true;
    }
  }

  else{
    echo mysql_error();
  }
  mysql_close($conn);
 }

if($logged){
  if($_SESSION['level']==1){ // Student
    header("Location: student.php");
    exit;
  }
  if($_SESSION['level']==2){ // Prof
    header("Location: prof.php");
    exit;
  }
  if($_SESSION['level']==3){ // Secretary
    header("Location: admin.php");
    exit;
  }
 }









?>

<html>
<head><title>University Marks Manager</title>
</head>
<link rel="stylesheet" href="mainstyle.css" type="text/css" />
<body>
<div class="container">
  <div class='top'>
    <div class="title"><h1>University Marks Manager</h1></div> 
    <div class='login'>You are not logged in</div>
  </div>
  <div class="menu">&nbsp</div>
<div class="content">
<h2>Login into the system</h2>
<form action="index.php" method="POST">
<pre>
Login: <input type="text" name="username">
Password : <input type="password" name="password">
<input type="submit" value="Login">
</pre>
</form>
</div> <!-- content -->

<?php
include('footer.php');
?>
</div>
</body>