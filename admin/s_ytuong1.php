<?php
 include("../connect.php");

    $id=$_POST['id'];
    $duanid=$_POST['duan_id'];
    $NVid=$_POST['nhanvien_id'];
    $tenyt=$_POST['tenytuong'];
    $noidung=$_POST['noidung'];

    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $ngay = date("D M d, Y G:i");
?>
<?php


    $sql="UPDATE `ytuong` SET `duan_id`='" . $duanid . "',`nhanvien_id`='" . $NVid . "',
    `tenytuong`='" . $tenyt . "',`noidung`='" . $noidung . "',`ngaylap`='" . $ngay . "' WHERE `id`=" . $id;

    if($conn->query($sql)){
        echo "
            <script>
            window.location = 'ytuong_t.php';
            </script>
        ";
    }
    else {
        echo "Sửa không thành công";
        echo "
            <script>
            window.location = 'ytuong_t.php';
            </script>
        ";
    }
?>