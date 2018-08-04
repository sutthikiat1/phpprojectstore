<?php
include './connection.php';
?>
<h2>ตรวจสอบข้อมูล...</h2>
<?php
$regis = $_POST['regis'];
//print_r($regis);

$sqlc = "select * FROM user where username='".$regis['username']."'";
$resultc = mysqli_query($conn,$sqlc);
$rsc = mysqli_fetch_array($resultc);

if (empty($rsc)) {
    $sql = "insert into user(username,password,user_fname,user_lname,user_tel,user_email) "
            . "values('".$regis['username']."','".$regis['password']."','".$regis['user_fname']."','".$regis['user_lname']."','".$regis['user_tel']."','".$regis['user_email']."')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Success: บันทึกข้อมูลเรียบร้อย <a href='index.php'>เข้าสู่ระบบ</a>";
    } else {
        echo "Error : ไม่สามารถบันทึกข้อมูลได้ <a href='register.php'>กลับ</a>";
    }
} else {
    echo "Error มีชื่อ Username นี้ในระบบแล้ว <a href='register.php'>สมัครสมาชิกใหม่</a>";
}
?>

