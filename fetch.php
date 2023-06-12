
<?php
include('connect.php');


if (isset($_POST['view'])) {

  if ($_POST["view"] != '') {
    $update_query = "UPDATE noti SET noti_status = 1 WHERE noti_status=0";
    mysqli_query($conn, $update_query);
  }
  $query = "SELECT * FROM noti ORDER BY ngaylap DESC LIMIT 5";
  $result = mysqli_query($conn, $query);
  $output = '
  <h6 style="text-align: center;" class="dropdown-header"> Thông báo</h6>
  ';
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
      <li>
      <a href="#" class="dropdown-item d-flex align-items-center">
          <div class="mr-3">
              <div class="icon-circle bg-primary">
                  <img src="' . $row['img'] . '" style="object-fit: cover; width: 40px; height: 40px; border-radius: 50%" alt="">

              </div>
          </div>
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