
<?php
include('../connect.php');


if(isset($_POST['view'])){

// // $con = mysqli_connect("localhost", "root", "", "notif");

// // if($_POST["view"] != '')
// // {
// $update_query = "UPDATE noti SET noti_status = 1 WHERE noti_status=0";
// mysqli_query($con, $update_query);
// // }
// $query = "SELECT * FROM noti ORDER BY ngaylap DESC LIMIT 5";
// $result = mysqli_query($con, $query);
// $output = '';
// if (mysqli_num_rows($result) > 0) {
//   while ($row = mysqli_fetch_array($result)) {
//     $output .= '
//    <li>
//    <a href="#">
//    <strong>' . $row["noti_status"] . '</strong><br />
//    <small><em>' . $row["comment_text"] . '</em></small>
//    </a>
//    </li>
//    ';
//   }
// } else {
//   $output .= '
//      <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
// }

$output = '123';
$count = 1;
// $count = 1;
// $status_query = "SELECT * FROM noti WHERE comment_status=0";
// $result_query = mysqli_query($con, $status_query);
// $count = mysqli_num_rows($result_query);
$data = array(
  'notification' => $output,
  'unseen_notification'  => $count
);

echo json_encode($data);
}


?>