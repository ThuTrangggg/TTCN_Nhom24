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
            <!-- <th class="sticky-header">Phê duyệt</th> -->
            <th class="sticky-header">Ngày nộp</th>
            <th class="sticky-header">Ngày bắt đầu</th>
            <th class="sticky-header">Ngày kết thúc</th>
        </tr>
    </thead>
    <tbody>
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
                                $sqlchitiet = "select * from chitietduan join nhanvien on nhanvien.id = chitietduan.nhanvien_id 
                                join chucvu on chucvu.id = nhanvien.chucvu_id 
                                where duan_id ='" . $duan_id . "' and chucvu.id ='" . $i . "' and pheduyet = 'Phê duyệt' ORDER by phantram DESC LIMIT 1 " ;
                                $kq1 = mysqli_query($conn, $sqlchitiet);
                                $row2 = mysqli_fetch_assoc($kq1);
                                
                                $sqlnhanvien = "SELECT ten, tenviettat, nhanvien.id 
                                FROM nhanvien join chucvu on nhanvien.chucvu_id = chucvu.id 
                                where chucvu_id = '" . $i . "'";
                                $resultnv = $conn->query($sqlnhanvien);
                                $nhanvien = mysqli_fetch_assoc($resultnv);
                                ?>

                                <?php
                                if ($kq1->num_rows > 0) {
                                ?><td>
                                         <?= $row2['ten']; ?>
                                    </td>
                                    <td>
                                        <?= $row2['task']; ?>
                                    </td>
                                    <td>
                                        <?= $row2['phantram']; ?>
                                    </td>
                                    <td>
                                        <?= $row2['tiendo']; ?>
                                    </td>
                                    <td>
                                        <?= $row2['file']; ?>
                                    </td>
                                    <td>
                                        <?= $row2['loaifile']; ?>
                                    </td>
                                    <td>
                                       <?= $row2['ngaynop']; ?>
                                    </td>
                                    <td>
                                        <?= $row2['ngaybatdau']; ?>
                                    </td>
                                    <td>
                                        <?= $row2['ngayketthuc']; ?>"
                                    </td>

                                <?php  } else { ?>
                                    <input type="hidden" name="chitietduan_id" value="0">
                                    <td>
                                    
                                    </td>
                                    
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                       
                                    </td>
                                    <td>
                                       
                                    </td>
                        <?php
                                }
                            }
                        } ?>
                            </tr>
                </tbody>
</table>