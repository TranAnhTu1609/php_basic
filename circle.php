<?php
require_once ('sesion.php');
?>
<form action="" method="post">
   Tên đăng nhập:

    <input type="text" name="username" value=""><?php echo $eusername; ?><br>
    Mật khẩu:
    <input type="password" name="password" value=""><?php echo $epassword; ?><br>
    Họ và tên:
    <input type="text" name="hoten" value=""><?php echo $ehoten; ?><br>
    Năm sinh:
    <input type="date" name="namsinh" value=""><?php echo $enamsinh; ?><br>
    Email:
    <input type="type" name="email" value=""><?php echo $eemail;?><br>
    <input type="submit" name="submit" value="Resister">
</form>
