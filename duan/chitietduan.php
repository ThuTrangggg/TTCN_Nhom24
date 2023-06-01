<!DOCTYPE html>
<html lang="en">
<base href="../">
<?php include '../connect.php';
?>
    <!-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

    <body>
    <?php
    // include("../connect.php");
    $duan_id = $_GET['id'];
    $sql1 = "SELECT duan.id ,duan.loaiduan_id,duan.tenduan,duan.tinhtrang, 
    duan.hinhanh,duan.chuy,duan.chiphi-COALESCE(baocao.noidung,0) 
    FROM duan
    LEFT JOIN baocao ON duan.id=baocao.duan_id 
    WHERE duan.id='" . $duan_id . "' ";

    $kq = mysqli_query($ket_noi, $sql1);


    $row1 = mysqli_fetch_array($kq);

    $duan_id = $row1["duan_id"];

    $sql2 =  "SELECT * FROM ytuong WHERE duan_id = '" . $duan_id . "' ";
    $duan_id = mysqli_query($ket_noi, $sql2);
    $row2 = mysqli_fetch_array($duan_id);

    $sql3 = "select AVG(rate) from feed_back where duan_id ='" . $duan_id . "' group by duan_id ";
    $result = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($result);
    // $sql = "select * from mis_mat_hang where id=".$id;
    // $result = $conn->query($sql);
    ?>
    <!-- breadcrumb  -->
    <section class="breadcrumbbar">
        <div class="container" style="margin-top: 50px;">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#"><?php echo $row2["ten_loaisanpham"]; ?></a></li>
                <li class="breadcrumb-item"><a href=""><?php echo $row1["ten_sanpham"]; ?></a></li>
            </ol>
        </div>
    </section>

    <!-- nội dung của trang  -->
    <section class="product-page mb-4">
        <div class="container">
            <!-- chi tiết 1 sản phẩm -->
            <div class="product-detail bg-white p-4">
                <div class="row">
                    <!-- ảnh  -->
                    <div class="col-md-6 khoianh">
                        <div class="anhto mb-4">
                            <a class="active" href="<?php echo $row1["hinhanh"]; ?>" data-fancybox="thumb-img">
                                <img class="product-image" src="<?php echo $row1["hinhanh"]; ?>" alt="<?php echo $row1["hinhanh"]; ?>" style="height: 700px; object-fit: cover">
                            </a>
                            <a href="<?php echo $row1["hinhanh"]; ?>" data-fancybox="thumb-img"></a>
                        </div>
                    </div>
                    <!-- thông tin sản phẩm: tên, giá bìa giá bán tiết kiệm, các khuyến mãi, nút chọn mua.... -->
                    <div class="col-md-6 khoithongtin">

                        <h2 style="margin-left: 50px"><?php echo $row1["ten_sanpham"]; ?></h2>
                        <h4 style="font-size: 16px;     translate: 49px 5px; ">
                            <i><b>Đánh giá:</b></i>
                            <?php if (isset($row3['AVG(rate)'])) {

                                $rate_round= round($row3['AVG(rate)']);
                                for($i = 0; $i <$rate_round; $i++){
                                    ?>
                            <i style="color: orange" class="fa-solid fa-star"></i>
                            <?php }
                        }

