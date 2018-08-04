    <body>

        <!-- ส่วนบน -->
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Data Store</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link disabled" href="register.php">Register</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Edit
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="product_list.php">Product List</a>
                    <a class="dropdown-item" href="employee_list.php">Employee</a>
                    <a class="dropdown-item" href="department_list.php">Department</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="member_list.php">Member</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="JavaScript:alert('ยังไม่เปิดใช้งาน')">Contact</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-8">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
          <?php
           
            session_start();
            if (empty($_SESSION)) {
                echo "\nยินดีต้อนรับ : บุลคลทั่วไป";
            } else {
                echo "\nยินดีต้อนรับ : ";
                echo $_SESSION['user']['username'];
                echo "\n<a href='logout.php'>ออกจากระบบ</a>";
            }
            ?>
        </nav>
      </div>  
    </body>
        <!-- ส่วนบน -->