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
    
    $sql2 = "
    INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status) VALUES ('".$tenTaikhoan."','img','dự án','Hoàng Thu Trang','123',0)";
    $kq = mysqli_query($ket_noi, $sql2);
;?>