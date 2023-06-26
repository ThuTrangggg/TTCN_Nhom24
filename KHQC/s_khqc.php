<?php include '../connect.php' ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <base href="../">
    <?php include '../head.php' ?>
</head>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM chitietkhqc WHERE id = " . $id;
$ketQuaTruyVan = $conn->query($sql);
if ($ketQuaTruyVan->num_rows > 0) {
    while ($ctkhqc = $ketQuaTruyVan->fetch_assoc()) {
        $khqcid = $ctkhqc['KHQC_id'];
        $duanid = $ctkhqc['duan_id'];
        $noidung = $ctkhqc['noidung'];
    }
}
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '../sidebar.php' ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <div class="card">
                    <!-- Page Heading -->
                    <div class="card-header">
                        <h5 style="text-align: center;font-weight: bold; margin:0;">SỬA CHI TIẾT KẾ HOẠCH QUẢNG CÁO</h5>
                    </div>

                    <!-- DataTales Example -->
                    <?php
                    $sql = "SELECT c.id,a.tenKHQC, b.tenloaiKHQC,d.tenduan, c.noidung FROM (khqc as a INNER JOIN loaikhqc as b on a.loaiKHQC=b.id) INNER JOIN(chitietkhqc as c INNER JOIN duan as d on c.duan_id=d.id) on a.id=c.KHQC_id;";
                    $ketQuaTruyVan = $conn->query($sql);
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="khqc/s_khqc1.php">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-2" style="color:#000">Tên kế hoạch quảng cáo: </label>
                                        <?php
                                        $sql1 = "SELECT * FROM khqc";
                                        $ketQuaTruyVan1 = $conn->query($sql1);
                                        ?>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="KHQC_id">
                                                <option value="0">Chọn kế hoạch quảng cáo</option>
                                                <?php
                                                if ($ketQuaTruyVan1->num_rows > 0) {
                                                    while ($ctkhqc1 = $ketQuaTruyVan1->fetch_assoc()) {
                                                        if ($ctkhqc1['id'] == $khqcid) {
                                                ?>
                                                            <option selected="selected" value="<?php echo $ctkhqc1['id'] ?>"><?php echo $ctkhqc1['tenKHQC'] ?></option>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <option value="<?php echo $ctkhqc1['id'] ?>"><?php echo $ctkhqc1['tenKHQC'] ?></option>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-2" style="color:#000">Tên dự án: </label>
                                        <?php
                                        $sql2 = "SELECT * FROM duan";
                                        $ketQuaTruyVan2 = $conn->query($sql2);
                                        ?>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="duan_id">
                                                <option value="0">Chọn dự án:</option>
                                                <?php
                                                if ($ketQuaTruyVan2->num_rows > 0) {
                                                    while ($ctkhqc2 = $ketQuaTruyVan2->fetch_assoc()) {
                                                        if ($ctkhqc2['id'] == $duanid) {
                                                ?>
                                                            <option selected="selected" value="<?php echo $ctkhqc2['id'] ?>"><?php echo $ctkhqc2['tenduan'] ?></option>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <option value="<?php echo $ctkhqc2['id'] ?>"><?php echo $ctkhqc2['tenduan'] ?></option>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2" style="color:#000" for="noidung">Tên file:</label>
                                        <div class="col-sm-7 ">
                                            <input type="hidden" name="size" value="1000000">
                                            <input type="file" class="form-control" name="noidung">
                                        </div>
                                    </div>
                                </div>

                                <input name="id" value="<?php echo $id; ?>" type="hidden" />

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-9">
                                            <input class="btn btn-success" type="submit" value="Lưu" name="upload" />
                                        </div>
                                    </div>
                                </div>
                                <?php require "s_khqc1.php" ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../footer.php') ?>
</body>

</html>