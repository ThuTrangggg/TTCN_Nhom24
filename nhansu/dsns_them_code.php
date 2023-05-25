<?php 
    include("../connect.php");

    $ten = $_POST['txtten'];
    $gioitinh = $_POST['txtgioitinh'];
    $cccd = $_POST['txtcccd'];
    $sdt = $_POST['txtsdt'];
    $email = $_POST['txtemail'];
    $chucvu =$_POST['txtchucvu'];
    $ngaysinh = $_POST['txtngaysinh'];
    $diachi = $_POST['txtdiachi'];
    $sql = "
    INSERT INTO nhanvien (chucvu_id,email,ten,gioitinh,ngaysinh,diachi,sdt,cccd,trangthai) 
    VALUES ('".$chucvu."','".$email."','".$ten."','".$gioitinh."','".$ngaysinh."','".$diachi."','".$sdt."','".$cccd."','Đang làm')
        ";

    $kq = mysqli_query($ket_noi, $sql);

    echo "
        <script type='text/javascript'>
            window.alert('Bạn đã thêm mới tài khoản thành công');
            // window.location.href='danhsachnhansu.php';
        </script>
    ";
;
