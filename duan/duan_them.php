<?php 
    include("../connect.php");
    $tenduan = $_POST['txttenduan'];
    $maloaiduan = $_POST['txtmaloaiduan'];
    // $ytuong = $_POST['txtytuong'];
    // $tenbaocao = $_POST['txttenbaocao'];
    $tinhtrang =$_POST['txttinhtrang'];
    $chiphi =$_POST['txtchiphi'];
    
    $sql = "
    INSERT INTO duan (tenduan,loaiduan_id,tinhtrang,chiphi) VALUES ('".$tenduan."','".$maloaiduan."','".$tinhtrang."','".$chiphi."')";
    $kq = mysqli_query($ket_noi, $sql);
    echo "
        <script type='text/javascript'>
            window.alert('Bạn đã thêm mới tài khoản thành công');
            window.location.href='duan.php';
        </script>
    ";
;?>