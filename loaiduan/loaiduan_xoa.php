<?php 
    include("../connect.php");

    $loaiduan_id=$_GET['id'];
    $sql = "SELECT loaiduan.id FROM loaiduan JOIN duan ON  loaiduan.id = duan.loaiduan_id
    WHERE loaiduan.id = '".$loaiduan_id."' ";
    $kq = mysqli_query($conn, $sql);

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
        ?>
        <script>
            window.alert('xóa loại dự án thành công');
            window.location.href = 'loaiduan.php';
        </script>
        <?php
    }

;?>
