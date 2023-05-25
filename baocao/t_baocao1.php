
<?php
include("../connect.php");

$duanid=$_POST['duan_id'];
$NVid=$_POST['nhanvien_id'];
$tenbc=$_POST['tenbaocao'];
$noidung=$_POST['noidung'];

date_default_timezone_set("Asia/Ho_Chi_Minh");
$ngay= date("D M d, Y G:i");


    $sql="INSERT INTO `baocao`(`duan_id`, `nhanvien_id`, `tenbaocao`, `noidung`, `ngaylap`) 
    VALUES ('".$duanid."','".$NVid."','".$tenbc."','".$noidung."','".$ngay."')";
    if($conn->query($sql)){
        echo "Thêm mới thành công";
        echo "
            <script>
            window.location = 'baocao_t.php';
            </script>
        ";
    }
     else {
        echo "Không thêm được";
        echo "
            <script>
            window.location = 'baocao_t.php';
            </script>
        ";
     }
?>
