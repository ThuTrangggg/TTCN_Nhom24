<?php
session_start();

include("../connect.php");
if (isset($_POST["upload"])) {
    $errors = array();
    $file_name = $_FILES['mota']['name'];
    $file_size = $_FILES['mota']['size'];
    $file_tmp = $_FILES['mota']['tmp_name'];
    $file_type = $_FILES['mota']['type'];
    $file_parts = explode('.', $_FILES['mota']['name']);
    $file_ext = strtolower(end($file_parts));
    $expensions = array("docx", "pdf","jpg","png");
    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "Chỉ hỗ trợ upload file docx hay pdf.";
    }
    if ($file_size > 2097152) {
        $errors[] = 'Kích thước file không được lớn hơn 2MB';
    }
    #retrieve file title

$tenTaikhoan = $_SESSION['tentaikhoan'];
$tenduan = $_POST['txttenduan'];
$maloaiduan = $_POST['txtmaloaiduan'];
// $ytuong = $_POST['txtytuong'];
// $tenbaocao = $_POST['txttenbaocao'];
$tinhtrang = $_POST['txttinhtrang'];
$chiphi = $_POST['txtchiphi'];
$img = $_POST['txthinhanh'];
$mota = $_FILES['mota']['name'];

$target = "../file/" . basename($mota);

$sql = "
    INSERT INTO duan (tenduan,loaiduan_id,tinhtrang,hinhanh,mota,chiphi) VALUES ('" . $tenduan . "','" . $maloaiduan . "','" . $tinhtrang . "','" . $img . "','" . $mota . "','" . $chiphi . "')";
    mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['mota']['tmp_name'], $target)) {

echo "
        <script type='text/javascript'>
            window.alert('Bạn đã thêm mới dự án thành công');
            window.location.href='duan.php';
        </script>
    ";

} else {
    echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
    echo "
        <script>
        window.location = 'duan.php';
        </script>
    ";
}
}
$sql1="SELECT * FROM ytuong";
$result = mysqli_query($conn, $sql1);


$sql2 = "
    INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status,from_roleid, to) VALUES ('" . $tenduan . "','" . $img . "','dự án','" . $tenTaikhoan . "','thêm dự án',0,'".$_SESSION['role_id']."')";
$kq = mysqli_query($ket_noi, $sql2);

    // $sql2 = "
    // INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status) VALUES ('".$tenTaikhoan."','img','dự án','Hoàng Thu Trang','123',0)";
    // $kq = mysqli_query($ket_noi, $sql2);
;
?>