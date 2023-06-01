
<?php 
    include("../connect.php");

    $taiKhoan_id=$_GET['id'];
    $sql1 = "SELECT loaiduan.id FROM loaiduan
    WHERE loaiduan.id = '".$loaiduan_id."' ";
    $kq1 = mysqli_query($ket_noi, $sql1);
    $so_luong = mysqli_num_rows($kq1);
    if($so_luong==0)
    {   
        $sql2 = "
             DELETE FROM `loaiduan` WHERE `loaiduan`.`id` = '".$loaiduan_id."';
              ";
        $kq2 = mysqli_query($ket_noi, $sql2);

        isset($_GET['loaiduan.id '])
        $loaiduan_id=$_GET['loaiduan.id'];
            echo "
            <script type='text/javascript'>
                window.alert('Bạn đã xoá sản phẩm thành công!');
                window.location.href='loaiduan/loaiduan.php?id=$loaiduan_id';
            </script>";
        
    else
        {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã xoá sản phẩm không thành công!');
                window.location.href='loaiduan/loaiduan.php';
            </script>
    ";
        }
    }
    

;?>
