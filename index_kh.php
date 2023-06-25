
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
<div id="content wrapper">
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
                            <span class="mr-2 d-none d-lg-inline text-white" style="margin-left: 1400px;">Đăng nhập</span>
                            <!-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> -->
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div id="slider">
            <div class="text-content">
                <h3 class="text-heading">APERO</h3>
                <div class="text-description">Apero Technologies Group

                </div>
            </div>
        </div>

        <div id="content">
            <div id="thuy" class="content-section" style="color: black;">
                <h2 class="section-heading">APERO</h2> <!--Sử dụng lại ở các phần dưới -->
                <p class="section-sub-heading">Apero Technologies Group</p>
                <p class="about-text" style="font-size: 20px;">
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
            <div id="band" class="tour-section">
           
                <div class="content-section">
                    <h2 class="section-heading " style="color: black;" >ỨNG DỤNG </h2> <!--Sử dụng lại ở các phần dưới -->
                    <p class="section-sub-heading text-black">Sản phẩm nổi bật </p>
                
           
                    <!-- <div class="second row" style="margin-right: 30px; padding-left:80px"> -->
      <div class="col-sm-2">
        <!-- <p class="heading-slick">Hàng mới</p> -->
      </div>
      <div class="col-sm-10">
        <div class="row slick ">
          <!-- <div class="row"> -->

          <!-- <div class="slick"> -->
          <?php $sql = "SELECT *from duan ";
          // -- ORDER by created_date DESC ";
          $ketquatruyvan = $conn->query($sql);
          if ($ketquatruyvan->num_rows > 0) {
            $i = 0;
            while ($duan = $ketquatruyvan->fetch_assoc()) {
              // if ($i % 3 == 0) {
          ?>
              <?php
              // }
              ?>
              <div class="col-sm-3">
                <div class="info">
                  <div class="panel-body" style="padding: 0">
                    <a href="index_kh_duan.php?id=<?= $duan['id'] ?>">
                      <img src="<?php echo $duan['hinhanh'] ?>" class="img-responsive" style=" width:100%; object-fit: contain;border-radius: 30px;" alt="Image">
                    </a>
                  </div>
                  <div class="panel-heading text-center">
                    <a style="color: black;" href="index_kh_duan.php?id=<?= $duan['id'] ?>">
                      <?php echo $duan['tenduan']; ?>
                    </a>
                  </div>
                  <div class="text-center row">
                    <?php
                     ?></p>
                  </div>
                  <div class="row row-hide">
                    <!-- <div class="row like" style="position: absolute; left: 265px;
    bottom: 140px;">
                      <a href="./Nhom14/danh_sach_mat_hang/chi_tiet_mat_hang.php?id=<?= $matHang['sanpham_id'] ?>" style="text-decoration: none; color: #000">

                        <button ><i class="fa-regular fa-heart" style=" translate: 77px 0;border: none; box-shadow: 0 2px 4px rgb(0 0 0 / 16%); border-radius: 20px; width: 30px; height: 30px; font-size: 18px; background-color: white;"></i></button>
                      </a>
                    </div> -->
                    <div class="row tt" style="position: absolute;bottom: 100px;margin-left:40px">
                      <div class="col-md-6">
                        <!-- <select name="size" id="" style="border: none; outline: none; width: 150px; height: 25px; /* border-radius: 20px; */ text-align: center; font-size: 13px; translate: 20px 0;">
                          <option value="Size">Size</option>
                          <option value="S">S</option>
                          <option value="M">M</option>
                          <option value="L">L</option>
                          <option value="XL">XL</option>
                          <option value="XXL">XXL</option>
                        </select> -->
                      </div>
                      <div class="col-md-6" style="position: absolute;
    left: 169px;">
                        <a href="index_kh_duan.php?id=<?= $duan['id'] ?>" style="text-decoration: none;">

                          <!-- <input type="submit" class="button-capnhat text-uppercase offset-md-1 btn col-md-6" style="outline:none; background-color: #000; border-radius: 0; color: #fff; height: 25px; width: 150px; font-size: 13px; line-height: 14px;" name="btnSubmit" value="Thêm"> -->
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <?php
              // if ($i % 3 == 2) {
              ?>
              <!-- <br> -->
          <?php
            }
            // $i++;
          }
          // }
          ?>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('.slick').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
      });
    });
  </script>
  </div>

    
    <!-- Begin CONTACT SECTION -->
    <div id="lh" class="content-section" style=" margin-left: 450px;
"> 
        <h2 class="section-heading" style="margin-left: 180px;
    color: black;">CONTACT APERO</h2> <!--Sử dụng lại ở các phần dưới -->
        <!-- <p class="section-sub-heading">Fan? Drop a note!</p> -->
        <div class="map-section">
        </div>

        <div class="row contact-content">
            <div class="col col-half contact-info" style="margin-left: -350px;
    color: black;">
                <p><i class="ti-location-pin"></i>Địa chỉ: Thanh Xuân, Ha Noi, Viet Nam</p>
                <p><i class="ti-mobile"></i>Phone: (+84) 0562996203 </p>
                <p><i class="ti-email"></i>Email: admin@apero.vn</p>
            </div>

            <div class="col col-half contact-form">
                <img src="https://play-lh.googleusercontent.com/rN25n4E_A9y_hHjH9NiBLbwwi2ZnK9A5H6goyOeK3Swz9YrXnggV7TyqIH9ol4mo2ls=w3840-h2160-rw" alt="" style="width: 800px;">

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