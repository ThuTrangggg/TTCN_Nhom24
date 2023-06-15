<!DOCTYPE html>
<html lang="en">
<base href="../">
<?php include '../connect.php';
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
            <th class="sticky-header">Loại dự án</th>
            <th class="sticky-header">Phê duyệt</th>
            <th class="sticky-header">Ngày nộp</th>
            <th class="sticky-header">Ngày bắt đầu</th>
            <th class="sticky-header">Ngày kết thúc</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql1 = 'select chucvu.id, chucvu.chucvu,ngaynop, nhanvien.ten, task,phantram,tiendo,file,pheduyet,ngaybatdau,ngayketthuc from chitietduan join nhanvien on chitietduan.nhanvien_id = nhanvien.id 
        join chucvu on nhanvien.chucvu_id = chucvu.id where duan_id = "' . $duan_id . '" and nhanvien_id ="' . $_SESSION['nhanvienId'] . '" ORDER by chucvu desc, ngaynop asc';
        // echo $_SESSION['nhanvienId'];
        $result1 = mysqli_query($conn, $sql1);
        $arr = array();
        if ($result1->num_rows > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $arr[]  = array(
                    'chucvu' => $row1['chucvu'], 'ngaynop' => $row1['ngaynop'], 'ten' => $row1['ten'], 'tiendo' => $row1['tiendo'],
                    'task' => $row1['task'], 'phantram' => $row1['phantram'], 'file' => $row1['file'], 'pheduyet' => $row1['pheduyet'], 'ngaybatdau' => $row1['ngaybatdau'],
                    'ngayketthuc' => $row1['ngayketthuc']

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
                    <td> <?php echo $pheduyet ?> </td>

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

                <td style="font-size: 14px;"></td>
                <td style="font-size: 14px;"> </td>
                <td></td>

            </tr>
        <?php }
        ?>

    </tbody>
</table>
<form style="display: none" id="frmCapnhattiendo" onsubmit="return validateForm()" action="./duan/chitietduan_code.php" method="post" name="table-process" width="100%">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <center class="m-0 font-weight-bold text-primary">CẬP NHẬT TIẾN ĐỘ
            </center>
        </div>
        <div class="card-body">

            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Vị trí</th>
                        <th>Người thực hiện</th>
                        <th>Nội dung công việc</th>
                        <th>% Hoàn thành</th>
                        <th>Tiến độ</th>
                        <th>Nội dung</th>
                        <th>Phê duyệt</th>
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
                                $sqlnhanvien = "SELECT * FROM nhanvien join chucvu on nhanvien.chucvu_id = chucvu.id where chucvu_id = '" . $i . "'";
                                $resultnv = $conn->query($sqlnhanvien);
                                $nhanvien = mysqli_fetch_assoc($resultnv);

                                $sqlchitiet = "select * from chitietduan where duan_id ='" . $duan_id . "' and chucvu_id='" . $i . "'";
                                $kq1 = mysqli_query($conn, $sqlchitiet);
                                $row2 = mysqli_fetch_assoc($kq1);
                                ?>
                                <td>
                                    <select name="nhanvien_id" id="">
                                        <option value="<?= $nhanvien['id'] ?>" name="idNhanvien">
                                            <?php
                                            echo $nhanvien['tenviettat'] . '-' . $nhanvien['ten'];
                                            ?>
                                        </option>
                                    </select>
                                </td>
                                <?php
                                if ($kq1->num_rows > 0) {

                                ?>
                                    <input type="hidden" name="chitietduan_id" value="<?= $row2['id'] ?>">
                                    <td>
                                        <input class="form-control" style="wordwrap" id="txttenduan" type="text" placeholder="" value="<?= $row2['task']; ?>" name="task" />
                                    </td>
                                    <td>
                                        <input class="form-control" id="key" type="text" placeholder="" value="<?= $row2['phantram']; ?>" name="phantram" />
                                    </td>
                                    <td>
                                        <input class="form-control" id="txttenduan" type="text" placeholder="" value="<?= $row2['tiendo']; ?>" name="tiendo" />
                                        <!-- <textarea name="" id="" w cols="30" rows="10"></textarea> -->
                                    </td>
                                    <td>
                                        <input class="form-control" style="wordwrap" id="txttenduan" type="text" placeholder="" value="<?= $row2['file']; ?>" name="file" />
                                    </td>
                                    <td>
                                        <select name="pheduyet" id="">
                                            <option value="Phê duyệt">Phê duyệt</option>
                                            <option value="Phê duyệt">Không phê duyệt</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control" id="txttenduan" type="text" placeholder="" value="<?= $row2['ngaybatdau']; ?>" name="ngaybatdau" />
                                    </td>
                                    <td>
                                        <input class="form-control" id="txttenduan" type="text" placeholder="" value="<?= $row2['ngayketthuc']; ?>" name="ngayketthuc" />
                                    </td>

                                <?php  } else { ?>
                                    <input type="hidden" name="chitietduan_id" value="0">

                                    <td>
                                        <input class="form-control" style="wordwrap" id="txttenduan" type="text" placeholder="" value="" name="task" />
                                    </td>
                                    <td>
                                        <input class="form-control" id="key" type="text" placeholder="" value="" name="phantram" />
                                    </td>
                                    <td>
                                        <input class="form-control" id="txttenduan" type="text" placeholder="" value="" name="tiendo" />
                                        <!-- <textarea name="" id="" w cols="30" rows="10"></textarea> -->
                                    </td>
                                    <td>
                                        <input class="form-control" style="wordwrap" id="txttenduan" type="text" placeholder="" value="" name="file" />
                                    </td>
                                    <td>
                                        <select name="" id="">
                                            <option value="Phê duyệt">Phê duyệt</option>
                                            <option value="Phê duyệt">Không phê duyệt</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control" id="txttenduan" type="date" placeholder="" value="" name="ngaybatdau" />
                                    </td>
                                    <td>
                                        <input class="form-control" id="txttenduan" type="date" placeholder="" value="" name="ngayketthuc" />
                                    </td>
                                    
                        <?php
                                }
                            }
                        } ?>
                            </tr>
                </tbody>

            </table>
            <input type="submit" value="Lưu">
            <div class="btn" onclick="closeFrmcntd()">Hủy</div>

        </div>
    </div>
</form>
<script type="text/javascript">
    function closeFrmcntd(){
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
        if (maloaiduan.trim() == "") {
            alert("Bạn phải nhập mã loai dự án");
            document.forms["formsuaduan"]["loaiduan_id"].focus();
            return false;
        }
        if (ytuong.trim() == "") {
            alert("Bạn phải nhập ý tưởng ");
            document.forms["formsuaduan"]["tenytuong"].focus();
            return false;
        }
        if (tenbaocao.trim() == "") {
            alert("Bạn phải nhập tên báo cáo ");
            document.forms["formsuaduan"]["tenbaocao"].focus();
            return false;
        }
        if (tingtrang.trim() == "") {
            alert("Bạn phải nhập tinh trạng ");
            document.forms["formsuaduan"]["tinhtrang"].focus();
            return false;
        }
        if (chiphi.trim() == "") {
            alert("Bạn phải nhập chi phí  ");
            document.forms["formsuaduan"]["chiphi"].focus();
            return false;
        }
    }
</script>