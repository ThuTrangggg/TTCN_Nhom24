<?php 
    include("../connect.php");

    $tenloaiduan = $_POST['txttenloaiduan'];
    
    $sql = "
    INSERT INTO loaiduan (ten_loai_du_an) VALUES ('".$tenloaiduan."')
        ";

    $kq = mysqli_query($ket_noi, $sql);

    echo "
        <script type='text/javascript'>
            window.alert('Bạn đã thêm mới tài khoản thành công');
            window.location.href='loaiduan.php';
        </script>
    ";
;?>