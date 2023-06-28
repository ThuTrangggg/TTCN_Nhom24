<?php
include("head.php");
//session_start();
?>

<head>
    <?php
    // include("function.php");
    // $regexResult=checkPrivilege();
    // if(!$regexResult){
    //     echo "Bạn không có quyền truy cập chức năng này";exit;
    // }
    // if (!empty($_SESSION['userid'])) {
    // 
    ?>
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="search.php" method="GET">
            <div class="input-group">
                <input type="search" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2" name="search" required>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="search_button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <!-- <li class="nav-item dropdown no-arrow d-sm-none"> -->
            <!-- <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a> -->
            <!-- Dropdown - Messages -->
            <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div> -->
            <!-- </li> -->
            <?php
            // $row = mysqli_query($conn,"select")

            ?>

            <!-- Nav Item - Alerts -->
            <!-- <li class="nav-item dropdown no-arrow mx-1"> -->
            <?php
            if (
                isset($_SESSION['login'])
                && $_SESSION['login'] == 1
            ) {
            ?>
                <!-- Dropdown - Alerts -->
                <div class="dropdown" data-target="#noti">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-target="#noti">
                        <span class="badge badge-danger badge-counter count" style="translate: 27px 2px;
    font-size: 9px;border-radius:10px;"></span>
                        <i class="fa-solid fa-bell"></i>
                    </a>
                    <!-- <a class="dropdown-item d-flex align-items-center" href="baocao.php">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <img src="' . $img . '" style="object-fit: cover; width: 40px; height: 40px; border-radius: 50%" alt="">

                            </div>
                        </div>
                        <div>
                            <div class="font-weight-bold">' . $tenduan . '</div>
                            <div class="small text-gray-500">' . $date . '</div>
                            <div class="small text-g  ray-500">Nhân viên ' . $tennhanvien . ' đã cập nhật ' . $loai . ' </div>

                        </div>
                    </a> -->
                    <ul id="noti" class="dropdown-notice dropdown-menu dropdown-menu-right shadow animated--grow-in" style="max-width: 400px;height: 431px;    overflow-x: hidden; overflow-y:scroll" aria-labelledby="alertsDropdown">
                    
                    </ul>
                </div>
                <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" style="height: 431px; overflow-y:scroll" aria-labelledby="alertsDropdown">
                <h6 style="text-align: center;" class="dropdown-header"> Thông báo</h6> -->
                <!-- <div id="listNotice">
                </div> -->
                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 12, 2019</div>
                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                        </div>
                    </a> -->
                <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Hiển thị hết thông báo</a>  -->
                <!-- </div> -->
                <!-- <a onclick="getListNotice()" class="nav-link dropdown-toggle " href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i> -->
                <!-- Counter - Alerts -->
                <!-- <span class="badge badge-danger badge-counter">1 </span>
            </a> -->

                </li>


                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" data-target="#profile" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['tentaikhoan'] ?></span>
                        <img class="img-profile rounded-circle" width="50px" src="<?= $_SESSION['img'] ?>">
                    </a>
                    <!-- Dropdown - User Information -->

                    <div id="profile" class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
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
    </nav>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>
    <?php
    // }
    ?>
</head>

</html>