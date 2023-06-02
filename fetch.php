
<?php
include('connect.php');


if (isset($_POST['view'])) {

  if ($_POST["view"] != '') {
    $update_query = "UPDATE noti SET noti_status = 1 WHERE noti_status=0";
    mysqli_query($conn, $update_query);
  }
  $query = "SELECT * FROM noti ORDER BY ngaylap DESC LIMIT 5";
  $result = mysqli_query($conn, $query);
  $output = '';
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
   <li>
   <a href="#">
   <div>
            <div class="font-weight-bold">' . $row['tenduan'] . '</div>
            <div class="small text-gray-500">' . $row["ngaylap"] . '</div>
            <div class="small text-g  ray-500">Nhân viên ' . $row["tennhanvien"] . ' đã thêm mới ' . $row["loai"] . ' </div>
    
        </div>
   </a>
   </li>
   ';
    }
  } else {
    $output .= '
     <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
  }


  // $output='123';
  // $count = 1;
  $status_query = "SELECT * FROM noti WHERE noti_status=0";
  $result_query = mysqli_query($conn, $status_query);
  $count = mysqli_num_rows($result_query);
  $data = array(
    'notification' => $output,
    'unseen_notification'  => $count
  );
  echo json_encode($data);
}


?>