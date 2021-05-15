<?php

    $eemail = '';
    $eusername = '';
    $enamsinh = '';
    $epassword = '';
    $ehoten = '';
    $eemail = '';
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hoten = $_POST['hoten'];
        $namsinh = $_POST['namsinh'];
        $email = $_POST['email'];
        if (empty($username)) {
            $eusername = "Không được để trống";
        }
        if (empty($password)) {
            $epassword = "không được để trống";
        }
        if (empty($hoten)) {
            $ehoten = "không được để trống";
        }
        if (empty($email)) {
            $eemail = "không được để trống";
        }
        $check = preg_match('/[A-Za-z0-9]{1,30}/',$username);
        if (!$check) {
            $eusername = "tối đa 30 ký tự gồm chữ hoa, chữ thường không dấu, số từ 0 đến 9";
        }
        $check1 = preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,}$/',$password);
        if (!$check1) {
            $epassword = "tối thiểu 6 ký tự, trong đó có ít nhất 1 chữ in hoa, 1 số.";
        }
        $check2 = preg_match('/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]{1,50}$/',
            $hoten);
        if (!$check2) {
            $ehoten = "không quá 50 ký tự";
        }
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $eemail.="Không đúng định dang email";
        }
        $connect = new mysqli("localhost","root","","regsister_php");
        mysqli_set_charset($connect,"utf8");
        if ($connect->connect_error) {
            var_dump($connect->connect_error);
            die();
        }

        $query = "SELECT * FROM sinhvien WHERE username='".$username."'";
        $result=mysqli_query($connect, $query);
        $data = array();

        while ($row = mysqli_fetch_array($result,1)) {
            $data[]=$row;
        }
        $query1 = "SELECT * FROM sinhvien WHERE email='".$email."'";
        $result1=mysqli_query($connect, $query1);
        $data1 = array();

        while ($row1 = mysqli_fetch_array($result1,1)) {
            $data1[]=$row1;
        }
        if ($data!=null && count($data)>0) {
            $eusername="username phải là duy nhất";
        }
        if ($data1!=null && count($data1)>0) {
            $eemail="email phải là duy nhất";
        }
        if (count($data)==0 && count($data1)==0) {
            $query2 = "INSERT INTO sinhvien(username,password,hoten,namsinh,email) VALUES('" . $username . "','" . $password . "','" . $hoten . "','" . $namsinh . "','" . $email . "')";
            mysqli_query($connect, $query2);
            header("location:login.php");
        }
        $connect->close();
    }
?>
