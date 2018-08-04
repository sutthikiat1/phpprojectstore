<body>
<center>
    <?php
    if (isset($_GET['submit'])) {
    include './connection.php';
    $user_lname = $_GET['user_lname'];
    $sql = "update user set user_lname='$user_lname'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo "แก้ไขเรียบร้อยแล้ว";
    echo '<a href="member_list.php">กลับสู่หน้าสมาชิก</a>';
    }
    ?>
        <form class="form-horizontal" role="form" name="member_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
            <input type="hidden" name="prd_id" id="prd_id">
            <div class="form-group">
                <label for="user_lname" class="col-md-2 col-lg-2 control-label"><br>เปลี่ยนนามสกุล</label>
                <div class="col-md-10 col-lg-10">
                    <br><input type="text" name="user_lname" id="user_lname" class="form-control">
                </div>
                <br><div class="form-group">
                    <div class="col-md-10 col-lg-10">
                        <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                    </div>    
                </div>
        </form>
            </div>
    </center></body>