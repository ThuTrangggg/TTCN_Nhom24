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
    $sql2 = " INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status, duan_id, from_roleid, to_roleid) VALUES ('" . $tenduan . "','" . $img . "','" . $loaifile . "','" . $_SESSION['tentaikhoan'] . "','dự án',0,'" . $duan_id . "','" . $_SESSION['role_id'] . "', '1')";
    $kq = mysqli_query($ket_noi, $sql2);
}

if (isset($_POST['submitTiendo'])) {
    $chitietduan_id = $_POST['value_id'];
    $ghichu = $_POST['ghichu'];
    $sqlduan = "select tenduan,hinhanh,loaifile,ten,duan_id, taikhoan_id from chitietduan join duan on chitietduan.duan_id = duan.id 
    join nhanvien on nhanvien.id =  chitietduan.nhanvien_id where chitietduan.id = '" . $chitietduan_id . "'";
    $resultduan = mysqli_query($conn, $sqlduan);
    $rowduan = mysqli_fetch_assoc($resultduan);

    if (isset($_POST['trangthai']) && $_POST['trangthai'] != '') {
        $pheduyet = $_POST['trangthai'];
        $sql = "UPDATE chitietduan set pheduyet = '$pheduyet', ghichu ='$ghichu' WHERE id= '$chitietduan_id'";
        $sql2 = "INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status, duan_id, from_roleid, to_userid) 
    VALUES ('" . $rowduan['tenduan'] . "','" . $rowduan['hinhanh'] . "','" . $rowduan['loaifile'] . "','" . $_SESSION['tentaikhoan'] . "','" . $pheduyet . "',0,'" . $rowduan['duan_id'] . "','" . $_SESSION['role_id'] . "', '".$rowduan['taikhoan_id']."')";
    } else {
        $sql = "UPDATE chitietduan set ghichu ='$ghichu' WHERE id= '$chitietduan_id'";
        $sql2 = "INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status, duan_id, from_roleid, to_userid) 
        VALUES ('" . $rowduan['tenduan'] . "','" . $rowduan['hinhanh'] . "','" . $rowduan['loaifile'] . "','" . $_SESSION['tentaikhoan'] . "','ghi chú',0,'" . $rowduan['duan_id'] . "','" . $_SESSION['role_id'] . "', '".$rowduan['taikhoan_id']."')";
    }
    $result = mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);
    echo "
    <script type='text/javascript'>
    window.alert('Bạn đã cập nhật thành công');
    history.back();
    </script>
    ";
}
