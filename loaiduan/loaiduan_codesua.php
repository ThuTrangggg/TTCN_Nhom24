<?php 
    include("../connect.php");
    $loaiduan_id=$_POST['loaiduan_id'];
    $tenloaiduan = $_POST['ten_loai_du_an'];
        $sql = "UPDATE `loaiduan` SET `ten_loai_du_an` = '".$tenloaiduan."'
        WHERE `id` = '".$loaiduan_id."'

        ";
    $kq = mysqli_query($ket_noi, $sql);
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã cập nhật loại dự án thành công');
                window.location.href='loaiduan.php';
            </script>
    ";
;
?>