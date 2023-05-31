<?php
include("../connect.php");

$nhanVien_id = $_GET['id'];
$sql1 = "SELECT nv.id FROM nhanvien as nv join ytuong as yt on nv.id = yt.nhanvien_id
    WHERE nv.id = '" . $nhanVien_id . "' ";
$kq1 = mysqli_query($conn, $sql1);

$sql2 = "SELECT nv.id FROM nhanvien as nv join baocao as bc on nv.id = bc.nhanvien_id
    WHERE nv.id = '" . $nhanVien_id . "' ";
$kq2 = mysqli_query($conn, $sql2);

if ($kq1->num_rows > 0 || $kq2->num_rows > 0) {
?>
    <script>
        window.alert('Nhân viên đã tham gia dự án, không thể xóa');
        window.location.href = 'danhsachnhansu.php';
    </script>
<?php
} else {
    $sqlDel = 'DELETE from nhanvien WHERE id = "' . $nhanVien_id . '"';
?>
    <script>
        if (confirm("Thực hiện xóa nhân viên này?") == true) {
            <?php
            mysqli_query($conn, $sqlDel);?>
            window.alert("Xóa thành công");
            window.location.href = "danhsachnhansu.php";
        }else{
            window.location.href = "danhsachnhansu.php";
        
        }
        </script>
<?php } 
?>