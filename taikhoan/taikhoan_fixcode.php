<?php 
    include("../connect.php");
    $taiKhoan_id=$_POST['taikhoan_id'];
    $tenTaiKhoan=$_POST['tentaikhoan'];
    $matKhau = $_POST['matkhau'];
    $role = $_POST['role'];
        $sql = "
        UPDATE `taikhoan` SET `tentaikhoan` = '".$tenTaiKhoan."', `matkhau` = '".$matKhau."', `role_id`='".$role."'
        WHERE `id` = '".$taiKhoan_id."'
        ";
    $kq = mysqli_query($ket_noi, $sql);
    // if(isset($_GET['id']))
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã cập nhật tài khoản thành công');
                window.location.href='danhsachtaikhoan.php';
            </script>
    ";
;
?>