<?php
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

    $id=$_POST['id'];
    $duanid=$_POST['duan_id'];
    $NVid=$_POST['nhanvien_id'];
    $tenbc=$_POST['tenbaocao'];
    $noidung=$_FILES['noidung']['name'];

    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $ngay = date("D M d, Y G:i");
    $target = "../file/" . basename($noidung);

    $sql="UPDATE `baocao` SET `duan_id`='" . $duanid . "',`nhanvien_id`='" . $NVid . "',
    `tenbaocao`='" . $tenbc . "',`noidung`='" . $noidung . "',`ngaylap`='" . $ngay . "' WHERE `id`=" . $id;
    mysqli_query($conn, $sql);
    if (move_uploaded_file($_FILES['noidung']['tmp_name'], $target)) {
        echo "
            <script>
            window.location = 'baocao_t.php';
            </script>
        ";
    }
    else {
        echo "Sửa không thành công";
        echo "
            <script>
            window.location = 'baocao_t.php';
            </script>
        ";
    }}
?>