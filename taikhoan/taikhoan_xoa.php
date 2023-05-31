
<?php 
    include("../connect.php");

    $taiKhoan_id=$_GET['id'];
    $sql1 = "SELECT taikhoan.id FROM taikhoan JOIN nhanvien ON  taikhoan.id = nhanvien.taikhoan_id
    WHERE taikhoan.id = '".$taiKhoan_id."' ";
    $kq1 = mysqli_query($conn, $sql1);

    $sql2 = "SELECT taikhoan.id FROM taikhoan JOIN feedback ON  taikhoan.id = feedback.taikhoan_id
    WHERE taikhoan.id = '".$taiKhoan_id."' ";
    $kq2 = mysqli_query($conn, $sql2);
    
    if($kq1 -> num_rows >0)
    { 
        ?>
        <script>
            window.alert('Tài khoản của nhân viên, không thể xóa');
            window.location.href = 'danhsachtaikhoan.php';
        </script>
        <?php
    }
    else if($kq2->num_rows >0)
    {
        ?>
        <script>
            window.alert('Tài khoản đã feedback, không thể xóa');
            window.location.href = 'danhsachtaikhoan.php';
        </script>
        <?php
       
    }
    else{
        $sqlDel = 'DELETE from taikhoan WHERE id = "'.$taiKhoan_id.'"';
        mysqli_query($conn,$sqlDel);
    }

;?>
