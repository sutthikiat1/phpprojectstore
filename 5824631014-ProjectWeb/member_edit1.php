<body>
<center>
    <?php
    if (isset($_GET['submit'])) {
    include './connection.php';
    $user_fname = $_GET['user_fname'];
    $sql = "update user set user_fname='$user_fname'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo "แก้ไขเรียบร้อยแล้ว";
    echo '<a href="member_list.php">กลับสู่หน้าสมาชิก</a>';
    }
    ?>
        <form class="form-horizontal" role="form" name="member_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
            <input type="hidden" name="prd_id" id="prd_id">
            <div class="form-group">
                <label for="user_fname" class="col-md-2 col-lg-2 control-label">เปลี่ยนชื่อ<br></label>
                <div class="col-md-10 col-lg-10">
                    <br><input type="text" name="user_fname" id="user_fname" class="form-control">
                </div>
                <br><div class="form-group">
                    <div class="col-md-10 col-lg-10">
                        <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                    </div>    
                </div>
        </form>
            </div>
    </center></body>