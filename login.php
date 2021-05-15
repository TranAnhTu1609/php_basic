<?php
session_start();
if (isset($_POST['submit'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $connect = new mysqli("localhost","root","","regsister_php");
    mysqli_set_charset($connect,"utf8");
    if ($connect->connect_error) {
        var_dump($connect->connect_error);
        die();
    }

    $query = "SELECT * FROM sinhvien WHERE username='".$username."' AND password='".$password."'";
    $result=mysqli_query($connect, $query);
    $data = array();

    while ($row = mysqli_fetch_array($result,1)) {
        $data[]=$row;
    }
    $_SESSION['username']=$data[0]['username'];
    $_SESSION['password']=$data[0]['password'];
    $_SESSION['hoten']=$data[0]['hoten'];
    $_SESSION['namsinh']=$data[0]['namsinh'];
    $_SESSION['email']=$data[0]['email'];

    if($data!=null && count($data)>0)
    {
        if(isset($_POST['remember']))
        {
            setcookie("rusername",$data[0]['username'],time()+1000,"/");
            setcookie("rpassword",$data[0]['password'],time()+1000,"/");
        }
        else
        {
            setcookie("rusername",$data[0]['username'],time()-1000,"/");
            setcookie("rpassword",$data[0]['password'],time()-1000,"/");
        }
        header("location:welcome.php");
    }
}
?>
<form action="" method="post">
    Tên đăng nhập:
    <input type="text" name="username" value="<?php  echo isset($_COOKIE['rusername'])?$_COOKIE['rusername']:"";?>" required><br>
    Mật khẩu:
    <input type="password" name="password" value="<?php  echo isset($_COOKIE['rpassword'])?$_COOKIE['rpassword']:"";?>" required><br>
    <input type="checkbox" name="remember" value="">Lưu mật khẩu<br>
    <input type="submit" name="submit" value="Login">
</form>
