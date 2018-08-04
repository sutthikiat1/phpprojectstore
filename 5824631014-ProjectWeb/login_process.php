<?php
session_start();
$user = $_POST["user"];
$pass = $_POST["pass"];

include './connection.php';

$sql = "select * FROM user where username='".$user."' and password='".$pass."'";
$result = mysqli_query($conn,$sql);
$rs = mysqli_fetch_array($result);

if (empty($rs)) {
    echo "Username หรือ Password ไม่ถูกต้อง <a href='login_form.php'>เข้าระบบใหม่</a>";
} else {
    echo "ยินดีต้อนรับ ".$rs['username']." <a href='index.php'>หน้าหลัก";
    $_SESSION['user'] = $rs;
    
}
?>
