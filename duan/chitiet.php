<?php
include('../connect.php');
session_start();
if (isset($_POST['tiendo'])) {
    $value_id = $_POST['tiendo'];
    $query = "select chitietduan.id,ghichu, chucvu.chucvu,ngaynop, nhanvien.ten, task,phantram,tiendo,file,loaifile,pheduyet,ngaybatdau,ngayketthuc
    from chitietduan join nhanvien on chitietduan.nhanvien_id = nhanvien.id 
    join chucvu on nhanvien.chucvu_id = chucvu.id where chitietduan.id = $value_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $output = '
            <tr style="font-size: 14px;">
            <th>' . $row['chucvu'] . '</th>

            <td> ' . $row['ten'] . ' </td>
            <td> ' . $row['task'] . ' </td>
            <td> ' . $row['phantram'] . '</td>

            <td> ';
    if ($row['tiendo'] == "Chậm tiến độ") {

        $output .= '<p style="color: red">' . $row['tiendo'] . ' </p>';
    } else $output .= '<p style="color: green">' . $row['tiendo'] . ' </p>
            </td>';

    $output .= '<td> ' . $row['file'] . ' </td>
            <td> ' . $row['loaifile'] . ' </td>';

    if ($row['pheduyet'] == "Không phê duyệt") {

        $output .= '<td><a href="#" width:150px class="btn btn-outline-danger disabled" tabindex="-1" role="button" aria-disabled="true">' . $row['pheduyet'] . '</a> </td>';
    } else if ($row['pheduyet'] == "Chờ phê duyệt") {

        $output .= '<td><a href="#" style ="width: 150px" class="btn btn-outline-warning disabled" tabindex="-1" role="button" aria-disabled="true">' . $row['pheduyet'] . '</a> </td>';
    } else $output .= '<td><a href="#" style ="width: 150px" class="btn btn-outline-success disabled" tabindex="-1" role="button" aria-disabled="true">' . $row['pheduyet'] . ' </a>
            </td>';

    $output .= '<td style="font-size: 14px;">' . $row['ngaynop'] . '</td>
            <td style="font-size: 14px;"> ' . $row['ngaybatdau'] . ' </td>
            <td>' . $row['ngayketthuc'] . '</td>
            <td class="radio-toolbar" style="font-size: 14px;">
            <input id="radio1" value="Phê duyệt" class="fa-regular fa-circle-check" style="opacity: 0; position: fixed; width: 0;" type="radio" name="trangthai">
            <label class="fa-regular fa-circle-check" for="pheduyet"></label>
        </td>
        <td class="radio-toolbar" style="font-size: 14px;">
            <input id="radio2" value="Không phê duyệt" class="fa-regular fa-circle-xmark" style=" opacity: 0; position: fixed; width: 0;" type="radio" name="trangthai">
            <label class="fa-regular fa-circle-xmark" for="khongpheduyet"></label>
        </td>
        </tr>
        <tr>
        <th colspan ="13" style="text-align: center">Ghi chú</th>
        </tr>
        <td colspan="13">
        <input type="text" name="ghichu" value="'.$row['ghichu'].'">
        <td>
        </tr>
        <input type="hidden" name="value_id" value="'.$value_id.'">e
        ';

    // $status_query = "SELECT * FROM noti WHERE noti_status=0";
    // $result_query = mysqli_query($conn, $status_query);
    // $count = mysqli_num_rows($result_query);
    $data = array(
        'notification' => $output,
    );
    echo json_encode($data);
}
