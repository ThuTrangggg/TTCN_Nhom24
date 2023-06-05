<!DOCTYPE html>
<?php include 'connect.php';
include 'head.php';
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/unnamed.png">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./fonts/themify-icons-font/themify-icons/themify-icons.css">
    <title>Apero</title>
</head>

<body>
    <div id="main">
        <div id="header">
            <!-- Begin nav -->
            <ul id="nav">
                <li><a href="#">Trang chủ </a></li>
                <li><a href="#band">Ứng dụng </a></li>
                <!-- <li><a href="#tour">Giới thiêu </a></li> -->
                <!-- <li><a href="#contact">Tin tức  </a></li> -->
                <li>
                    <a href="#thuy">Tin tức
                        <i class="nav-arrow-down ti-angle-down"></i>
                    </a>
                    <!-- <ul class="subnav">
                        <li><a href="#">Merchandise</a></li>
                        <li><a href="#">Extras</a></li>
                        <li><a href="#">Media</a></li>
                        
                    </ul> -->
                </li>
                <li><a href="#lh">Liên hệ</a></li>

                <!-- end nav -->

                <!-- Begin search btn -->
                <div class="search-btn">
                    <i class=" search-icon ti-search"></i>
                </div>
                <!-- End search btn -->
                <?php
                if (
                    isset($_SESSION['login'])
                    && $_SESSION['login'] == 1
                    && $_SESSION['role_id'] == 3
                ) {
                ?>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['email'] ?></span>
                            <img class="img-profile rounded-circle" width="50px" src="<?= $_SESSION['img'] ?>">
                        </a>
                        <!-- Dropdown - User Information -->

                        <div id="" class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cài đặt
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                trạng thái
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php" 
                            
                            data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                        <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Bạn muốn đăng xuất?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Chọn nút "Logout" để đăng xuất</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="./logout.php">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <?php } elseif (!isset($_SESSION['login'])) {  ?><div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="login.php" id="userDropdown" role="button">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Đăng nhập</span>
                            <!-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> -->
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div id="slider">
            <div class="text-content">
                <h2 class="text-heading">APERO</h2>
                <div class="text-description">Apero Technologies Group

                </div>
            </div>
        </div>

        <div id="content">
            <div id="thuy" class="content-section">
                <h2 class="section-heading">APERO</h2> <!--Sử dụng lại ở các phần dưới -->
                <p class="section-sub-heading">Apero Technologies Group</p>
                <p class="about-text">
                    Apero Technologies Group – Startup nổi tiếng trong việc áp dụng công nghệ và trí tuệ nhân tạo… vào phát triển ứng dụng di động. Bên cạnh đó, Apero hiện nghiên cứu, phát triển và phát hành các sản phẩm softwares, AI, SAAS cho thị trường quốc tế.

                    Cụ thể, công ty đang phát triển và kinh doanh trên thị trường 4 lĩnh vực bao gồm:

                    Apero Intelligent Software: Xây dựng các phần mềm dựa trên công nghệ AI-Bigdata, SaaS và phát hành đến người dùng cuối toàn cầu trên các nền tảng Android, iOS.

                    Apero Games Studio: Sản xuất các sản phẩm game Strategy, Simulation, Casual… và phát hành đến người chơi toàn cầu trên các nền tảng Android, iOS

                    Apero Publishing: Giúp developers phát hành thành công sản phẩm của họ trong thị trường toàn cầu

                    Apero Vision Lab: Xây dựng các sản phẩm công nghệ lõi AI phục vụ creators, phát triển ngành sáng tạo nội dung.
                </p>
                <!-- <div class="member-list row ">
                    <div class="member-item col col-third text-center">
                        <p class="member-name">Rise of Defenders</p>
                        <img src="https://channel.mediacdn.vn/428462621602512896/2022/3/28/photo-1-1648466476099815416529.jpg" alt="Name" class="member-img">
                    </div>
                    <div class="member-item col col-third text-center">
                        <p class="member-name">Bird Sort Puzzle: Color Sort</p>
                        <img src="https://apero.vn/wp-content/uploads/2022/07/cs2.png" alt="Name" class="member-img">
                    </div>
                    <div class="member-item col col-third text-center">
                        <p class="member-name"> Publishing Publisher</p>
                        <img src="https://play-lh.googleusercontent.com/dtptVxrCkyzcb-1IocYfNKUY6Lwxiix8wi3I9etOSQ8zfHbYUo3-WbeHF1kcdej28Ec=w240-h480" alt="Name" class="member-img">
                    </div>
                </div> -->
            </div>

            <!-- TOUR SECTION -->
            <div id="band" class="tour-section">
                <div class="content-section">
                    <h2 class="section-heading text-white">ỨNG DỤNG </h2> <!--Sử dụng lại ở các phần dưới -->
                    <p class="section-sub-heading text-white">Sản phẩm nổi bật </p>
                    </script>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ảnh </th>
                                        <th>Tên dự án </th>
                                        <th>Tình trạng</th>
                                    </tr>
                                </thead>

                                <?php

                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "nhom_24";
                                // tạo kết nối
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                // kiểm kết nối
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                $sql = "SELECT id, hinhanh, tenduan, tinhtrang FROM duan";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // Load dữ liệu lên website
                                    while ($duan = $result->fetch_assoc()) {
                                ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $duan['id'] ?></td>
                                                <td>
                                                    <img width="100px" src="<?= $duan['hinhanh'] ?>" alt="">
                                                </td>
                                                <td><?= $duan['tenduan'] ?></td>
                                                <td><?= $duan['tinhtrang'] ?></td>


                                        </tbody>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!-- while($colum = $result->fetch_assoc()) {
 echo "id: " . $colum["id"]. " - Tên dự án: " . $colum["tenduan"].  " - hình ảnh: ". $colum["hinhanh"]. " - Tình trạng: ". $colum["tinhtrang"]."<br>";
}
} else {
echo "0 results";
 }
$conn->close();
?> -->

            <!-- <ul class="tickets-list">
                        <li>September <span class="Sold-out">Sold out</span></li>
                        <li>October <span class="Sold-out">Sold out</span></li>
                        <li>November <span class="quantity">3</span></li>
                    </ul>-->

            <!-- Places -->
            <!-- <div class="place-lists row">
                        <div class="place-item col col-third">
                            <img src="./assets/img/newyork.jpg" alt="Newyork" class="place-img">
                            <div class="place-body">
                                <h3 class="place-heading">Newyork</h3>
                                <p class="place-time">Fri 27 Nov 2016</p>
                                <p class="place-desc">Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                                <a href="" class="btn">Buy Tickets</a>
                            </div>
                        </div>
                        <div class="place-item col col-third">
                            <img src="./assets/img/paris.jpg" alt="Newyork" class="place-img">
                            <div class="place-body">
                                <h3 class="place-heading">Paris</h3>
                                <p class="place-time">Sat 28 Nov 2016</p>
                                <p class="place-desc">Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                                <a href="" class="btn">Buy Tickets</a>
                            </div>
                        </div>
                        <div class="place-item col col-third">
                            <img src="./assets/img/sanfran.jpg" alt="Newyork" class="place-img">
                            <div class="place-body">
                                <h3 class="place-heading">San Francisco</h3>
                                <p class="place-time">Sun 29 Nov 2016</p>
                                <p class="place-desc">Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                                <a href="" class="btn">Buy Tickets</a>
                            </div>
                        </div> -->
            <!-- <div class="clear"></div>  Sử dụng để khắc phục vấn đề float : Đã thay thế bằng row::after -->
        </div>
    </div>
    </div>

    <!-- Begin CONTACT SECTION -->
    <div id="lh" class="content-section" style=" margin-left: 450px;
"> 
        <h2 class="section-heading">CONTACT APERO</h2> <!--Sử dụng lại ở các phần dưới -->
        <!-- <p class="section-sub-heading">Fan? Drop a note!</p> -->
        <div class="map-section">
        </div>

        <div class="row contact-content">
            <div class="col col-half contact-info" style="margin-left: -230px;">
                <p><i class="ti-location-pin"></i>Địa chỉ: Thanh Xuân, Ha Noi, Viet Nam</p>
                <p><i class="ti-mobile"></i>Phone: (+84) 0562996203 </p>
                <p><i class="ti-email"></i>Email: admin@apero.vn</p>
            </div>

            <div class="col col-half contact-form">
                <img src="https://play-lh.googleusercontent.com/rN25n4E_A9y_hHjH9NiBLbwwi2ZnK9A5H6goyOeK3Swz9YrXnggV7TyqIH9ol4mo2ls=w3840-h2160-rw" alt="" style="width: 600px;">

                <!-- <form action="">
                            <div class="row" style="margin-left: -230px">
                                <div class="col col-half">
                                    <input type="text" name="" placeholder="Name" id="" class="form-control" required>
                                </div>
                                <div class="col col-half">
                                    <input type="email" name="" placeholder="Email" id="" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-8">
                                <div class="col col-full">
                                    <input type="text" name="" placeholder="Message" id="" class="form-control" required>
                                </div>
                            </div>
                            <input type="submit" value="SEND" class="btn mt-16" style="float: right ;">
                        </form>  -->
            </div>
        </div>

    </div>
    <!-- END contact -->

    <div class="map-section">
        <img src="https://map.coccoc.com/map/35028389351396725?borders=21.035480353414883,105.88966369628906,20.971377949994018,105.67371368408203&zoom=12" alt="">
    </div>
    </div>

    <div id="footer">
        <div class="socials-list">
            <a href="https://www.facebook.com/aperogroup"><i class="ti-facebook"></i></a>
            <a href=""><i class="ti-instagram"></i></a>
            <a href=""><i class="ti-youtube"></i></a>
            <a href=""><i class="ti-pinterest"></i></a>
            <a href=""><i class="ti-twitter-alt"></i></a>
            <a href=""><i class="ti-linkedin"></i></a>
        </div>
        <p class="copyright">
            Powered by <a href=""> </a>
        </p>
    </div>

    </div>
    <?php
    include("footer.php");
    ?>
    <!-- <a href="">New</a> -->
</body>

</html>