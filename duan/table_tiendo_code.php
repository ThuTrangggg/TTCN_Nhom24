<?php
session_start();
include '../connect.php';

if (isset($_POST['submitCapnhattiendo'])) {
    $duan_id = $_POST['duan_id'];
    $nhanvien_id = $_POST['nhanvien_id'];
    $task = $_POST['task'];
    $phantram = $_POST['phantram'];
    $tiendo = $_POST['inputTiendo'];
    $file = $_POST['file'];
    $loaifile = $_POST['loaifile'];
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];
    $sql = "INSERT INTO chitietduan (nhanvien_id,task,phantram,tiendo,file,ngaybatdau,ngayketthuc,duan_id,loaifile,pheduyet) 
    VALUES ($nhanvien_id,'" . $task . "',$phantram,'" . $tiendo . "','" . $file . "','" . $ngaybatdau . "','" . $ngayketthuc . "',$duan_id,'" . $loaifile . "','Chờ phê duyệt')";
    $result = mysqli_query($conn, $sql);
    echo "
    <script type='text/javascript'>
    window.alert('Bạn đã cập nhật tiến độ dự án thành công');
    history.back();
    </script>
    ";
    
    $tenduan = $_POST['tenduan'];
    $img = $_POST['img'];
    $sql2 = " INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status, duan_id) VALUES ('" . $tenduan . "','" . $img . "','".$loaifile."','" . $_SESSION['tentaikhoan'] . "','dự án',0,'".$duan_id."')";
    $kq = mysqli_query($ket_noi, $sql2);
}
