<?php 
    include("../connect.php");

    $loaiduan_id=$_GET['id'];
    $sql = "SELECT duan.id FROM duan JOIN loaiduan ON  duan.loaiduan_id = loaiduan.id
    WHERE loaiduan.id = '".$loaiduan_id."' ";
    $kq = mysqli_query($conn, $sql);

    // $sql2 = "SELECT taikhoan.id FROM taikhoan JOIN feedback ON  taikhoan.id = feedback.taikhoan_id
    // WHERE taikhoan.id = '".$taiKhoan_id."' ";
    // $kq2 = mysqli_query($conn, $sql2);
    if($kq -> num_rows >0)
    { 
        ?>
        <script>
            window.alert('loại dự án đã tồn tại trong dự án, không thể xóa');
            window.location.href = 'loaiduan.php';
        </script>
        <?php
    }
    
    else{
        $sqlDel = 'DELETE from loaiduan WHERE id = "'.$loaiduan_id.'"';
        mysqli_query($conn,$sqlDel);
    }

;?>
