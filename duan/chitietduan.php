<!DOCTYPE html>
<html lang="en">
<?php include '../connect.php';
include '../head.php';
$duan_id = $_GET['id'];
?>
<!-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

<body>

    <!-- Page Wrapper -->
    <div id="wrapper" style="width: 100%">

        <!-- Sidebar -->
        <?php include '../sidebar.php';
        ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php include '../header.php' ?>
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">TỔNG QUAN VỀ DỰ ÁN
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
                            <div style="flex: 1; display: flex; justify-content: center">
                                <img style="object-fit: contain; width: 300px; border-radius: 50px;" src="<?= $rowduan['hinhanh'] ?>" alt="">
                            </div>
                            <div style="flex: 2; padding: 30px">
                                <h1><?= $rowduan['tenduan'] ?></h1>
                                <p>Ngày tạo dự án: <?= $rowduan['ngaylap'] ?></p>
                                <p>Tình trạng dự án: <?= $rowduan['tinhtrang'] ?></p>
                                <p>Mô tả: <?= $rowduan['mota'] ?></p>
                                <i><b>Đánh giá:</b></i>
                                <?php if (isset($row3['AVG(rate)'])) {


                                    $rate_round = round($row3['AVG(rate)']);
                                    for ($i = 0; $i < $rate_round; $i++) {
                                ?>
                                        <i style="color: orange" class="fa-solid fa-star"></i>
                                <?php }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <!-- BẢNG PCCV -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">BẢNG PHÂN CHIA CÔNG VIỆC
                                <div class="btn btn-add" onclick="openFrmpccv()">Thêm</div>
                                <div class="btn btn-add" onclick="openFrmpccv()">Sửa</div>
                            </h6>
                        </div>
                        <script>
                            function openFrmpccv() {
                                document.getElementById("frmpccv").style.display = 'block'
                            }
                        </script>

                        <div class="card-body">
                            <div class="table-responsive ">
                                <?php
                                $sqlcheck = "select * from chitietduan where duan_id = '" . $duan_id . "'";
                                $result = mysqli_query($conn, $sqlcheck);
                                include "table_phanchiacv.php";
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.BẢNG TIẾN ĐỘ -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">BẢNG TIẾN ĐỘ
                                <!-- <div class="btn btn-add" onclick="checkAuthorization()">Sửa</div> -->
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="" style="height: 500px; overflow: scroll; position: relative">
                                <?php
                                $sqlcheck = "select * from chitietduan where duan_id = '" . $duan_id . "'";
                                $result = mysqli_query($conn, $sqlcheck);
                                include "table_tiendo.php";
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.BẢNG HOÀN CHỈNH -->
                    <?php if ($_SESSION['role_id'] == 1) { ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">FINAL
                                    <!-- <div class="btn btn-add" onclick="openFrmAdd()">Thêm</div> -->
                                </h6>
                            </div>
                            <script>
                                function openFrmAdd() {
                                    document.getElementById("frmAdd").style.display = 'block'
                                }
                            </script>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <?php
                                    $sqlcheck = "select * from chitietduan where duan_id = '" . $duan_id . "'";
                                    $result = mysqli_query($conn, $sqlcheck);
                                    include "table_final.php";
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <!-- /.BẢNG CAP NHAT TIEN DO -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">CẬP NHẬT TIẾN ĐỘ
                                    <div class="btn btn-add" onclick="openFrmcapnhattiendo()">Thêm</div>
                                </h6>
                            </div>
                            <script>
                                function openFrmcapnhattiendo() {
                                    document.getElementById("frmCapnhattiendo").style.display = 'block'
                                }
                            </script>
                            <div class="card-body">
                                <div class="table-responsive " style="height: 500px; overflow: scroll;">
                                    <?php
                                    $sqlcheck = "select * from chitietduan where duan_id = '" . $duan_id . "'";
                                    $result = mysqli_query($conn, $sqlcheck);
                                    include "table_capnhattiendo.php";

                                    ?>
                                    <script>
                                    </script>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->


            <!-- End of Footer -->

        </div>
    </div>
    <!-- End of Content Wrapper -->
    <div id="frmAdd" class="justify-content-center">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Thêm mới dự án </h3>
            </div>
            <div class="card-body">
                <form method="POST" id="noti_frm" action="duan/duan_them.php" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <label for="txttenduan">Tên dự án </label>
                        <input class="form-control" id="txttenduan" type="text" placeholder="Tên dự án" name="txttenduan" />
                    </div>
                    <!-- <div class="form-floating mb-3">
                            <label for="txtmaloaiduan">Mã loại dự án </label>
                            <input class="form-control" id="txtmaloaiduan" type="text" placeholder="Mã loại dự án " name="txtmaloaiduan" />
                        </div> -->
                    <div class="form-floating mb-3">
                        <label for="txtmaloaiduan">Loại dự án </label>
                        <select class="form-control" name="txtmaloaiduan" id="txtmaloaiduan">
                            <Option value="#"></Option>

                            <?php $sql = "SELECT *
                                    FROM loaiduan";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $i = 1;
                                while ($loaiduan = $result->fetch_assoc()) {
                            ?>
                                    <option value="<?= $loaiduan['id'] ?>"><?= $loaiduan['ten_loai_du_an'] ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <!-- <div class="form-floating mb-3">
                            <label for="txtytuong">Ý tưởng </label>
                            <input class="form-control" id="txtytuong" type="text" placeholder="Ý tưởng" name="txtytuong" />
                        </div> -->
                    <!-- <div class="form-floating mb-3">
                            <label for="txttenbaocao">Tên báo cáo  </label>
                            <input class="form-control" id="txttenbaocao" type="text" placeholder="Tên báo cáo " name="txttenbaocao" />
                        </div> -->
                    <div class="form-floating mb-3">
                        <label for="txttinhtrang">Tình trạng </label>
                        <select class="form-control" name="txttinhtrang" id="txtmaloaiduan">
                            <Option value="#"></Option>
                            <option value="1">Đang thực hiện</option>
                            <option value="2">Hoàn thành</option>
                            <option value="3">Tạm dừng</option>

                            <!-- <option value="3">3</option> -->
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="txtchiphi">Chi phí </label>
                        <input class="form-control" id="txtchiphi" type="text" placeholder="Chi phí  " name="txtchiphi" />
                    </div>
                    <div class="form-floating mb-3">
                        <label for="txtchiphi">Mô tả</label>
                        <input class="col-sm-4 form-control" id="txtchiphi" type="text" placeholder="Mô tả dự án" name="txtmota" />
                        <input class="col-sm-4 form-control" id="txtchiphi" type="file" placeholder="Mô tả dự án" name="txtmota" />
                    </div>
                    <div class="form-floating mb-3">
                        <label for="txtchiphi">Hình ảnh</label>
                        <input class="col-sm-4 form-control" id="txtchiphi" type="text" placeholder="Mô tả dự án" name="txthinhanh" />
                        <input class="col-sm-4 form-control" id="txtchiphi" type="file" placeholder="Mô tả dự án" name="txthinhanh" />
                    </div>
                    <!-- <div class="form-floating mb-3">
                            <label for="txtchiphi">Hình ảnh </label>
                            <input class="form-control" id="txtimg" type="file" placeholder="Hình ảnh" name="txtimg" />
                        </div> -->
                    <div class="mt-4 mb-0 btn-frm">
                        <ul>
                            <li>

                                <input type="submit" class="btn" name="btnSubmit" value="Thêm">
                            </li>
                            <li>

                                <div class="btn" onclick="closeFrm()">Hủy</div>
                            </li>
                        </ul>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        function closeFrm() {
            document.getElementById("frmAdd").style.display = 'none';
        }
    </script>
    <!-- End of Page Wrapper -->
    </div>
</body>

<?php
include '../footer.php'
?>

</html>