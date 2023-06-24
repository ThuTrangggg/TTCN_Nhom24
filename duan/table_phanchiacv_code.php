<?php
session_start();

include("../connect.php");

if (isset($_POST['submitpccv'])) {
$duan_id = $_POST['duan_id'];
$nhanvien_id = $_POST['nhanvien_id'];
$task = $_POST['task'];
$ngaybatdau = $_POST['ngaybatdau'];
$ngayketthuc = $_POST['ngayketthuc'];

$sql = "INSERT INTO chitietduan (nhanvien_id,task,duan_id,ngaybatdau,ngayketthuc) VALUES
   ('" . $nhanvien_id . "','" . $task . "', $duan_id,'" . $ngaybatdau . "','" . $ngayketthuc . "')";
$kq = mysqli_query($conn, $sql);
 echo "
         <script type='text/javascript'>
            window.alert('Bạn đã thêm mới dự án thành công');
            history.back();
         </script>     ";

         $tenduan = $_POST['tenduan'];
    $img = $_POST['img'];
    $sql2 = " INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status, duan_id) VALUES ('" . $tenduan . "','" . $img . "','".$loaifile."','" . $_SESSION['tentaikhoan'] . "','dự án',0,'".$duan_id."')";
    $kq = mysqli_query($ket_noi, $sql2);
}