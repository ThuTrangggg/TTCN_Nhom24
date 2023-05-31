
<?php
include("../connect.php");

$duanid=$_POST['duan_id'];
$NVid=$_POST['nhanvien_id'];
$tenyt=$_POST['tenytuong'];
$noidung=$_POST['noidung'];

    $sql="INSERT INTO `ytuong`(`duan_id`, `nhanvien_id`, `tenytuong`, `noidung`) 
    VALUES ('".$duanid."','".$NVid."','".$tenyt."','".$noidung."')";
    if($conn->query($sql)){
        echo "Thêm mới thành công";
        echo "
            <script>
            window.location = 'ytuong_t.php';
            </script>
        ";
    }
     else {
        echo "Không thêm được";
        echo "
            <script>
            window.location = 'ytuong_t.php';
            </script>
        ";
     }
?>
