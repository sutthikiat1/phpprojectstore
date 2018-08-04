<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Computer</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body> 
        <?php include 'menu.php'; ?>
        <!-- ส่วนกลาง-->
        <?php include './connection.php';?>
        <div class="container bg-light" >
            <center><h2>สมัครสมาชิก</h2></center>
            <center><form method="post" action="register_process.php" name="register_form">
                <table>
                    <tr>
                        <td>ชื่อผู้ใข้งาน</td>
                        <td><input type="text" name="regis[username]" /></td>
                    </tr>
                    <tr>
                        <td>รหัสผ่าน</td>
                        <td><input type="password" name="regis[password]"/></td>
                    </tr>
                    <tr>
                        <td>ชื่อ</td>
                        <td><input type="text" name="regis[user_fname]" /></td>
                    </tr>
                    <tr>
                        <td>นามสกุล</td>
                        <td><input type="text" name="regis[user_lname]" /></td>
                    </tr>
                    <tr>
                        <td>เบอร์โทรศัพท์</td>
                        <td><input type="text" name="regis[user_tel]" /></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="regis[user_email]" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="สมัครสมาชิก" </td>
                    </tr>
                </table>
            </form></center>
        </div>
</html>