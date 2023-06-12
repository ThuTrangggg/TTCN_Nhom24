<?php
session_start();

include("../connect.php");
$nhanvien_id = $_POST['nhanvien_id'];

$chitietduan_id = $_POST['chitietduan_id'];
$task = $_POST['task'];
$phantram = $_POST['phantram'];
$tiendo = $_POST['tiendo'];
$file = $_POST['file'];
$pheduyet = $_POST['pheduyet'];
$ngaybatdau = $_POST['ngaybatdau'];
$ngayketthuc = $_POST['ngayketthuc'];

if($chitietduan_id != 0){
    echo $chitietduan_id;
} else echo 'khong co'.$chitietduan_id;

// $sql = "
//     INSERT INTO duan (tenduan,loaiduan_id,tinhtrang,hinhanh,mota,chiphi) VALUES ('" . $tenduan . "','" . $maloaiduan . "','" . $tinhtrang . "','" . $img . "','" . $mota . "','" . $chiphi . "')";
// $kq = mysqli_query($ket_noi, $sql);
// echo "
//         <script type='text/javascript'>
//             window.alert('Bạn đã thêm mới dự án thành công');
//             window.location.href='duan.php';
//         </script>
//     ";

// $sql2 = "
//     INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status) VALUES ('" . $tenduan . "','" . $img . "','dự án','" . $tenTaikhoan . "','thêm dự án',0)";
// $kq = mysqli_query($ket_noi, $sql2);

//     // $sql2 = "
//     // INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status) VALUES ('".$tenTaikhoan."','img','dự án','Hoàng Thu Trang','123',0)";
//     // $kq = mysqli_query($ket_noi, $sql2);
// ;
// $taiKhoan_id = $_POST['taikhoan_id'];
// $tenTaiKhoan = $_POST['tentaikhoan'];
// $matKhau = $_POST['matkhau'];
// $role = $_POST['role'];
// $sql = "
//         UPDATE `taikhoan` SET `tentaikhoan` = '" . $tenTaiKhoan . "', `matkhau` = '" . $matKhau . "', `role_id`='" . $role . "'
//         WHERE `id` = '" . $taiKhoan_id . "'
//         ";
// $kq = mysqli_query($ket_noi, $sql);
// // if(isset($_GET['id']))
// echo "
//             <script type='text/javascript'>
//                 window.alert('Bạn đã cập nhật tài khoản thành công');
//                 window.location.href='danhsachtaikhoan.php';
//             </script>
//     ";