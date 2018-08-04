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
    <body>
        <center><h3>รายการสินค้าทั้งหมด</h3></center>
        <br><table class=" table table-bordered table-striped">
            <thead>
                <tr>
                <tr>
                    <th>รายการสินค้า</th>
                    <th colspan="1">ราคาสินค้า</th>
                    <th>ประเภทสินค้า</th>
                    <th></th>
                </tr>

            </thead>

        
    <?php
        if (empty($_SESSION)) {
            echo "กรุณาเข้าสู่ระบบ <a href='index.php'>กลับสู่หน้าหลัก ";
        } else   {
            ?>
            <center><a href="product_add.php" class="btn btn-primary">เพิ่มสินค้า</a></center><br><br>
            <?php 
            include './connection.php';
            $sql = 'SELECT * From product_detail'; 
           
            $result = mysqli_query($conn,$sql);
            while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                echo '<tr>';
                echo '<td>' . $row['prd_name'] . '</td>';
                echo '<td>' . $row['prd_price'] . '</td>';
                echo '<td>' .$row['pdt_name'] .'</td>';
                echo '<td>';
            ?>
            <a href="product_edit.php?prd_id=<?php echo $row['prd_id'];?>" class="btn btn-warning">แก้ไข</a>
            <a href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='product_delete.php?prd_id=<?php echo $row["prd_id"];?>'}" class="btn btn-danger">ลบ</a>
        <?php 
            echo '</td>';
            echo '</tr>';
            }
            mysqli_free_result($result);
            mysqli_close($conn);
        }
           ?> 
            
    </body>
</html>
