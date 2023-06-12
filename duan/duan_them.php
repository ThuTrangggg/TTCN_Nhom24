<?php
session_start();

include("../connect.php");
$tenTaikhoan = $_SESSION['tentaikhoan'];
$tenduan = $_POST['txttenduan'];
$maloaiduan = $_POST['txtmaloaiduan'];
// $ytuong = $_POST['txtytuong'];
// $tenbaocao = $_POST['txttenbaocao'];
$tinhtrang = $_POST['txttinhtrang'];
$chiphi = $_POST['txtchiphi'];
$img = $_POST['txthinhanh'];
$mota = $_POST['txtmota'];

// $tmp_names  = $_FILES['txthinhanh'];
// echo $tmp_names['tmp_name'];

$sql = "
    INSERT INTO duan (tenduan,loaiduan_id,tinhtrang,hinhanh,mota,chiphi) VALUES ('" . $tenduan . "','" . $maloaiduan . "','" . $tinhtrang . "','" . $img . "','" . $mota . "','" . $chiphi . "')";
$kq = mysqli_query($ket_noi, $sql);
echo "
        <script type='text/javascript'>
            window.alert('Bạn đã thêm mới dự án thành công');
            window.location.href='duan.php';
        </script>
    ";

$sql2 = "
    INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status) VALUES ('" . $tenduan . "','" . $img . "','dự án','" . $tenTaikhoan . "','thêm dự án',0)";
$kq = mysqli_query($ket_noi, $sql2);

    // $sql2 = "
    // INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status) VALUES ('".$tenTaikhoan."','img','dự án','Hoàng Thu Trang','123',0)";
    // $kq = mysqli_query($ket_noi, $sql2);
;
