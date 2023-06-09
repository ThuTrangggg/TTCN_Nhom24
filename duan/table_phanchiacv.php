<!DOCTYPE html>
<html lang="en">
<base href="../">
<?php include '../connect.php';
include '../head.php';
$duan_id = $_GET['id'];
?>
<table id="task" class="table table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th class="sticky-header">Vị trí</th>
            <th class="sticky-header">Người thực hiện</th>
            <th class="sticky-header">Nội dung công việc</th>
            <th class="sticky-header">Ngày bắt đầu</th>
            <th class="sticky-header">Ngày kết thúc</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql1 = 'select DISTINCT(chucvu.id), chucvu.chucvu, nhanvien.ten, task,ngaybatdau,ngayketthuc from chitietduan 
        join nhanvien on chitietduan.nhanvien_id = nhanvien.id 
        join chucvu on nhanvien.chucvu_id = chucvu.id 
        where duan_id = "' . $duan_id . '"';

        $result1 = mysqli_query($conn, $sql1);
        $arr = array();
        if ($result1->num_rows > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $arr[]  = array(
                    'chucvu' => $row1['chucvu'], 'ten' => $row1['ten'],
                    'task' => $row1['task'], 'ngaybatdau' => $row1['ngaybatdau'],
                    'ngayketthuc' => $row1['ngayketthuc']

                );
            }
        }
        $length = count($arr);
        if ($length > 0) {
            for ($count = 0; $count < $length; $count++) {
                $chucvu = $arr[$count]['chucvu'];
                $ten = $arr[$count]['ten'];
                $task = $arr[$count]['task'];
                $ngaybatdau = date('d-m-Y', strtotime($arr[$count]['ngaybatdau']));
                $ngayketthuc = date('d-m-Y', strtotime($arr[$count]['ngayketthuc']));

        ?>
                <tr style="font-size: 14px;">
                    <th><?php echo $chucvu ?></th>
                    <td> <?php echo $ten ?> </td>
                    <td> <?php echo $task ?> </td>
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
                <td style="font-size: 14px;"></td>
                <td style="font-size: 14px;"> </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>
<form id="frmpccv" onsubmit="return validateForm()" action="./duan/table_phanchiacv_code.php" method="post" name="table-process" width="100%">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <center class="m-0 font-weight-bold text-primary">CẬP NHẬT TIẾN ĐỘ
            </center>
        </div>
        <div class="card-body">

            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th colspan="2">Thông tin dự án</th>

                    </tr>
                </thead>
                <?php
                $sqlthongtin = "
                select tenduan, duan.ngaylap, tinhtrang, hinhanh, chiphi, duan.mota
                from duan
                where id = '" . $duan_id . "' GROUP by duan.id";
                $resultthongtin = mysqli_query($conn, $sqlthongtin);
                $rowthongtin = mysqli_fetch_assoc($resultthongtin);
                ?>
                <tbody>
                    <tr>
                        <th> Dự án
                        </th>
                        <th>Hình ảnh</th>
                    </tr>
                    <tr>
                        <td>Tên dự án: <?= $rowthongtin['tenduan'] ?>
                            </br>Ngày lập: <?= $rowthongtin['ngaylap'] ?>
                            </br>Tình trạng: <?= $rowthongtin['tinhtrang'] ?>
                            </br>Chi phí: <?= $rowthongtin['chiphi'] ?>
                            </br>Mô tả: <?= $rowthongtin['mota'] ?>

                        </td>
                        <td><img width="150px" src="<?= $rowthongtin['hinhanh'] ?>" alt=""></td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Vị trí</th>
                        <th>Người thực hiện</th>
                        <th>Nội dung công việc</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = "select * from chucvu where id >1";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $i = $row['id']; ?>
                            <tr>
                                <th><?= $row['chucvu'] ?></th>

                                <?php
                                $sqlnhanvien = "SELECT ten, tenviettat, nhanvien.id 
                                FROM nhanvien join chucvu on nhanvien.chucvu_id = chucvu.id 
                                where chucvu_id = '" . $i . "'";
                                $resultnv = $conn->query($sqlnhanvien);
                                $nhanvien = mysqli_fetch_assoc($resultnv);

                                $sqlchitiet = "select * from chitietduan join nhanvien on nhanvien.id = chitietduan.nhanvien_id 
                                join chucvu on chucvu.id = nhanvien.chucvu_id 
                                where duan_id ='" . $duan_id . "' and chucvu.id ='" . $i . "'";
                                $kq1 = mysqli_query($conn, $sqlchitiet);
                                $row2 = mysqli_fetch_assoc($kq1);
                                ?>

                                <?php
                                if ($kq1->num_rows > 0) {
                                ?><td>
                                        <select name="nhanvien_id<?= $i ?>" id="">
                                            <option value="<?= $nhanvien['id'] ?>" name="nhanvien_id">
                                                <?php
                                                echo $nhanvien['tenviettat'] . '-' . $nhanvien['ten'];
                                                ?>
                                            </option>
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control" style="wordwrap" id="txttenduan" type="text" placeholder="" value="<?= $row2['task']; ?>" name="task<?= $i ?>" />
                                    </td>
                                    <td>
                                        <input class="form-control" id="txttenduan" type="date" placeholder="" value="<?= $row2['ngaybatdau']; ?>" name="ngaybatdau<?= $i ?>" />
                                    </td>
                                    <td>
                                        <input class="form-control" id="txttenduan" type="date" placeholder="" value="<?= $row2['ngayketthuc']; ?>" name="ngayketthuc<?= $i ?>" />
                                    </td>

                                <?php  } else { ?>
                                    <input type="hidden" name="chitietduan_id" value="0">
                                    <td>
                                        <select name="nhanvien_id<?= $i ?>" id="">
                                            <option value="<?= $nhanvien['id'] ?>" name="nhanvien_id">
                                                <?php
                                                echo $nhanvien['tenviettat'] . '-' . $nhanvien['ten'];
                                                ?>
                                            </option>
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control" style="wordwrap" id="txttenduan" type="text" placeholder="" value="" name="task<?= $i ?>" />
                                    </td>
                                    <td>
                                        <input class="form-control" id="txttenduan" type="date" placeholder="" value="" name="ngaybatdau<?= $i ?>" />
                                    </td>
                                    <td>
                                        <input class="form-control" id="txttenduan" type="date" placeholder="" value="" name="ngayketthuc<?= $i ?>" />
                                    </td>
                        <?php
                                }
                            }
                        } ?>
                            </tr>
                </tbody>

            </table>
            <input type="hidden" name="duan_id" value="<?= $duan_id ?>">

            <input type="submit" value="Lưu" name="submitpccv">
            <div class="btn" onclick="closeFrmpccv()">Hủy</div>

        </div>
    </div>
    </div>
</form>

<script type="text/javascript">
    function closeFrmpccv() {
        document.getElementById('frmpccv').style.display = 'none';
    };
</script>