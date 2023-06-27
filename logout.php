<?php
include 'connect.php';
session_start();
// $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
if (isset($_SESSION['userId'])) {
    $status = "0";
    $sql = mysqli_query(
        $conn,
        "UPDATE taikhoan SET online = '{$status}' WHERE id={$_SESSION['userId']}"
    );
    if ($sql) {
        session_unset();
        session_destroy();
        header("location: index.php");
    } else {
        header("location: index.php");
    }
}
// session_destroy();

?>
<script>
    alert('Đăng xuất thành công');
</script>
<?php
header('location: index.php');
?>