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
                    <center><h4>แก้ไขรายการสินค้า</h4></center>   
                <?php
                    include './connection.php';
                    if(isset($_GET['submit'])){
                        $prd_id     = $_GET['prd_id'];
                        $prd_name   = $_GET['prd_name'];
                        $prd_price = $_GET['prd_price'];
                        $prd_pdt_id = $_GET['prd_pdt_id'];
                        $sql        = "update product set prd_name='$prd_name', prd_price ='$prd_price' , prd_pdt_id ='$prd_pdt_id'  where prd_id='$prd_id'";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "แก้ไข $prd_name เรียบร้อยแล้ว<br>";
                        echo '<a href="product_list.php">แสดงรายการสินค้าทั้งหมด</a>';
                    }else{
                        $fprd_id = $_REQUEST['prd_id'];
                        $sql =  "SELECT * FROM product where prd_id='$fprd_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $fprd_name = $row['prd_name'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    
                    <form class="form-horizontal" role="form" name="product_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="prd_id" id="prd_id" value="<?php echo "$fprd_id";?>">
                        <div class="form-group">
                            <label for="prd_name" class="col-md-2 col-lg-2 control-label">ชื่อสินค้า</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="prd_name" id="prd_name" class="form-control" value="<?php echo "$fprd_name";?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="prd_price" class="col-md-2 col-lg-2 control-label">ราคาสินค้า</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="int" name="prd_price" id="prd_price" class="form-control">
                            </div>    
                        </div>
                        <label>กรุณาเลือกประเภทสินค้า</label><br>
                              <?php
                                include './connection.php';
                                $sql =  'SELECT * FROM product_type';
                                $result = mysqli_query($conn,$sql);
                                while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                    $pdt = 'product_type['.$row['pdt_id'].']';
                                    echo '<input type="radio" name=prd_pdt_id ';
                                    echo 'id="' . $pdt . '" ';
                                    echo 'value="'.$row['pdt_id'].'">';
                                    echo '<label for="'.$pdt.'">'.$row['pdt_name'];
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