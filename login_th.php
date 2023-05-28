<?php
include 'connect.php';
// Lấy các dữ liệu 
$email = $_POST['email'];
$password = $_POST['matkhau'];
// Kết nối đến CSDL
$sql = " SELECT * FROM taikhoan where email = '".$email."' and matkhau = '".$password."'";
// Xem câu lệnh SQL viết có đúng hay không?
// echo $sql;
// Thực thi câu lệnh SQL trên
$login = $conn->query($sql);
if ($login->num_rows == 0) {
	// echo 'alert("0 thanh cong")';

	// echo '<script type="text/javascript">';
	// echo 'alert("Email hoặc mật khẩu không chính xác")';
	// echo '</script>';
?>
	<script>
		window.alert('Sai mật khẩu hoặc tài khoản');
		window.location.href = 'login.php';
	</script>
<?php

} else {
	while ($user = $login->fetch_assoc()) {
        $userId = $user['id'];
        $userEmail = $user['email'];
        $userRole = $user['role_id'];
        $mat_khau_cu = $user['matkhau'];
        // $userAdmin = $user['admin'];
    }
        session_start(); // Muốn làm việc với SESSION luôn phải dùng hàm khởi tạo này
        $_SESSION["login"] = 1;
        $_SESSION["role_id"] = $userRole;
        $_SESSION["ten_dang_nhap"] = $userEmail;
        // $_SESSION["gio_hang"]["mat_hang"] = array();
        // $_SESSION["gio_hang"]["tong_so"] = 0;
        // $_SESSION["gio_hang"]["tong_tien"] = 0;
        $_SESSION['userId'] = $userId;
        // $_SESSION["wishlist"]["tong_so_wishlist"] = 0;
        // $_SESSION["wishlist"]["mat_hang_wishlist"] = array();
        $_SESSION['mat_khau']=$mat_khau_cu;
        // $_SESSION['admin'] = $nguoiDungAdmin;
        // echo "
        //         <script type='text/javascript'>
        //             window.alert('Bạn đã đăng nhập thành công');
        //         </script>
        //     ";

        echo "
                <script type='text/javascript'>
                    window.location.href='index.php';
                </script>
            ";
	
	// header("Location: index.php");
}
?>