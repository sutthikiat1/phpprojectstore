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
                    <center><h4>เพิ่มรายชื่อแผนก</h4></center>   
                <?php
                    if(isset($_GET['submit'])){
                        $dep_name = $_GET['dep_name'];
                        $sql = "insert into department (dep_name) values ('$dep_name')";
                        include './connection.php';
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "เพิ่มรายชื่อแผนก $dep_name เรียบร้อยแล้ว<br>";
                        echo '<a href="department_list.php">แสดงรายชื่อแผนกทั้งหมด</a>';
                    }else{
                ?>
                    <form class="form-horizontal" role="form" name="department_add" action="<?php echo $_SERVER['PHP_SELF']?>">
                             <div class="form-group">
                            <label for="dep_name" class="col-md-2 col-lg-2 control-label">ชื่อแผนก</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="dep_name" id="dep_name" class="form-control">
                            </div>    
                        </div>
                        <center><div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                            </div></center>
                    </form>
                <?php
                    }
                ?>
                </div>    
            </div>
        </div>    
    </body>
</html>