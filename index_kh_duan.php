<!DOCTYPE html>
<html lang="en">
<base href="../">
<?php include 'connect.php';
include 'head.php';
$duan_id = $_GET['id'];
session_start();
?>

<style>
    div.stars {
        width: 270px;
        display: inline-block;
    }

    input.star {
        display: none;
    }

    label.star {
        float: right;
        padding: 5px;
        font-size: 18px;
        color: #444;
        transition: all .2s;
        font-weight: 100;

    }

    input.star:checked~label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    input.star-5:checked~label.star:before {
        color: #FE7;
        text-shadow: 0 0 10px #952;
    }

    input.star-1:checked~label.star:before {
        color: #F62;
    }

    label.star:hover {
        transform: rotate(-10deg) scale(1.3);
    }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }
</style>
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
                <!-- <li class="dropdown-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="label label-pill label-danger count" style="border-radius:20px;"></span>
                        <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>
                    </a>
                    <ul class="dropdown-menu"></ul>
                </li> -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800" style=" margin-left: 30px; margin-top: 60px;">CHI TIẾT DỰ ÁN </h1>
                    <!-- <h1 class="h3 mb-2 text-gray-800">CHI TIẾT DỰ ÁN </h1> -->
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
                                <img width="100%" style="object-fit: contain;border-radius:20px; width: 70%;
    margin-left: 70px;
}" src="<?= $rowduan['hinhanh'] ?>" alt="">
                            </div>
                            <div style="flex: 1; padding: 30px">
                                <h1><?= $rowduan['tenduan'] ?></h1>
                                <p>Ngày tạo dự án: <?= $rowduan['ngaylap'] ?></p>
                                <p>Tình trạng dự án: <?= $rowduan['tinhtrang'] ?></p>
                                <p>Mô tả: <?= $rowduan['mota'] ?></p>
                                <h4 style="font-size: 16px;     translate: 49px 5px; ">
                            <i><b>Đánh giá:</b></i>
                            <?php if (isset($row3['AVG(rate)'])){

                                
                                $rate_round= round($row3['AVG(rate)']);
                                for($i = 0; $i <$rate_round; $i++){
                                    ?>
                            <i style="color: orange" class="fa-solid fa-star"></i>
                            <?php }
                        }
                            
                            ?>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Form đáh giá -->
                    <?php

$sql1 = "SELECT * FROM duan
    WHERE id='" . $duan_id . "' ";
$kq = mysqli_query($ket_noi, $sql1);
$row1 = mysqli_fetch_array($kq);
?>
<div class="container" style="margin-top: 150px;">
    <label style="font-size: 28px;" for="">Đánh giá sản phẩm: </label>
    <div style="border: 1px solid lightgrey; padding: 40px; margin-bottom: 150px">

        <form class="form row" method="post" action="../TTCN_Nhom24/danhgia/danh_gia_code.php" id="rate">
            <div class="col-md-4">
                <div class="col-md-5">
<!-- 
                    <img height="150px" src="<?= $row1['hinhanh']; ?>" alt=""> -->
                </div>
                <div class="col-md-7">
                     <?php
                    //echo $row1['tenduan']; ?> 
                </div>

            </div>
            <br>
            <div class="col-md-6">
                <input type="hidden" value="<?= $row1["id"] ?>" name="duan_id" >
                <input type="hidden" value="<?= $_SESSION['userId'] ?>" name="taikhoan_id">
                <!-- <input type=""> -->
                <div class="row" style="align-items: center;">

                    <!-- <input type="submit" class="button-capnhat text-uppercase offset-md-1 btn" style="background-color: #000; border-radius: 40px; color:#fff;height: 36px; width: 152px; margin-left:64px;" name="btnSubmit" value="Thêm vào giỏ hàng"> -->

                    <!-- <button type="button" class="btn btn-info" style="width: 100px; height: 35px; margin-left: 40px; border-radius: 50px; background-color: #DAF9E6; color: #000; border: 1px solid #000;">MUA NGAY</button> -->
                    <!-- <a  href="/Nhom14/wishlist/them_wishlist.php"class="like-btn" style="margin:15px; ">
                <button <i class="fa-regular fa-heart" style="border: none; box-shadow: 0 2px 4px rgb(0 0 0 / 16%); border-radius: 20px; width: 30px; height: 30px; font-size: 18px; background-color: white;"></i></button>
            </a> -->
                </div>
                <?php
                ?>
                <fieldset>
                    <div class="control-group">
                        <div class="controls">
                            <input placeholder="Đánh giá của bạn" required style="outline: none; border-radius: 10px; color: black; border: 1px solid #000; translate: 0 -21px; margin-top: 50px; width: 1000px;height: 50px;" 
                            class="form-control" type="text" id="tentaikhoan" name="noidung">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="file" id="password" name="img">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">

                        <label class="col-md-6" style="display: inline-block; font-weight: 100px;margin-top: 30px;margin-left: 10px;" for="">Xếp hạng của bạn</label>

                        <div class="col-md-6 stars" style="translate: -233px -9px;">
                            <input class="star star-5" value="5" id="star-5" type="radio" name="star" />
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" value="4" id="star-4" type="radio" name="star" />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" value="3" id="star-3" type="radio" name="star" />
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" value="2" id="star-2" type="radio" name="star" />
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" value="1" id="star-1" type="radio" name="star" />
                            <label class="star star-1" for="star-1"></label>
                        </div>
                    </div>


                </fieldset>
            </div>
            <div class="col-md-1">
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <button type="submit" style="border-radius: 10px;
    translate: 0px -41px;
    border: none;
    background-color: black;
    color: #fff;
    width: 100px;
    height: 34px;
    margin-left: 1300px;" class="">Gửi đánh giá</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end frm đáh giá -->

<!-- comment -->
                    <?php
                    $sql_fb = "SELECT taikhoan.email, noidung, rate,feedback.img, date FROM `feedback` join taikhoan 
                    on feedback.taikhoan_id = taikhoan.id
                     where duan_id='" . $duan_id . "'";
        $kq_fb = mysqli_query($ket_noi, $sql_fb);
        if ($kq_fb->num_rows > 0) {
        ?>

            <div style="border: 1px solid lightgray; border-bottom: 1px solid lightgrey; font-size: 16px;padding-left: 20px; ">
                 <div style="color: #6f4400;    line-height: 39px;">Đánh giá sản phẩm</div>
                <!-- <div class="btn btn-add" href="danhgia/danh_gia.php?id=">Đánh Giá</div> -->
            </div>

            </div>
            <?php
            while ($row = mysqli_fetch_array($kq_fb)) { ?>
                <div class="comment "style= "margin-top: 30px;
    margin-left: 30px;">
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
                        <img height="100px" width="100px" style="object-fit: cover;<?= $row['img'] ?>" alt="">
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






<?php include 'footer_kh.php'?>

</html>
