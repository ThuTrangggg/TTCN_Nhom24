<?php 
    include("../connect.php");
    $duan_id= $_POST['duan_id'];
    $tenduan = $_POST['txttenduan'];
    $maloaiduan = $_POST['txtmaloaiduan'];
    //$ytuong = $_POST['txtytuong'];
    //$tenbaocao = $_POST['txttenbaocao'];
    $tinhtrang =$_POST['txttinhtrang'];
    $chiphi =$_POST['txtchiphi'];
        // $sql = " UPDATE duan ( tenduan, loaiduan_id, tinhtrang, chiphi)
        //  VALUES ('".$tenduan."','".$maloaiduan."','".$tinhtrang."','".$chiphi."')
        // ";
        $sql = "
        UPDATE `duan` SET `tenduan` = '".$tenduan."', `loaiduan_id` = '".$maloaiduan."', `tinhtrang`='".$tinhtrang."', `chiphi`='".$chiphi."'
        WHERE `id` = '".$duan_id."'
        ";


    $kq = mysqli_query($ket_noi, $sql);
    // if(isset($_GET['duan_id']))
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã cập nhật dự án  thành công');
                window.location.href='duan.php';
            </script>
    ";
    // $sql="UPDATE `duan` SET `tenduan`='" . $tenduan. "',
    // `loaiduan_id`='" . $maloaiduan . "',`tinhtrang`='" . $tinhtrang. "',`chiphi='" . $chiphi . "' WHERE `duan.id`=" . $id;

    
?>