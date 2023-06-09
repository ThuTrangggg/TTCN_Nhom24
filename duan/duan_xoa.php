<?php 
    include("../connect.php");

    $duan_id=$_GET['id'];
    $sql1 = "SELECT duan.id FROM duan JOIN ytuong ON  duan.id = ytuong.duan_id
    WHERE duan.id = '".$duan_id."' ";
    $kq1 = mysqli_query($conn, $sql1);

    $sql2 = "SELECT duan.id FROM duan JOIN baocao ON  duan.id = baocao.duan_id
    WHERE duan.id = '".$duan_id."' ";
    $kq2 = mysqli_query($conn, $sql1);

    $sql3 = "SELECT duan.id FROM duan JOIN feedback ON duan.id = feedback.duan_id
    WHERE duan.id = '".$duan_id."' ";
    $kq3 = mysqli_query($conn, $sql2);
    
    if($kq1 -> num_rows >0)
    { 
        ?>
        <script>
            window.alert('dự án không thể xóa, không thể xóa');
            window.location.href = 'duan.php';
        </script>
        <?php
    }
    else if($kq2->num_rows >0)
    {
        ?>
        <script>
            window.alert('dự án không thế xóa, không thể xóa');
            window.location.href = 'duan.php';
        </script>
        <?php
       
    }
    else if($kq3->num_rows >0)
    {
        ?>
        <script>
            window.alert('duan khoản đã feedback, không thể xóa');
            window.location.href = 'duan.php';
        </script>
        <?php
       
    }
    else{
        $sqlDel = 'DELETE from duan WHERE id = "'.$duan_id.'"';
        mysqli_query($conn,$sqlDel);
        ?>
        <script>
            window.alert('dự án được xóa thành công');
            window.location.href = 'duan.php';
        </script>
        <?php
    }

;?>
