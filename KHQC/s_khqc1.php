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
    $khqc=$_POST['KHQC_id'];
    $duan=$_POST['duan_id'];
    $noidung=$_FILES['noidung']['name'];
    $target = "../file/" . basename($noidung);

    $sql="UPDATE `chitietkhqc` SET `KHQC_id`='" . $khqc . "', `duan_id`='" . $duan . "',
    `noidung`='" . $noidung . "' WHERE `id`=" . $id;
    mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['noidung']['tmp_name'], $target)) {
        echo "
            <script>
            window.location = 'khqc_t.php';
            </script>
        ";
    }
    else {
        echo "Sửa không thành công";
        echo "
            <script>
            window.location = 'khqc_t.php';
            </script>
        ";
    }}
?>