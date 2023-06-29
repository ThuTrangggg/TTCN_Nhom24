<?php
include("../connect.php");
$nhanvien_id = $_POST['nhanVien_id'];
$chucvu = $_POST['txtchucvu'];
$taiKhoan_id = $_POST['txttaikhoan'];
$tennhanvien = $_POST['txtten'];
$gioitinh = $_POST['txtgioitinh'];
$ngaysinh = $_POST['txtngaysinh'];
$diachi = $_POST['txtdiachi'];
$email = $_POST['txtemail'];
$sdt = $_POST['txtsdt'];
$cccd = $_POST['txtcccd'];
$trangthai = $_POST['txttrangthai'];

$sql = "
        UPDATE nhanvien set chucvu_id = '" . $chucvu . "',taikhoan_id='" . $taiKhoan_id . "',
         ten='" . $tennhanvien . "', gioitinh='" . $gioitinh . "', ngaysinh='" . $ngaysinh . "',
         diachi='" . $diachi . "',email='" . $email . "', sdt='" . $sdt . "', cccd='" . $cccd . "',
        trangthai='" . $trangthai . "'
        WHERE `id` = '" . $nhanvien_id . "'
        ";
$kq = mysqli_query($conn, $sql);
echo "
            <script type='text/javascript'>
                window.alert('Bạn đã cập nhật tài khoản thành công');
                window.location.href='danhsachnhansu.php';
            </script>
    ";
    // if(isset($_GET['id']))
    //     echo "
    //         <script type='text/javascript'>
    //             window.alert('Bạn đã cập nhật tài khoản thành công');
    //             // window.location.href='danhsachnhansu.php';
    //         </script>
    // ";
;
