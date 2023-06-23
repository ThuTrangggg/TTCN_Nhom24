<?php
include '../connect.php';
$taikhoan_id = $_POST['taikhoan_id'];
$duan_id = $_POST['duan_id'];
$noidung = $_POST['noidung'];
$rate = $_POST['star'];
$anh = $_POST['img'];

// echo $taikhoan_id;

$sql = "INSERT INTO feedback(duan_id,taikhoan_id,noidung,rate,img) 
VALUES ('".$duan_id."','".$taikhoan_id."','".$noidung."','".$rate."','".$anh."')";
$kq = $conn->query($sql);

?>
<script>

    alert('Bạn đã gửi đánh giá thành công');
      //location.url = '/TTCN_Nhom24/index_kh_duan.php?id=' ;
    ///location = 'index_kh_duan.php'
</script>