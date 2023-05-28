<?php
include 'connect.php';
// Lấy các dữ liệu 
$email = $_POST['email'];
$password = $_POST['matkhau'];
// Kết nối đến CSDL
$sql = " SELECT * FROM taikhoan where email = '" . $email . "' and matkhau = '" . $password . "'";
// echo $sql;
// Thực thi câu lệnh SQL trên
$result = $conn->query($sql);
if ($result->num_rows >0) {
    while ($user = $result->fetch_assoc()) {
        $userId = $user['id'];
        $userEmail = $user['email'];
        $userRole = $user['role_id'];
        $mat_khau_cu = $user['matkhau'];
        // $userAdmin = $user['admin'];
    }
    session_start();
    $_SESSION["login"] = 1;
    $_SESSION["role_id"] = $userRole;
    $_SESSION["email"] = $userEmail;
    $_SESSION['userId'] = $userId;
    // $_SESSION["wishlist"]["tong_so_wishlist"] = 0;
    // $_SESSION["wishlist"]["mat_hang_wishlist"] = array();
    $_SESSION['mat_khau'] = $mat_khau_cu;
    // Muốn làm việc với SESSION luôn phải dùng hàm khởi tạo này
    // $status = "Đang hoạt động";
    // $sql2 = mysqli_query(
    //     $conn,
    //     "UPDATE taikhoan SET status = '{$status}' WHERE id = '{$userId}'"
    // );
    echo "
                <script type='text/javascript'>
                    window.location.href='index.php';
                </script>
            ";

    // header("Location: index.php");
} else {
    // echo 'alert("0 thanh cong")';
    // echo '<script type="text/javascript">';
    // echo 'alert("Email hoặc mật khẩu không chính xác")';
    // echo '</script>';
?>
<script>
    window.alert('Sai mật khẩu hoặc tài khoản');
    window.location.href = 'login.php';
</script>
<?php }
?>