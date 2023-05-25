
<?php 
    include("../connect.php");

    $duan_id=$_GET['id'];
    $sql1 = "SELECT  id 
    FROM duan INNER JOIN ytuong ON duan.id = ytuong.duan_id
    INNER JOIN baocao as b ON duan.id = b.duan_i WHERE duan.id= '".$duan_id."' ";
    $kq1 = mysqli_query($ket_noi, $sql1);
    $so_luong = mysqli_num_rows($kq1);
    if($so_luong==0)
    {   
        $sql2 = "
             DELETE FROM `duan` WHERE `duan`.`id` = '".$duan_id."';
              ";
        $kq2 = mysqli_query($ket_noi, $sql2);

        if(isset($_GET['duan_id']))
        {
            $duan_id=$_GET['duan_id'];
            echo "
            <script type='text/javascript'>
                window.alert('Bạn đã xoá sản phẩm thành công!');
                window.location.href='duan.php?id=$loaiduan_id';
            </script>";
        }
        else
        {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã xoá sản phẩm thành công!');
                window.location.href='duan.php';
            </script>
    ";
        }
    }
    else
    {
        if(isset($_GET['loaiduan_id']))
        {
            $loaisanphamid=$_GET['loaiduan_id'];
            echo "
            <script type='text/javascript'>
                window.alert('Bạn không thể xoá sản phẩm  này!');
                window.location.href='sanpham.php?id=$loaiduan_id';
            </script>";
        }
        else
        {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn không thể xoá sản phẩm này!');
                window.location.href='toanbosanpham.php';
            </script>
    ";
        }
    }

;?>
