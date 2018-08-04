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
        <?php
        if (empty($_SESSION)) {
            echo "กรุณาเข้าสู่ระบบ <a href='index.php'>กลับสู่หน้าหลัก ";
        } else   {
            ?>
            <center><h3>ข้อมูลสมาชิก</h3></center>
            
            <?php
            include './connection.php';
            $sql = 'select * from user order by user_id'; 
            $result = mysqli_query($conn,$sql);
            $ar = 1;
            while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL && $ar == 1) {
            ?>
                <br><table class="table table-bordered col-sm-10 ">
                <thead>
                    <tr>
                        <th>ชื่อผู้ใช้</th>
                        <th><?php echo '' . $_SESSION['user']['username'] . '';?></th>
                        <th><a class="btn btn-danger" href="JavaScript:alert('ไม่สามารถแก้ไขได้')">แก้ไขไม่ได้</a></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>รหัสผ่าน</th>
                        <th><?php echo "*********";?></th>
                        <th><a class="btn btn-danger" href="JavaScript:alert('ไม่สามารถแก้ไขได้')">แก้ไขไม่ได้</a></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>ชื่อจริง</th>
                        <th><?php echo '' . $_SESSION['user']['user_fname']. '';?></th>
                        <th><a class="btn btn-danger" href="JavaScript:alert('ไม่สามารถแก้ไขได้')">แก้ไขไม่ได้</a></th>
                    </tr>
                    <tr>
                        <th>นามสกุล</th>
                        <th><?php echo '' . $_SESSION['user']['user_lname'] . '';?></th>
                        <th><a class="btn btn-danger" href="JavaScript:alert('ไม่สามารถแก้ไขได้')">แก้ไขไม่ได้</a></th>
                    </tr>
                    <tr>
                        <th>เบอร์โทร</th>
                        <th><?php echo '' . $_SESSION['user']['user_tel'] . '';?></th>
                        <th><a class="btn btn-danger" href="JavaScript:alert('ไม่สามารถแก้ไขได้')">แก้ไขไม่ได้</a></th>
                    </tr>
                    <tr>
                        <th>email</th>
                        <th><?php echo '' . $_SESSION['user']['user_email']. '';?></th>
                        <th><a class="btn btn-danger" href="JavaScript:alert('ไม่สามารถแก้ไขได้')">แก้ไขไม่ได้</a></th>
                    </tr>
                </thead>
            </table>
        <?php 
            echo '</td>';
            echo '</tr>';
            $ar = 0;
            }
            mysqli_free_result($result);
            mysqli_close($conn);
            $ar++;
        }
        ?>
    </body>
</html>
