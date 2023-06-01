<?php
 
$id = $_GET['id'];
include '../connect.php';
$sql="delete from `chitietkhqc` where id=".$id;

if($conn->query($sql)){
    echo "xóa thành công";
    echo "
        <script>
        window.location = 'khqc_t.php';
        </script>
    ";
}
 else {
    echo "Không xóa được";
    echo "
        <script>
        window.location = 'khqc_t.php';
        </script>
    ";
 }
?>