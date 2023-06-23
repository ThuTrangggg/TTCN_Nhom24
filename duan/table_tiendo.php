<!DOCTYPE html>
<html lang="en">
<base href="../">
<?php include '../connect.php';
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
            <th class="sticky-header">File đính kèm</th>
            <th class="sticky-header">Loại file </th>
            <th class="sticky-header">Phê duyệt</th>
            <th class="sticky-header">Ngày nộp</th>
            <th class="sticky-header">Ngày bắt đầu</th>
            <th class="sticky-header">Ngày kết thúc</th>
            <th class="sticky-header">Sửa</th>


        </tr>
    </thead>
    <tbody>
        <?php
        $sql1 = 'select chucvu.id, chucvu.chucvu,ngaynop, nhanvien.ten, task,phantram,tiendo,file,loaifile,pheduyet,ngaybatdau,ngayketthuc from chitietduan join nhanvien on chitietduan.nhanvien_id = nhanvien.id 
        join chucvu on nhanvien.chucvu_id = chucvu.id where duan_id = "' . $duan_id . '" ORDER by chucvu desc, ngaynop asc';

        $result1 = mysqli_query($conn, $sql1);
        $arr = array();
        if ($result1->num_rows > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $arr[]  = array(
                    'id' => $row1['id'],
                    'chucvu' => $row1['chucvu'], 'ngaynop' => $row1['ngaynop'], 'ten' => $row1['ten'], 'tiendo' => $row1['tiendo'],
                    'task' => $row1['task'], 'phantram' => $row1['phantram'], 'file' => $row1['file'], 'pheduyet' => $row1['pheduyet'], 'ngaybatdau' => $row1['ngaybatdau'],
                    'ngayketthuc' => $row1['ngayketthuc'], 'loaifile'=>$row1['loaifile']
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
                $loaifile = $arr[$count]['loaifile'];
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
                    <td> <?php echo $loaifile ?> </td>

                    <td> <?php
                            if ($pheduyet == 'Không phê duyệt') {

                                echo '<a href="#" width:150px class="btn btn-outline-danger disabled" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . '</a>';
                            } else if ($pheduyet == 'Chờ phê duyệt') {

                                echo '<a href="#" style ="width: 150px" class="btn btn-outline-warning disabled" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . '</a>';
                            } else echo '<a href="#" style ="width: 150px" class="btn btn-outline-success disabled" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . ' </a>';

                            ?> </td>

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
<form id="frmTienDo" onsubmit="return validateForm()" action="./duan/chitietduan_code.php" method="post" name="table-process" width="100%">
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
                <th>Ngày nộp</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($count = 0; $count < $length; $count++) {
                $chucvu = $arr[$count]['chucvu'];
                $ten = $arr[$count]['ten'];
                $tiendo = $arr[$count]['tiendo'];
                $ngaynop = $arr[$count]['ngaynop'];
                $task = $arr[$count]['task'];
                $phantram  = $arr[$count]['phantram'];
                $file = $arr[$count]['file'];
                $loaifile = $arr[$count]['loaifile'];
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
                    <td> <?php echo $loaifile ?> </td>

                    <td> <?php
                            if ($pheduyet == 'Không phê duyệt') {

                                echo '<a href="#" width:150px class="btn btn-outline-danger disabled" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . '</a>';
                            } else if ($pheduyet == 'Chờ phê duyệt') {

                                echo '<a href="#" style ="width: 150px" class="btn btn-outline-warning disabled" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . '</a>';
                            } else echo '<a href="#" style ="width: 150px" class="btn btn-outline-success disabled" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . ' </a>';

                            ?> </td>

                    <td style="font-size: 14px;"><?= $ngaynop ?></td>
                    <td style="font-size: 14px;"> <?php echo $ngaybatdau ?> </td>
                    <td> <?php echo $ngayketthuc ?> </td>
                    <td class="sticky-header ">
                        <button id="chitietduanId" name="submit-process" class="btn btn-info" onclick="checkAuthorization(this.value)" value="<?= $arr[$count]['id'] ?>">Sửa</button>
                    </td>
                </tr>

            <?php
            }
        } else { ?>
            <tr style="font-size: 14px;">
                <th></th>

                <td></td>
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
<form id="frmTienDo" onsubmit="return validateForm()" action="./duan/chitietduan_code.php" method="post" name="table-process" width="100%">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <center class="m-0 font-weight-bold text-primary">BẢNG TIẾN ĐỘ CHUNG
            </center>
        </div>
        <div class="card-body">
            <div class="frmtiendo">

                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="sticky-header">Vị trí</th>
                            <th class="sticky-header">Người thực hiện</th>
                            <th class="sticky-header">Nội dung công việc</th>
                            <th class="sticky-header">% Hoàn thành</th>
                            <th class="sticky-header">Tiến độ</th>
                            <th class="sticky-header">Nội dung</th>
                            <th class="sticky-header">Phê duyệt</th>
                            <th class="sticky-header">Ngày nộp</th>
                            <th class="sticky-header">Ngày bắt đầu</th>
                            <th class="sticky-header">Ngày kết thúc</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($count = 0; $count < $length; $count++) {
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
                                <td> <?php
                                        if ($pheduyet == 'Không phê duyệt') {

                                            echo '<a href="#" width:150px class="btn btn-outline-danger" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . '</a>';
                                        } else if ($pheduyet == 'Chờ phê duyệt') {

                                            echo '<a href="#" style ="width: 150px" class="btn btn-outline-warning" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . '</a>';
                                        } else echo '<a href="#" style ="width: 150px" class="btn btn-outline-success" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . ' </a>';

                                        ?> </td>

                                <td style="font-size: 14px;"><?= $ngaynop ?></td>
                                <td style="font-size: 14px;"> <?php echo $ngaybatdau ?> </td>
                                <td> <?php echo $ngayketthuc ?> </td>

                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div style="text-align: center">

                <input type="submit" class="btn btn-outline-success btn-lg" name="submitCapnhattiendo" value="Lưu">
                <div style="margin-left: 20px;" class="btn btn-outline-danger btn-lg" onclick="closeFrmtd()">Hủy</div>
            </div>
        </div>
    </div>
</form>
<!-- 
<script>
    // var a = document.getElementsByName('submit-process')[4].value
    // console.log(a);

    function checkAuthorization(value_id) {
        // alert(value_id);
        return value_id;
        //     alert(value_id);
        // var id = document.getElementsByName('submit-process');
        // for(var i= 0; i<id.length; i++){
        //    var result = id[i].value;
        // }
        // console.log('id:'+ result);
        <?php
        //check();
        ?>
    }
    
    // $(document).ready(function() {
    //     $("#chitietduanId").click(function() {
    //         alert(checkAuthorization(event.target.value));
    //     });
    // });
    $(document).ready(function() {
        $('[name="submit-process"]').on('click', function(event) {
        value_id = checkAuthorization(event.target.value);
            $.ajax({
                type: 'post',
                url: './duan/chitietduan.php?id=<?= $duan_id ?>',
                data: {
                    value_id: event.target.value,
                },
                success: function(data) {
                    console.log(value_id);
                    // window.alert(value_id)
                    // openFrmTienDo();
                }
            });
        });
    });
</script> -->


<?php
function check()
{
    if ($_SESSION['role_id'] != 1) {
        echo "
            alert('Không có quyền truy cập')
        ";
    } else {
        // if (isset($_POST['submit-process'])) {
        if (!empty($_POST)) { // If you are using same page, then it'll help you to detect ajax request.
            echo '<script>
            // alert(123)
        </script>';
            // $value_id = $_POST['value_id'];
            // echo $value_id;
        }
        // echo "
        //         openFrmTienDo()
        //         ";
        // }
    }

    
}
if(isset($_POST)){
    echo '<script>
    // alert(123)
</script>';
}
?>