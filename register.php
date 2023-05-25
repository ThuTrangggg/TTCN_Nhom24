<?php include 'connect.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-3.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/ffff.css">
<link rel="stylesheet" href="css/register.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

</head>

<body class="bg-gradient-primary">

    <div class="container" style="with=800px;">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                        <div>
            <h2 style="text-align:center">Đăng kí tài khoản</h2>
        </div>
        <form action="register_th.php" method="POST" id="signup" class="form">
            <div class="form-field">
                <label for="username">Tên người dùng</label>
                <input type="text" name="tentaikhoan" placeholder="hong1234" id="username" autocomplete="off"/>
                <small>Error message</small>
            </div>

            <div class="form-field">
            <label for="username">Email</label>
                <input type="email" name="email" placeholder="email@gmail.com" id="email" />
                <small>Error message</small>
            </div>

            <div class="form-field">
            <label for="username">Mật khẩu</label>
                <input type="password" name="matkhau" placeholder="password" id="password"/>
                <small>Error message</small>
            </div>


            <div class="form-field">
            <label for="username">Nhập lại mật khẩu</label>
                <input type="password" placeholder="confirm password" id="confirm-password"/>
                <small>Error message</small>
            </div>

            <div class="form-field">
                <input class="button-submit" type="submit" value="Đăng ký">
            </div>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- SOCIAL PANEL HTML -->
<div class="social-panel-container">
        <div class="social-panel">
            <p>Created with <i class="fa fa-heart"></i> by
                <a target="_blank" href="https://florin-pop.com">Florin Pop</a></p>
            <button class="close-btn"><i class="fas fa-times"></i></button>
            <h4>Get in touch on</h4>
            <ul>
                <li>
                    <a href="https://www.patreon.com/florinpop17" target="_blank">
                        <i class="fab fa-discord"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/florinpop1705" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="https://linkedin.com/in/florinpop17" target="_blank">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="https://facebook.com/florinpop17" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="https://instagram.com/florinpop17" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <button class="floating-btn">
        Get in Touch
    </button>

    <script src="js/register.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>