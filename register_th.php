<?php
session_start();

include 'connect.php';

$sql = "SELECT `tentaikhoan` FROM taikhoan";
$result = $conn->query($sql);

//Kiểm tra email này đã có người dùng chưa
// if($result->num_rows >0){
//     $i = 0;
//     while( $user = $result->fetch_assoc()){
//         echo($user['tentaikhoan']);
//         $i++;
//     }
// }

    if($_POST['tentaikhoan']){
            $tentaikhoan = $_POST['tentaikhoan'];
            $email = $_POST['email'];
            $password = md5($_POST['matkhau']);

            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $ngay= date("D M d, Y G:i");
            $sql="INSERT INTO `taikhoan`(`ngaylap`, `tentaikhoan`, `matkhau`, `email`,`role_id`) VALUES ('" . $ngay . "','" . $tentaikhoan . "','" . $password . "','" . $email . "','2')";
            if($conn->query($sql)){
				// Chuyển người dùng vào đăng nhập
				echo 
				"
					<script type='text/javascript'>
						window.location.href = 'login.php'
					</script>
				";
            }
            else{
                echo "<script type='text/javascript'>
					window.alert('Đăng ký thất bại.');
				</script>";
				echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
?>