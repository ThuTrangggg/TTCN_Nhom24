<?php
session_start();

include("../connect.php");
if (isset($_POST["upload"])) {
    $errors = array();
    $file_name = $_FILES['noidung']['name'];
    $file_size = $_FILES['noidung']['size'];
    $file_tmp = $_FILES['noidung']['tmp_name'];
    $file_type = $_FILES['noidung']['type'];
    $file_parts = explode('.', $_FILES['noidung']['name']);
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
$tinhtrang = $_POST['txttinhtrang'];
$chiphi = $_POST['txtchiphi'];
$hinhanh = $_POST['hinhanh'];
$mota=$_POST['mota'];
$noidung=$_FILES['noidung']['name'];

$target = "../file/" . basename($noidung);

$sql = "
    INSERT INTO duan (tenduan,loaiduan_id,tinhtrang,hinhanh,mota,noidung,chiphi) 
    VALUES ('" . $tenduan . "','" . $maloaiduan . "','" . $tinhtrang . "',
    '" . $hinhanh . "','" . $mota . "','" . $noidung . "','" . $chiphi . "')";
    mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['noidung']['tmp_name'], $target)) {

echo "
        <script type='text/javascript'>
            window.alert('Bạn đã thêm mới dự án thành công');
        </script>
    ";

} else {
    echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
   
}
}
$sql1="SELECT * FROM duan";
$result = mysqli_query($conn, $sql1);


//$sql2 = "INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status,from_roleid, to) VALUES ('" . $tenduan . "','" . $hinhanh . "','dự án','" . $tenTaikhoan . "','thêm dự án',0,'".$_SESSION['role_id']."')";
//$kq = mysqli_query($ket_noi, $sql2);

    // $sql2 = "
    // INSERT INTO noti (tenduan,img,loai,tennhanvien,text,noti_status) VALUES ('".$tenTaikhoan."','img','dự án','Hoàng Thu Trang','123',0)";
    // $kq = mysqli_query($ket_noi, $sql2);
?>