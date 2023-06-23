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
            <th class="sticky-header">Trạng thái</th>
            <th class="sticky-header">Ngày nộp</th>
            <th class="sticky-header">Ngày bắt đầu</th>
            <th class="sticky-header">Ngày kết thúc</th>
            <th class="sticky-header">Sửa</th>


        </tr>
    </thead>
    <tbody>
        <?php
        $sql1 = 'select chitietduan.id,ghichu, chucvu.chucvu,ngaynop, nhanvien.ten, task,phantram,tiendo,file,loaifile,pheduyet,ngaybatdau,ngayketthuc 
        from chitietduan join nhanvien on chitietduan.nhanvien_id = nhanvien.id 
        join chucvu on nhanvien.chucvu_id = chucvu.id where duan_id = "' . $duan_id . '" ORDER by chucvu desc, ngaynop desc';
        $result1 = mysqli_query($conn, $sql1);
        $arr = array();
        if ($result1->num_rows > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $arr[]  = array(
                    'id' => $row1['id'], 'ghichu' =>$row1['ghichu'],
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

                    <td>
                        <?php
                        if ($pheduyet == 'Không phê duyệt') {
                            echo '<a href="#" width:150px class="btn btn-outline-danger disabled submit-process" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . '</a>';
                        } else if ($pheduyet == 'Chờ phê duyệt') {
                            echo '<a href="#"  style ="width: 150px" class="btn btn-outline-warning disabled submit-process" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . '</a>';
                        } else echo '<a href="#" style ="width: 150px" class="btn btn-outline-success disabled submit-process" tabindex="-1" role="button" aria-disabled="true">' . $pheduyet . ' </a>';

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
<form id="frmTienDo" onsubmit="return validateForm()" action="./duan/table_tiendo_code.php" method="post" name="table-process" width="100%">
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
                            <th class="sticky-header">File đính kèm</th>
                            <th class="sticky-header">Loại file </th>
                            <th class="sticky-header">Trạng thái</th>
                            <th class="sticky-header">Ngày nộp</th>
                            <th class="sticky-header">Ngày bắt đầu</th>
                            <th class="sticky-header">Ngày kết thúc</th>
                            <th class="sticky-header" colspan="2">Phê duyệt</th>
                        </tr>
                    </thead>
                    <tbody class="form-notice">
                    </tbody>
                </table>
            </div>
            <div style="text-align: center">
                <input type="submit" class="btn btn-outline-success btn-lg" name="submitTiendo" value="Lưu">
                <div style="margin-left: 20px;" class="btn btn-outline-danger btn-lg" onclick="closeFrmtd()">Hủy</div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    function closeFrmtd() {
        document.getElementById('frmTienDo').style.display = 'none';
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


<script>
    function checkAuthorization() {
        <?php
        check();
        ?>
        // return value_id;
    }
    $(document).ready(function() {
        $('[name="submit-process"]').on('click', function(event) {
            value_id = event.target.value;
            console.log(value_id);
            table_tiendo();


        });
    });

    function table_tiendo(tiendo = '') {
        $.ajax({
                url: "./duan/chitiet.php",
                method: "POST",
                data: {
                    tiendo: value_id
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    // window.alert("ok123");
                    // history.back();
                    $('.form-notice').html(data.notification);
                    // if (data.unseen_notification > 0) {
                    //     $('.count').html(data.unseen_notification);
                    // }
                }
            })
            .done(function(data) {
                successFunction(data);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                serrorFunction();
            });

    }
    // setInterval(function() {
    //     table_tiendo();;
    // }, 2000);
    // $(document).ready(function() {
    //     $("#chitietduanId").click(function() {
    //         alert(checkAuthorization(event.target.value));
    //     });
    // });
    // 

    function openFrmTienDo() {
        document.getElementById("frmTienDo").style.display = 'block'
    }
</script>
<?php

function check()
{
    if ($_SESSION['role_id'] != 1) {
        echo "
            alert('Không có quyền truy cập')
        ";
    } else {
        echo 'openFrmTienDo()';
    }
}
?>