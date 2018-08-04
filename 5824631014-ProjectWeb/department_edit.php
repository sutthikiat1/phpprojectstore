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
                    <center><h4>แก้ไขรายชื่อแผนก</h4></center>   
                <?php
                    include './connection.php';
                    if(isset($_GET['submit'])){
                        $dep_id     = $_GET['dep_id'];
                        $dep_name   = $_GET['dep_name'];
                        $sql        = "update department set dep_name='$dep_name' where dep_id='$dep_id'";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "แก้ไขรายชื่อแผนก เป็น $dep_name เรียบร้อยแล้ว<br>";
                        echo '<a href="department_list.php">แสดงรายชื่อแผนกทั้งหมด</a>';
                    }else{
                        $fdep_id = $_REQUEST['dep_id'];
                        $sql =  "SELECT * FROM department where dep_id='$fdep_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $fdep_name = $row['dep_name'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    
                    <form class="form-horizontal" role="form" name="product_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="dep_id" id="dep_id" value="<?php echo "$fdep_id";?>">
                        <div class="form-group">
                            <label for="dep_name" class="col-md-2 col-lg-2 control-label">ชื่อแผนก</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="dep_name" id="dep_name" class="form-control" value="<?php echo "$fdep_name";?>">
                            </div>    
                        </div>
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