<?php
session_start();
session_destroy();
echo "ออกจากระบบแล้ว ";
echo "<a href='index.php'>กลับสู่หน้าหลัก</a>";
?>
