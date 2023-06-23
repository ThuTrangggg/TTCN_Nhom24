
<?php
include('connect.php');
session_start();

if (isset($_POST['view']) && $_SESSION['role_id'] == 1) {
  if ($_POST["view"] != '') {
    $update_query = "UPDATE noti SET noti_status = 1 WHERE noti_status=0 and to_roleid = '1'";
    mysqli_query($conn, $update_query);
  }
  $query = "SELECT * FROM noti where to_roleid = '1' ORDER BY ngaylap DESC LIMIT 5";
  $result = mysqli_query($conn, $query);
  $output = '
  <h6 style="text-align: center;" class="dropdown-header"> Thông báo</h6>
  ';
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
      <li style="width: 400px;">
      <a href="./duan/chitietduan.php?id=' . $row['duan_id'] . '" class="dropdown-item d-flex align-items-center">
          <div class="mr-3">
              <div class="icon-circle bg-primary">
                  <img src="' . $row['img'] . '" style="object-fit: cover; width: 40px; height: 40px; border-radius: 50%" alt="">

              </div>
          </div>
          <div>
              <div class="font-weight-bold">' . $row['tenduan'] . '</div>
              <div class="small text-gray-500">' . $row["ngaylap"] . '</div>
              <div class="small text-g  ray-500" style="white-space: normal">Nhân viên ' . $row["tennhanvien"] . ' đã thêm mới ' . $row["loai"] . ' cho 
              ' . $row['text'] . ' 
              </div>
          </div>
      </a>
  </li>
   ';
    }
  } else {
    $output .= '
     <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
  }

  $status_query = "SELECT * FROM noti WHERE noti_status=0 and to_roleid = 1";
  $result_query = mysqli_query($conn, $status_query);
  $count = mysqli_num_rows($result_query);
  $data = array(
    'notification' => $output,
    'unseen_notification'  => $count
  );
  echo json_encode($data);
} else if (isset($_POST['view']) && $_SESSION['role_id'] == 2) {
  if ($_POST["view"] != '') {
    $update_query = "UPDATE noti SET noti_status = 1 WHERE noti_status= 0 and to_userid = '".$_SESSION['userId']."'";
    mysqli_query($conn, $update_query);
  }
  $query = "SELECT * FROM noti where from_roleid = 1 and to_userid = '".$_SESSION['userId']."' ORDER BY ngaylap DESC LIMIT 5";
  $result = mysqli_query($conn, $query);
  $output = '
  <h6 style="text-align: center;" class="dropdown-header"> Thông báo</h6>
  ';
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
      <li style="width: 400px;">
      <a href="./duan/chitietduan.php?id=' . $row['duan_id'] . '" class="dropdown-item d-flex align-items-center">
          <div class="mr-3">
              <div class="icon-circle bg-primary">
                  <img src="' . $row['img'] . '" style="object-fit: cover; width: 40px; height: 40px; border-radius: 50%" alt="">

              </div>
          </div>
          <div>
              <div class="font-weight-bold">' . $row['tenduan'] . '</div>
              <div class="small text-gray-500">' . $row["ngaylap"] . '</div>
              <div class="small text-g  ray-500" style="white-space: normal"> ' . $row["tennhanvien"] . ' đã ' . $row["text"] . ' cho 
              ' . $row['loai'] . ' của dự án '.$row['tenduan'].' 
              </div>
          </div>
      </a>
  </li>
   ';
    }
  } else {
    $output .= '
     <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
  }

  $status_query = "SELECT * FROM noti WHERE noti_status=0 and to_userid = '".$_SESSION['userId']."'";
  $result_query = mysqli_query($conn, $status_query);
  $count = mysqli_num_rows($result_query);
  $data = array(
    'notification' => $output,
    'unseen_notification'  => $count
  );
  echo json_encode($data);
}


?>