?>
                        </h4>
                        <h5 style="margin-left: 50px;font-size: 20px; margin-top:20px ;">

                            <?php
                            if (isset($row1['gia_ban_khuyen_mai'])) {
                            ?>
                                <div class="row" style="margin-top:15px">

                                    <div style="text-decoration:line-through; color: black; margin-left:17px; text-align: right; font-weight:bold; " class=""><?php echo number_format($row1['gia'], 0, '', '.') . 'đ'; ?></div>
                                    <div class="" style="color: red;font-weight: bold;text-align: left;margin-left: 28px;  "><?php echo number_format($row1['gia_ban_khuyen_mai'], 0, '', '.') . 'đ'; ?></div>
                                </div>
                            <?php
                            } else { ?>
                                <h3 style="color: black; margin-left: 50px;font-weight:bold">
                                <?php echo number_format($row1["gia"], 0, '', '.');
                            } ?>
                                </h3>

                        </h5>


                        <h6 style="margin-left: 50px; font-weight:bold; margin-top:20px; font-size:14px;">TÌNH TRẠNG: 
                        <?php if ($row1["tbl_sanpham.so_luong-COALESCE(tbl_giohang.so_luong,0)"] > 0) echo "CÒN HÀNG";
                                                                                                                        else echo "HẾT HÀNG"; ?></h6>

                        <form class="" method="post" action="/Nhom14/thanh_toan/themgiohang.php" id="form_them_gio_hang">

                            <div class="product-content-right-size mb-3" style="margin-left:50px; display: inline-block">
                                <select name="size" id="" style=" 
                                width: 150px;
                                height: 36px; border-radius:20px;text-align:center;font-size:13px">
                                    <option value="Size">Size</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                                <input style="margin-left: 50px; width:50px ;height:25px;font-size:13px;" class="" id="so_luong" name="so_luong" placeholder="Số lượng" type="number" value="1" min="0" max="<?= $row1["tbl_sanpham.so_luong-COALESCE(tbl_giohang.so_luong,0)"] ?>">
                            </div>

                            <input type="hidden" value="<?= $row1["sanpham_id"] ?>" name="sanpham_id" />
                            <input type="hidden" value="<?= $row1["ten_sanpham"] ?>" name="ten_sanpham" />
                            <input type="hidden" value="<?= $row1["gia"] ?>" name="gia" />
                            <input type="hidden" value="<?= $row1["tbl_sanpham.so_luong-COALESCE(tbl_giohang.so_luong,0)"] ?>" name="ton_kho" />
                            <input type="hidden" value="<?php if ($row1["tbl_sanpham.so_luong-COALESCE(tbl_giohang.so_luong,0)"] > 0) echo "Còn hàng";
                                                        else echo "Hết hàng"; ?>" name="tinh_trang" />
                            <div class="row" style="align-items: center;">

                                <input type="submit" class="button-capnhat text-uppercase offset-md-1 btn" style="background-color: #000; border-radius: 40px; color:#fff;height: 36px; width: 152px; margin-left:64px;" name="btnSubmit" value="Thêm vào giỏ hàng">

                                <button type="button" class="btn btn-info" style="width: 100px; height: 35px; margin-left: 40px; border-radius: 50px; background-color: #DAF9E6; color: #000; border: 1px solid #000;">MUA NGAY</button>
                                <!-- <a  href="/Nhom14/wishlist/them_wishlist.php"class="like-btn" style="margin:15px; ">
                                    <button <i class="fa-regular fa-heart" style="border: none; box-shadow: 0 2px 4px rgb(0 0 0 / 16%); border-radius: 20px; width: 30px; height: 30px; font-size: 18px; background-color: white;"></i></button>
                                </a> -->
                            </div>

                        </form>
                        <form class="" method="post" action="/Nhom14/wishlist/them_wishlist.php" id="form_them_gio_hang">

                            <!-- <div class="product-content-right-size mb-3" style="margin-left:50px; display: inline-block">
                                <select name="size" id="" style=" 
                                width: 150px;
                                height: 36px; border-radius:20px;text-align:center;font-size:13px">
                                    <option value="Size">Size</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                                <input style="margin-left: 50px; width:50px ;height:25px;font-size:13px;" class="" id="so_luong" name="so_luong" placeholder="Số lượng" type="number" value="1" min="0" max="<?= $row1["tbl_sanpham.so_luong-COALESCE(tbl_giohang.so_luong,0)"] ?>">
                            </div> -->

                            <input type="hidden" value="<?= $row1["sanpham_id"] ?>" name="sanpham_id" />
                            <input type="hidden" value="<?= $row1["ten_sanpham"] ?>" name="ten_sanpham" />
                            <input type="hidden" value="<?= $row1["gia"] ?>" name="gia" />
                            <input type="hidden" value="<?= $row1["tbl_sanpham.so_luong-COALESCE(tbl_giohang.so_luong,0)"] ?>" name="ton_kho" />
                            <input type="hidden" value="<?php if ($row1["tbl_sanpham.so_luong-COALESCE(tbl_giohang.so_luong,0)"] > 0) echo "Còn hàng";
                                                        else echo "Hết hàng"; ?>" name="tinh_trang" />
                            <div class="row" style="align-items: center;">
                                <a href="/Nhom14/wishlist/them_wishlist.php" class="like-btn" style="position: absolute; margin: 15px; text-decoration: none; color: black; top: 166px; left: 373px;">
                                    <button type="submit" <i class="fa-regular fa-heart" style="border: none; box-shadow: 0 2px 4px rgb(0 0 0 / 16%); border-radius: 20px; width: 30px; height: 30px; font-size: 18px; background-color: white;"></i></button>
                                </a>
                            </div>

                        </form>
                        <!--Tab-->

                        <div class="tab" style="margin-left:50px; margin-top:9px ;border:solid;border-width: 1px;">
                            <div class="tab-links" style="display:flex; border-bottom: solid;border-bottom-width:1px;">
                                <div class="tab-links-title mota" style="cursor:pointer;padding:10px 95px 2px 30px;font-weight:bold; border-right:solid;border-right-width:1px; ">
                                    <p class="mota_hover">MÔ TẢ</p>
                                </div>
                                <div class="tab-links-title chinhsach" style="cursor:pointer;padding:10px 10px 2px;font-weight:bold;">
                                    <p class="chinhsach_hover">CHÍNH SÁCH GIAO HÀNG & BẢO HÀNH</p>
                                </div>
                            </div>
                            <div class="tab-content" style="padding:15px 10px 10px 15px; color:darkgray;">
                                <div class="tab-content-mota">
                                    <h7 style="font-size:14px; word-spacing:0.09cm; margin-top:auto ;"><?php echo $row1["mo_ta"]; ?></h7>
                                </div>
                                <div class="tab-content-chinhsach" style="display:none;">
                                    <br> Giao hàng</br>

                                    <br> Hà Nội & Hồ Chí Minh 25.000đ </br>
                                    <br> Các tỉnh khác 35.000đ </br>
                                    <br> Free ship đơn hàng trên 200.000đ </br>
                                    <br> <br>Đổi hàng</br>

                                    <br>- Đổi hàng trong vòng 15 ngày trên toàn quốc (áp dụng sản phẩm nguyên giá)</br>

                                    <br>- Bảo hành trong 90 ngay với các lỗi kỹ thuật</br>

                                    <br>- Bảo hành hình in trong 365 ngày</br>
                                    </br>
                                </div>
                            </div>
                        </div>
                        <script>
                            const mota = document.querySelector(".mota")
                            const chinhsach = document.querySelector(".chinhsach")
                            if (chinhsach) {
                                chinhsach.addEventListener("click", function() {
                                    document.querySelector(".tab-content-chinhsach").style.display = "block"
                                    document.querySelector(".tab-content-mota").style.display = "none"
                                })
                            }
                            if (mota) {
                                mota.addEventListener("click", function() {
                                    document.querySelector(".tab-content-mota").style.display = "block"
                                    document.querySelector(".tab-content-chinhsach").style.display = "none"
                                })
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- het product-page -->

    <!-- COmmetn -->
    <div class="container" style="width: 722px; margin: 40px;
    float: left;">
        <!-- 1 sản phẩm -->
        <?php
        $sql_fb = "SELECT tbl_khachhang.email, detail, rate,anh, date FROM `feed_back` join tbl_khachhang on feed_back.user_id = tbl_khachhang.khachhang_id 
                     where sanpham_id='" . $sanpham_id . "'";
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
                                <?php echo $row["detail"];
                                echo $row['anh'];
                                ?>
                            </p>
                        </div>
                    </div>

                    <div class="comment-img" style="display: inline-block;">
                        <img height="100px" width="100px" style="object-fit: cover;" src="/Nhom14/assets/img/<?= $row['anh'] ?>" alt="">
                    </div>
                </div>

            <?php }
        } else { ?>

            <div style="border: 1px solid gray; font-size: 13px;height: 100px;padding: 23px; letter-spacing: 1px;">
                <div style="background: #fdf0d5; color: #6f4400;    line-height: 39px;">
                    <i class="fa-solid fa-triangle-exclamation" style="color: #c07600; margin-left: 10px"></i>
                    dự an hiện tại chưa có đánh giá
                </div>
            </div>
        <?php
        }

        ?>
    </div>
    <!-- End comment -->
    khối sản phẩm tương tự
    <!-- <section class="_1khoi spmoi">
        <div class="container-fluid">
            <div class="text-uppercase" style="font-weight:bold;font-size:large;margin:0 0 10px 6px;">Sản phẩm tương tự</div>
            <div class="noidung bg-white" style=" width: 100%;"> -->
                <!--<div class="row">-->

                <!-- <div class="khoisanpham" style="padding-bottom: 200px; display:flex;"> -->
                    <!-- 1 sản phẩm -->
                    <!-- <?php
                    //$sql = "SELECT * FROM tbl_sanpham where loaisanpham_id='" . $loaisanpham_id . "' except SELECT * from tbl_sanpham WHERE sanpham_id = '" . $row1['sanpham_id'] . "' limit 4 ";
                    //$kq = mysqli_query($ket_noi, $sql);
                    //while ($row = mysqli_fetch_array($kq)) {; ?>
                        <div class="card col-md-3" style="margin:0px 1px;">
                            <a href="/Nhom14/danh_sach_mat_hang/chi_tiet_mat_hang.php?id=<?php echo $row["sanpham_id"]; ?>" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="<?php echo $row["ten_sanpham"]; ?>">
                                <img class="card-img-top anh" style="width: 100%" src="<?php echo $row["anh"]; ?>" style="width: 23px;height: 30px" alt="<?php echo $row["anh"]; ?>">

                                <div class="card-body noidungsp">
                                    <h6 class="card-title ten"><?php echo $row["ten_sanpham"]; ?></h6>
                                    <div class="gia d-flex align-items-baseline" style="margin:auto;">
                                        <?php
                                        if (isset($row['gia_ban_khuyen_mai'])) {
                                        ?>
                                            <div style="text-decoration:line-through; color:black; " class="col-lg-6"><?php echo number_format($row['gia'], 0, '', '.') . 'đ'; ?></div>
                                            <div class="col-lg-6" style="color: red; "><?php echo number_format($row['gia_ban_khuyen_mai'], 0, '', '.') . 'đ'; ?></div>
                                        <?php
                                        } else { ?> <p> <?php echo number_format($row['gia'], 0, '', '.') . 'đ';
                                                    } ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php }; ?>
                </div>
            </div>
        </div>
    </section> -->
</body>

</html>
<?php include("../footer.php"); ?>

    