<!DOCTYPE html>
<html lang="en">
<base href="../">
<?php include '../connect.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

include '../head.php';
$duan_id = $_GET['id'];
?>
<table id="tiendo" class="table table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th class="sticky-header">Vị trí</th>
            <th class="sticky-header">Người thực hiện</th>
            <th class="sticky-header">Nội dung công việc</th>
            <th class="sticky-header">% Hoàn thành</th>
            <th class="sticky-header">Tiến độ</th>
            <th class="sticky-header">Nội dung</th>
            <th class="sticky-header">Loại file</th>
            <th class="sticky-header">Phê duyệt</th>
            <th class="sticky-header">Ghi chú</th>
            <th class="sticky-header">Ngày nộp</th>
            <th class="sticky-header">Ngày bắt đầu</th>
            <th class="sticky-header">Ngày kết thúc</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql1 = 'select chucvu.id,ghichu, chucvu.chucvu,ngaynop, nhanvien.ten, task,phantram,tiendo,file,loaifile,pheduyet,ngaybatdau,ngayketthuc 
        from chitietduan join nhanvien on chitietduan.nhanvien_id = nhanvien.id 
        join chucvu on nhanvien.chucvu_id = chucvu.id where duan_id = "' . $duan_id . '" and nhanvien_id ="' . $_SESSION['nhanvienId'] . '" ORDER by chucvu desc, ngaynop asc';
        // echo $_SESSION['nhanvienId'];
        $result1 = mysqli_query($conn, $sql1);
        $arr = array();
        if ($result1->num_rows > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $arr[]  = array(
                    'ghichu' => $row1['ghichu'],
                    'chucvu' => $row1['chucvu'], 'ngaynop' => $row1['ngaynop'], 'ten' => $row1['ten'], 'tiendo' => $row1['tiendo'],
                    'task' => $row1['task'], 'phantram' => $row1['phantram'], 'file' => $row1['file'], 'pheduyet' => $row1['pheduyet'], 'ngaybatdau' => $row1['ngaybatdau'],
                    'ngayketthuc' => $row1['ngayketthuc'], 'loaifile' => $row1['loaifile']

                );
            }
        }
        $length = count($arr);
        if ($length > 1) {
            for ($count = 0; $count < $length; $count++) {
                $chucvu = $arr[$count]['chucvu'];
                $ten = $arr[$count]['ten'];
                $tiendo = $arr[$count]['tiendo'];
                $ngaynop = $arr[$count]['ngaynop'];
                $task = $arr[$count]['task'];
                $phantram  = $arr[$count]['phantram'];
                $file = $arr[$count]['file'];
                $pheduyet = $arr[$count]['pheduyet'];
                $loaifile = $arr[$count]['loaifile'];
                $ghichu = $arr[$count]['ghichu'];
                $ngaynop  = date('d-m-Y h:i:s', strtotime($arr[$count]['ngaynop']));
                $ngaybatdau = date('d-m-Y', strtotime($arr[$count]['ngaybatdau']));
                $ngayketthuc = date('d-m-Y', strtotime($arr[$count]['ngayketthuc']));

        ?>
                <tr style="font-size: 14px;">
                    <th><?php echo $chucvu ?></th>

                    <td> <?php echo $ten ?> </td>
                    <td> <?php echo $task ?> </td>
                    <td> <?php echo $phantram . '%' ?> </td>

                    <td> <?php
                            if ($tiendo == 'Chậm tiến độ') {

                                echo '<p style="color: red">' . $tiendo . ' </p>';
                            } else echo '<p style="color: green">' . $tiendo . ' </p>';

                            ?>
                        <p style="color: red"></p>
                        <!-- <textarea name="" id="" w cols="30" rows="10"></textarea> -->
                    </td>
                    <td> <?php echo $file ?> </td>
                    <td> <?php echo $loaifile ?> </td>
                    <td> <?php
                            if ($pheduyet == 'Không phê duyệt') {

                                echo '<a href="#" width:150px class="btn btn-outline-danger disabled" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . '</a>';
                            } else if ($pheduyet == 'Chờ phê duyệt') {

                                echo '<a href="#" style ="width: 150px" class="btn btn-outline-warning disabled" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . '</a>';
                            } else echo '<a href="#" style ="width: 150px" class="btn btn-outline-success disabled" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . ' </a>';

                            ?>
                    </td>
                    <td><?= $ghichu ?></td>
                    <td style="font-size: 14px;"><?= $ngaynop ?></td>
                    <td style="font-size: 14px;"> <?php echo $ngaybatdau ?> </td>
                    <td> <?php echo $ngayketthuc ?> </td>

                </tr>

            <?php
            }
        } else { ?>
            <tr style="font-size: 14px;">
                <th></th>

                <td></td>
                <td></td>
                <td> </td>

                <td>
                    </p>
                    <!-- <textarea name="" id="" w cols="30" rows="10"></textarea> -->
                </td>
                <td> </td>
                <td></td>
                <td></td>
                <td style="font-size: 14px;"></td>
                <td style="font-size: 14px;"> </td>
                <td></td>

            </tr>
        <?php }
        ?>

    </tbody>
