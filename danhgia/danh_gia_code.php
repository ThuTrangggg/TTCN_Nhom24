<?php
include '../connect.php';
$taikhoan_id = $_POST['taikhoan_id'];
$duan_id = $_POST['duan_id'];
$noidung = $_POST['noidung'];
$rate = $_POST['star'];
$anh = $_POST['img'];

$sql = "INSERT INTO feedback(taikhoan_id,duan_id,noidung,rate,img) 
VALUES ('".$duan_id."','".$taikhoan_id."','".$noidung."','".$rate."','".$anh."')";
$kq = $conn->query($sql);

?>
<!-- <script>

    alert('Bạn đã gửi đánh giá thành công');
    // location.url = '/Nhom14/danh_sach_mat_hang/chi_tiet_mat_hang.php?id=' <?=$duan_id?>;
    location = 'index_kh_duan.php'
</script> -->