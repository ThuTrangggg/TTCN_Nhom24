<?php
include 'connect.php';
include './Chat/Chat.php';
$chat = new Chat();
// Lấy các dữ liệu 
$email = $_POST['email'];
$password = $_POST['matkhau'];
// Kết nối đến CSDL

$sql = " SELECT * FROM taikhoan where email = '" . $email . "' and matkhau = '" . $password . "'";

$sqlnhanvien  = "SELECT nhanvien.id FROM taikhoan 
join nhanvien 
on taikhoan.id = nhanvien.taikhoan_id where taikhoan.email = '" . $email . "' and matkhau = '" . $password . "'";
$result = mysqli_query($conn, $sqlnhanvien);
while ($row = mysqli_fetch_assoc($result)) {

    $nhanvienId = $row['id'];
    // return $nhanvienId;
}
echo $nhanvienId;
// echo $sql;
// Thực thi câu lệnh SQL trên
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($user = $result->fetch_assoc()) {
        $userId = $user['id'];
        $userEmail = $user['email'];
        $userTentaikhoan = $user['tentaikhoan'];
        $userRole = $user['role_id'];
        $mat_khau_cu = $user['matkhau'];
        $img = $user['img'];
        // $userAdmin = $user['admin'];
    }
    session_start();
    $_SESSION['nhanvienId'] = $nhanvienId;
    $_SESSION["login"] = 1;
    $_SESSION["role_id"] = $userRole;
    $_SESSION['img'] = $img;
    $_SESSION["email"] = $userEmail;
    $_SESSION['userId'] = $userId;
    $_SESSION['tentaikhoan'] = $userTentaikhoan;
    // $_SESSION["wishlist"]["tong_so_wishlist"] = 0;
    // $_SESSION["wishlist"]["mat_hang_wishlist"] = array();
    $_SESSION['mat_khau'] = $mat_khau_cu;
    $lastInsertId = $chat->insertUserLoginDetails($userId);
    $_SESSION['login_details_id'] = $lastInsertId;
    // Muốn làm việc với SESSION luôn phải dùng hàm khởi tạo này
    $status = "1";
    $sql2 = mysqli_query(
        $conn,
        "UPDATE taikhoan SET online = '{$status}' WHERE id = '{$userId}'"
    );
    if ($_SESSION['role_id'] == 3) {
        echo "
                <script type='text/javascript'>
                    window.location.href='index_kh.php';
                </script>
            ";
    } else if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) {
        echo
        "
                <script type='text/javascript'>
                    window.location.href='index.php';
                </script>
            ";
    }
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