</table>
<form id="frmCapnhattiendo" style="" onsubmit="return validateForm()" action="./duan/table_tiendo_code.php" method="post" name="table-process" width="100%">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <center class="m-0 font-weight-bold text-primary">CẬP NHẬT TIẾN ĐỘ
            </center>
        </div>
        <div class="card-body">
            <!-- Thông tin dự án ở form -->
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th colspan="2">Thông tin dự án</th>
                        <th colspan="2"> Thông tin nhân viên</th>
                    </tr>
                </thead>
                <?php
                $sqlthongtin = "
                select tenduan, duan.ngaylap, tinhtrang, hinhanh, chiphi, duan.mota, 
                nhanvien.ten, chucvu.chucvu, nhanvien.email, taikhoan.tentaikhoan from chitietduan join duan
                on chitietduan.duan_id = duan.id
                join nhanvien on chitietduan.nhanvien_id = nhanvien.id
                join chucvu on chucvu.id = nhanvien.chucvu_id
                left join taikhoan on taikhoan.id = nhanvien.taikhoan_id
                where duan_id ='" . $duan_id . "' and nhanvien_id ='" . $_SESSION['nhanvienId'] . "' GROUP by duan.id";
                $resultthongtin = mysqli_query($conn, $sqlthongtin);
                $rowthongtin = mysqli_fetch_assoc($resultthongtin);
                if ($resultthongtin->num_rows > 0) {
                ?>
                    <tbody>
                        <tr>
                            <th> Dự án
                            </th>
                            <th>Hình ảnh</th>
                            <th>Nhân viên</th>
                            <th>Tài khoản</th>
                        </tr>
                        <tr>
                            <td>Tên dự án: <?= $rowthongtin['tenduan'] ?>
                                </br>Ngày lập: <?= $rowthongtin['ngaylap'] ?>
                                </br>Tình trạng: <?= $rowthongtin['tinhtrang'] ?>
                                </br>Chi phí: <?= $rowthongtin['chiphi'] ?>
                                </br>Mô tả: <?= $rowthongtin['mota'] ?>

                            </td>
                            <td><img width="150px" src="<?= $rowthongtin['hinhanh'] ?>" alt=""></td>
                            <td>Tên nhân viên: <?= $rowthongtin['ten'] ?>
                                <br>Chức vụ: <?= $rowthongtin['chucvu'] ?>
                                <br>Email: <?= $rowthongtin['email'] ?>

                            </td>
                            <td>
                                <?php if (isset($rowthongtin['tentaikhoan'])) {
                                    echo 'Tài khoản: ' . $rowthongtin['tentaikhoan'] . '';
                                } else {
                                    echo 'Nhân viên chưa có tài khoản';
                                }; ?>
                            </td>
                        </tr>
                    </tbody>
                <?php } else { ?>
                    <tbody>
                        <tr>
                            <th> Dự án
                            </th>
                            <th>Hình ảnh</th>
                            <th>Nhân viên</th>
                            <th>Tài khoản</th>
                        </tr>
                        <tr>
                            <td>Tên dự án:
                                </br>Ngày lập:
                                </br>Tình trạng:
                                </br>Chi phí:
                                </br>Mô tả:
                            </td>
                            <td><img width="150px" src="" alt=""></td>
                            <td>Tên nhân viên:
                                <br>Chức vụ:
                                <br>Email:
                            </td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
            <!-- Tiến độ dự án ở form -->
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nội dung công việc</th>
                        <th>% Hoàn thành</th>
                        <th>Tiến độ</th>
                        <th>Nội dung</th>
                        <th>Loại file</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sqlCapnhat = "select chitietduan.id, duan_id, nhanvien_id, task , phantram,tiendo,file,pheduyet,ngaybatdau,ngayketthuc,ngaynop,loaifile, duan.tenduan,hinhanh from chitietduan join duan 
                    on chitietduan.duan_id = duan.id
                    where duan_id ='" . $duan_id . "' and nhanvien_id ='" . $_SESSION['nhanvienId'] . "' ORDER by ngaynop desc";
                    $resultCapnhat = mysqli_query($conn, $sqlCapnhat);
                    $rowCapnhat = mysqli_fetch_assoc($resultCapnhat);
                    ?>
                    <td>
                        <input style="border: none;" readonly type="text" value="<?= $rowCapnhat['task'] ?>" name="task">
                    </td>
                    <td>
                        <input type="range" id="tienDoRange" min="1" max="100" oninput="this.nextElementSibling.value = this.value" placeholder="" value="<?= $rowCapnhat['phantram'] ?>" name="phantram" />
                        <output><?= $rowCapnhat['phantram'] ?></output>
                    </td>
                    <td>
                        <input style="border: none;" readonly type="" id="inputTiendo" name="inputTiendo" id="">
                    </td>
                    <td>
                        <input class="form-control" id="txttenduan" type="text" placeholder="" value="" name="file" />
                    </td>
                    <td style="display: inline-block">
                        <div>

                            <input type="radio" value="báo cáo" name="loaifile" id="">
                            <label for="loaifile">báo cáo</label>
                        </div>
                        <div>

                            <input type="radio" value="ý tưởng" name="loaifile" id="">
                            <label for="loaifile">ý tưởng</label>
                        </div>
                        <div>

                            <input type="radio" value="kế hoạch MKT" name="loaifile" id="">
                            <label for="loaifile">kế hoạch MKT</label>
                        </div>
                        <div>

                            <input type="radio" value="link" name="loaifile" id="">
                            <label for="loaifile">link</label>
                        </div>

                        <!-- <select name="loaifile" id="">
                            <option value="Báo cáo">Báo cáo</option>
                            <option value="Ý tưởng">Ý tưởng</option>
                            <option value="Kế hoạch quảng cáo">Kế hoạch quảng cáo</option>
                            <option value="Link">Link</option>
                        </select> -->
                    </td>
                    <td>
                        <input class="form-control" readonly type="date" placeholder="" value="<?= $rowCapnhat['ngaybatdau'] ?>" name="ngaybatdau" />
                    </td>
                    <td>
                        <input class="form-control" readonly type="date" placeholder="" value="<?= $rowCapnhat['ngayketthuc'] ?>" name="ngayketthuc" />
                    </td>


                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="duan_id" value="<?= $rowCapnhat['duan_id'] ?>">
            <input type="hidden" name="nhanvien_id" value="<?= $rowCapnhat['nhanvien_id'] ?>">
            <input type="hidden" name="tenduan" value="<?= $rowCapnhat['tenduan'] ?>">
            <input type="hidden" name="img" value="<?= $rowCapnhat['hinhanh'] ?>">
            <div style="text-align: center">

                <input type="submit" class="btn btn-outline-success btn-lg" name="submitCapnhattiendo" value="Lưu">
                <div style="margin-left: 20px;" class="btn btn-outline-danger btn-lg" onclick="closeFrmcntd()">Hủy</div>
            </div>

        </div>
    </div>
</form>
<script type="text/javascript">
    function closeFrmcntd() {
        document.getElementById('frmCapnhattiendo').style.display = 'none';
        // document.getElementById("frmAdd").style.display = 'none';

    };

    function validateForm() {
        var tenduan = document.forms["formsuaduan"]["tenduan"].value;
        var maloaiduan = document.forms["formsuaduan"]["loaiduan_id"].value;
        var ytuong = document.forms["formsuaduan"]["tenytuong"].value;
        var tenbaocao = document.forms["formsuaduan"]["tenbaocao"].value;
        var tinhtrang = document.forms["formsuaduan"]["tinhtrang"].value;
        var chiphi = document.forms["formsuaduan"]["chiphi"].value;

        if (tenduan.trim() == "") {
            alert("Bạn phải chọn nhập tên dự án .");
            document.forms["formsuaduan"]["txttenduan"].focus();
            return false;
        }
    }
</script>

<?php
// $m = 1;

// $ngaybd = strtotime($ngaybatdau);
// $ngaykt = strtotime($ngayketthuc);
// $dayhalf = date("d/m/y", ($ngaybd + ($ngaykt - $ngaybd) / 2));
// $dayquarter = date("d/m/y", ($ngaybd + ($ngaykt - $ngaybd) / 4));
// $dayquarter2 = date("d/m/y", ($ngaybd + 3 * ($ngaykt - $ngaybd) / 4));
// $datediff = floor(($ngaykt - $ngaybd) / (60 * 60 * 24));
// // $ngaynop = strtotime($ngaynop);
// echo $ngaynop;
?>
<script>
    // document.getElementById('inputTiendo').value = 'dsad tiến độ'

    document.getElementById('tienDoRange').addEventListener("input", myfunction);
    // alert(ngaybatdau);
    // document.getElementById('inputTiendo').value = text;
    // console.log(ngaybatdau);
    // console.log('123');
    // console.log('123');

    function myfunction() {
        var tiendo = document.getElementById('tienDoRange').value;
        if (tiendo < 25) {
            document.getElementById('inputTiendo').value = 'Chậm tiến độ'
        } else if (tiendo > 50) {
            document.getElementById('inputTiendo').value = 'Đúng tiến độ'
        } else document.getElementById('inputTiendo').value = 'ok'
    }
</script>