<?php 
    include("../connect.php");

    $ho_ten = $_POST['txthoten'];
    $dia_chi = $_POST['txtdiachi'];
   
    $email = $_POST['txtemail'];
    $mat_khau =$_POST['txtmatkhau'];
    $sql = "
        INSERT INTO `tbl_khachhang` (`khachhang_id`, `ten_khachhang`, `dia_chi`,`mat_khau`, `email`,role_id ) VALUES (NULL, '".$ho_ten."', '".$dia_chi."', '".$mat_khau."', '".$email."',1);
        ";

    $kq = mysqli_query($ket_noi, $sql);

    echo "
        <script type='text/javascript'>
            window.alert('Bạn đã thêm mới bài viết thành công');
            window.location.href='quantrivien.php';
        </script>
    ";
;?>