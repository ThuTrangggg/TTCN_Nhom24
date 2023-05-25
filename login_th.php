<?php
    session_start();
		// Lấy các dữ liệu 
		$email = $_POST['email'];
		$password = md5($_POST['matkhau']);
		// Kết nối đến CSDL
		include 'connect.php';
		$sql = " SELECT * FROM `taikhoan`  WHERE `email` = '" . $email . "' AND `matkhau` = '" . $password . "'";	
		// Xem câu lệnh SQL viết có đúng hay không?
		// echo $sql;
		// Thực thi câu lệnh SQL trên
		$login = mysqli_query($conn, $sql);
		if (mysqli_num_rows($login) == 0) {
			echo '<script type="text/javascript">';
			echo 'alert("Email hoặc mật khẩu không chính xác")';
			echo '</script>';
		    header("Location: login.php");

		} else {
			$_SESSION['login']['email'] = $email;
			$_SESSION['login']['role_id'] = '2';
			header("Location: index.php");
		}
    ?>