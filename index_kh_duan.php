<!DOCTYPE html>
<html lang="en">
<base href="../">
<?php include 'connect.php';
include 'head.php';
$duan_id = $_GET['id'];
?>
<!-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

<body>

    <!-- Page Wrapper -->
    <div id="wrapper" style="width: 100%">

        <!-- Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php //include 'header.php' ?> 
                <li class="dropdown-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="label label-pill label-danger count" style="border-radius:10px;"></span>
                        <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>
                    </a>
                    <ul class="dropdown-menu"></ul>
                </li>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">CHI TIẾT DỰ ÁN </h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">TỔNG QUAN VỀ DỰ ÁN -->
                            </h6>
                        </div>
                        <?php
                        $sqlcheck = "select * from duan where id = '" . $duan_id . "'";
                        $result = mysqli_query($conn, $sqlcheck);
                        $rowduan = mysqli_fetch_assoc($result);
                        ?>
                        <?php
                        $sql3 = "select AVG(rate) from feedback where duan_id ='" . $duan_id . "' group by duan_id ";
                        $result = mysqli_query($conn, $sql3);
                        $row3 = mysqli_fetch_array($result);
                        ?>
                        <script>
                            function openFrmAdd() {
                                document.getElementById("frmAdd").style.display = 'block'
                            }
                        </script>
                        <div class="card-body" style="display: flex; justify-content: space-around;">
                            <div style="flex: 1;">
                                <img width="100%" style="object-fit: contain;" src="<?= $rowduan['hinhanh'] ?>" alt="">
                            </div>
                            <div style="flex: 1; padding: 30px">
                                <h1><?= $rowduan['tenduan'] ?></h1>
                                <p>Ngày tạo dự án: <?= $rowduan['ngaylap'] ?></p>
                                <p>Tình trạng dự án: <?= $rowduan['tinhtrang'] ?></p>
                                <p>Mô tả: <?= $rowduan['mota'] ?></p>
                                <h4 style="font-size: 16px;     translate: 49px 5px; ">
                            <i><b>Đánh giá:</b></i>
                            <?php if (isset($row3['AVG(rate)'])) 

                                $rate_round= round($row3['AVG(rate)']);
                                for($i = 0; $i <$rate_round; $i++){
                                    ?>
                            <i style="color: orange" class="fa-solid fa-star"></i>
                            <?php }?>
                            </div>
                        </div>
                        
                    </div>
                    <!-- BẢNG TIẾN ĐỘ -->
                    <?php
                    $sql_fb = "SELECT taikhoan.email, noidung, rate,feedback.img, date FROM `feedback` join taikhoan 
                    on feedback.taikhoan_id = taikhoan.id
                     where duan_id='" . $duan_id . "'";
        $kq_fb = mysqli_query($ket_noi, $sql_fb);
        if ($kq_fb->num_rows > 0) {
        ?>
            <div style="border: 1px solid lightgray; border-bottom: 1px solid lightgrey; font-size: 16px;padding-left: 20px; ">

                <div style="color: #6f4400;    line-height: 39px;">

                    Đánh giá sản phẩm
                    <i class="fa-regular fa-face-smile"></i>
                </div>
            </div>
            <?php
            while ($row = mysqli_fetch_array($kq_fb)) { ?>
                <div class="comment">
                    <div>

                        <div class="comment-user">
                            <i class="avatar fa-solid fa-circle-user"></i>
                            <div class="comment-info">
                                <?= $row['email'] ?>

                                <div class="comment-rate">
                                    <?php
                                    $n = $row['rate'];
                                    for ($i = 0; $i < $n; $i++) {
                                    ?> <i class="fa-solid fa-star"></i>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="comment-date">
                            <?php echo $row['date'] ?>
                        </div>
                        <div class="comment-detail">
                            <p>
                                <?php echo $row["noidung"];
                                echo $row['img'];
                                ?>
                            </p>
                        </div>
                    </div>

                    <div class="comment-img" style="display: inline-block;">
                        <img height="100px" width="100px" style="object-fit: cover;" src="/Nhom14/assets/img/<?= $row['img'] ?>" alt="">
                    </div>
                </div>

            <?php }
        } else { ?>

            <div style="border: 1px solid gray; font-size: 13px;height: 100px;padding: 23px; letter-spacing: 1px;">
                <div style="background: #fdf0d5; color: #6f4400;    line-height: 39px;">
                    <i class="fa-solid fa-triangle-exclamation" style="color: #c07600; margin-left: 10px"></i>
                    Sản phẩm hiện tại chưa có đánh giá
                </div>
            </div>
        <?php
        }

        ?>
    </div>
              
            <script>
                function closeFrm() {
                    document.getElementById("frmAdd").style.display = 'none';
                }
            </script>
            <!-- End of Page Wrapper -->

</body>






<?php include 'footer.php'?>

</html>
