<html>
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
        <?php 
            include 'menu.php'; 
        ?>

    </head>
    
    </head>
    <body>        

                <div class="col-sm-12 col-md-9 col-lg-9">
                    <center><h4>แก้ไขรายละเอียดพนักงาน</h4></center>   
                <?php
                    include './connection.php';
                    if(isset($_GET['submit'])){
                        $emy_id     = $_GET['emy_id'];
                        $emy_fname   = $_GET['emy_fname'];
                        $emy_lname = $_GET['emy_lname'];
                        $emy_dep_id = $_GET['emy_dep_id'];
                        $emy_pos = $_GET['emy_pos'];
                        $emy_salary = $_GET['emy_salary'];
                        $sql        = "update employee set emy_fname='$emy_fname', emy_lname ='$emy_lname' , emy_dep_id ='$emy_dep_id' "
                                . " , emy_pos ='$emy_pos' , emy_salary ='$emy_salary'   where emy_id='$emy_id'";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "แก้ไข $emy_fname เรียบร้อยแล้ว<br>";
                        echo '<a href="employee_list.php">แสดงรายการสินค้าทั้งหมด</a>';
                    }else{
                        $femy_id = $_REQUEST['emy_id'];
                        $sql =  "SELECT * FROM employee where emy_id='$femy_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $femy_fname = $row['emy_fname'];
                        $femy_lname = $row['emy_lname'];
                        $femy_dep_id = $row['emy_dep_id'];
                        $femy_pos = $row['emy_pos'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    
                    <form class="form-horizontal" role="form" name="product_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="emy_id" id="emy_id" value="<?php echo "$femy_id";?>">
                        <div class="form-group">
                            <label for="emy_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="emy_fname" id="emy_fname" class="form-control" value="<?php echo "$femy_fname";?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="emy_lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="emy_lname" id="emy_lname" class="form-control" value="<?php echo "$femy_lname";?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="emy_pos" class="col-md-2 col-lg-2 control-label">ตำแหน่ง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="emy_pos" id="emy_pos" class="form-control" value="<?php echo "$femy_pos";?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="emy_salary" class="col-md-2 col-lg-2 control-label">เงินเดือน</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="int" name="emy_salary" id="emy_salary" class="form-control">
                            </div>    
                        </div>
                        <label>กรุณาเลือกแผนก</label><br>
                              <?php
                                include './connection.php';
                                $sql =  'SELECT * FROM department';
                                $result = mysqli_query($conn,$sql);
                                while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                    $dep = 'department['.$row['dep_id'].']';
                                    echo '<input type="radio" name=emy_dep_id ';
                                    echo 'id="' . $dep . '" ';
                                    echo 'value="'.$row['dep_id'].'">';
                                    echo '<label for="'.$dep.'">'.$row['dep_name'];
                                    echo '</label><br>';
                                }
                                mysqli_free_result($result);
                                echo '</table>';
                                mysqli_close($conn);
                              ?>
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div>
                    </form>
                <?php
                    }
                ?>
                </div>    
            </div>
        </div>    
    </body>
</html>