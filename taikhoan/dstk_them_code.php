<?php 
    include("../connect.php");

    $tenTaikhoan = $_POST['txttentaikhoan'];
    $matKhau = $_POST['txtmatkhau'];
   
    $email = $_POST['txtemail'];
    $role =$_POST['txtrole'];
    $sql = "
    INSERT INTO taikhoan (email,matkhau,role_id,tentaikhoan) VALUES ('".$email."','".$matKhau."','".$role."','".$tenTaikhoan."')
        ";

    $kq = mysqli_query($ket_noi, $sql);

    echo "
        <script type='text/javascript'>
            window.alert('Bạn đã thêm mới tài khoản thành công');
            window.location.href='danhsachtaikhoan.php';
        </script>
    ";
;?>