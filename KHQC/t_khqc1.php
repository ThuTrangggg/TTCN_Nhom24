
<?php
include("../connect.php");

$khqc=$_POST['KHQC_id'];
$duan=$_POST['duan_id'];
$noidung=$_POST['noidung'];

    $sql="INSERT INTO `chitietkhqc`(`KHQC_id`, `duan_id`, `noidung`) 
    VALUES ('".$khqc."','".$duan."','".$noidung."')";
    if($conn->query($sql)){
        echo "Thêm mới thành công";
        echo "
            <script>
            window.location = 'khqc_t.php';
            </script>
        ";
    }
     else {
        echo "Không thêm được";
        echo "
            <script>
            window.location = 'khqc_t.php';
            </script>
        ";
     }
?>
