<?php 
    include("../connect.php");
    $loaiduan_id=$_POST['loaiduan_id'];
    $tenloaiduan = $_POST['ten_loai_du_an'];
        $sql = "
        UPDATE `loaiduan` SET `ten_loai_du_an` = '".$tenloaiduan."'
        WHERE `id` = '".$loaiduan_id."'

        ";
    if(isset($_GET['id']))
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã cập nhật tài khoản thành công');
                window.location.href='loaiduan.php';
            </script>
    ";
;
?>