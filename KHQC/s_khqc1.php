<?php
 include("../connect.php");

    $id=$_POST['id'];
    $khqc=$_POST['KHQC_id'];
    $duan=$_POST['duan_id'];
    $noidung=$_POST['noidung'];
?>
<?php


    $sql="UPDATE `chitietkhqc` SET `KHQC_id`='" . $khqc . "', `duan_id`='" . $duan . "',
    `noidung`='" . $noidung . "' WHERE `id`=" . $id;

    if($conn->query($sql)){
        echo "
            <script>
            window.location = 'khqc_t.php';
            </script>
        ";
    }
    else {
        echo "Sửa không thành công";
        echo "
            <script>
            window.location = 'khqc_t.php';
            </script>
        ";
    }
?>