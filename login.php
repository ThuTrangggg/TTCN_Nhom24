<?php include 'connect.php'?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'head.php'?>
    </head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <!-- <link rel="icon" href="img/logo.jpg"> -->
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
                                    <link rel="stylesheet" href="css/login.css">
	                                <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	                                <script type="text/javascript">
		                                $(document).ready(function(){
                                            $('#eye').click(function(){
                                                $(this).toggleClass('open');
                                                $(this).children('i').toggleClass('fa-eye-slash fa-eye');
                                                if($(this).hasClass('open')){
                                                    $(this).prev().attr('type', 'text');
                                                }else{
                                                    $(this).prev().attr('type', 'password');
                                                }
                                            });
                                        });
                                        function validateForm() {
                			            // Bước 1: Lấy dữ liệu để check
                			            var email = document.getElementById("email").value;
                			            var password = document.getElementById("password").value;
                                            
                			            // Bước 2: Kiểm tra dữ liệu hợp lệ hay không?
                			            if (email == "") {
                    			            alert("Bạn chưa nhập email");
                			            } else if (password == "") {
                    			            alert("Bạn chưa nhập mật khẩu");
            		    	            } else {
                		    	            return true;
            			                }
            			                return false;
        			                    }
                                    </script>

                                        <form class="user" action="login_th.php" method="POST" id="form-login" onsubmit="return validateForm()">
                                            <h1 class="form-heading">Đăng nhập</h1>
                                            <div class="form-group">
                    			                <i class="far fa-user"></i>
                                                <input id="email" name="email" type="email" class="form-input" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <i class="fas fa-key"></i>
                                                <input id="password" name="matkhau" type="password" class="form-input" placeholder="Mật khẩu">
                                                <div id="eye">
                                                    <i class="far fa-eye"></i>
                                                </div>
                                            </div>
                                            <input type="submit" value="Đăng nhập" class="form-submit">
                                            <div class="form-add">
                    			                Nếu chưa có Tài khoản, hãy đăng kí <a href="register.php" class='form-link'>Tại đây</a>
                                            </div>
                                            <hr>
                                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                                <i class="fab fa-google fa-fw"></i> Login with Google
                                            </a>
                                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                            </a>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="register.html">Create an Account!</a>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>