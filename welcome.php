<?php
   if (isset($_POST['submit'])) {
       header("location:login.php");
   }
?>
<h1><?php echo "dawng nhap thanh cong"; ?></h1>
<p><?php session_start(); echo"xin chào".$_SESSION['username']; ?></p>
<p></p>
<form action="" method="post">
    <input type="submit" name="submit" value="Logout">
</form>


