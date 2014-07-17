<div class="menu">
<?php 
   $level=$_SESSION['level'];

if($level==1){
?>
<div class="menu-item"><a href="student.php">Home</a></div> 
<?php
    }
if($level==2){
?>
  <div class="menu-item"><a href="prof.php">Home (list of students)</a></div> 
  <div class="menu-item"><a href="prof2.php">Courses</a></div> 
<?php
    }
if($level==3){
?>
<div class="menu-item"><a href="admin.php">Home</a></div> 
<div class="menu-item"><a href="admin2.php">Courses</a></div> 
<?php
    }

?>
<div class="menu-item"><a href="viewMessages.php">View your Messages</a></div> 
<div class="menu-item"><a href=".php"></a></div> 
<div class="menu-item"><a href="logout.php">Logout</a></div> 
</div>