<?php
include('connect.php');
// include('sidebar.php');
$content = '';
$sql = "SELECT tenduan, baocao.ngaylap, duan.hinhanh, nhanvien.ten FROM `baocao` join nhanvien on baocao.nhanvien_id = nhanvien.id join duan on baocao.duan_id = duan.id order by baocao.ngaylap desc";
$sql2 = "SELECT tenduan, ytuong.ngaylap, duan.hinhanh, nhanvien.ten FROM `ytuong` join nhanvien on ytuong.nhanvien_id = nhanvien.id join duan on ytuong.duan_id = duan.id ORDER BY ytuong.ngaylap DESC";
// $sql3 = "SELECT * FROM `chitietkhqc` join duan on chitietkhqc.duan_id = duan.id join khqc on khqc.id = chitietkhqc.KHQC_id order by ngaylap desc";
$sql3 = "SELECT * FROM taikhoan where ngaylap ORDER BY ngaylap DESC";

$query = mysqli_query($conn, $sql);
$query2 = mysqli_query($conn, $sql2);
$query3 = mysqli_query($conn, $sql3);

if ($query->num_rows > 0) {
  while ($row = $query->fetch_assoc()) {
    $arr[] = array('tenduan' => $row['tenduan'], 'ngaylap' => $row['ngaylap'], 'loai' => 'báo cáo', 'img' => $row['hinhanh'], 'tennhanvien' => $row['ten']);
    //     $content .= '
    // <a class="dropdown-item d-flex align-items-center" href="#">
    //     <div class="mr-3">
    //         <div class="icon-circle bg-primary">
    //           <img src="' . $row['hinhanh'] . '" style="object-fit: cover; width: 40px; height: 40px; border-radius: 50%" alt="">

    //         </div>
    //     </div>
    //     <div>
    //         <div class="font-weight-bold">' . $row['tenduan'] . '</div>
    //         <div class="small text-gray-500">' . $row['ngaylap'] . '</div>
    //         <span class="small text-gray-500">Nhân viên ' . $row['ten'] . ' đã cập nhật báo cáo</span>
    //     </div>
    // </a>
    // ';
  }
  // return $array;
}
if ($query2->num_rows > 0) {
  while ($row2 = $query2->fetch_assoc()) {
    $arr[] = array('tenduan' => $row2['ten'], 'ngaylap' => $row2['ngaylap'], 'loai' => 'ý tưởng', 'img' => $row2['hinhanh'], 'tennhanvien' => $row2['ten']);
  }
  // return $array;
};

// if ($query3->num_rows > 0) {
//   while ($row3 = $query3->fetch_assoc()) {
//     $arr[] = array('tenduan' => $row3['tentaikhoan'], 'ngaylap' => $row3['ngaylap'], 'loai' => 'taikhoan', 'img' => $row3['img'],'tennhanvien'=>$row3['email']);
//   }
//   // return $array;
// }
// echo $arr;
// print_r($arr[0]['loai']);
// $max = $arr[0]['ngaylap'];
$length = count($arr);
// echo count($arr);
for ($i = 0; $i < $length; $i++) {
  for ($j = 0; $j < $length - $i - 1; $j++) {

    if ($arr[$j]['ngaylap'] < $arr[$i]['ngaylap']) {
      $temp = $arr[$i];
      $arr[$i] = $arr[$j];
      $arr[$j] = $temp;
    }
  }
}
$content2 = '';
// print_r($arr);
// $count=0;
for ($count = 0; $count < $length; $count++) {
  $loai = $arr[$count]['loai'];
  $img = $arr[$count]['img'];
  $tennhanvien = $arr[$count]['tennhanvien'];
  $tenduan = $arr[$count]['tenduan'];
  $date = date('d-m-Y', strtotime($arr[$count]['ngaylap']));
  if ($loai == 'báo cáo') {
    $content2 .= '
    <a class="dropdown-item d-flex align-items-center" href="baocao.php">
        <div class="mr-3">
            <div class="icon-circle bg-primary">
              <img src="' . $img . '" style="object-fit: cover; width: 40px; height: 40px; border-radius: 50%" alt="">
                
            </div>
        </div>
        <div>
            <div class="font-weight-bold">' . $tenduan . '</div>
            <div class="small text-gray-500">' . $date . '</div>
            <div class="small text-g  ray-500">Nhân viên ' . $tennhanvien . ' đã cập nhật ' . $loai . ' </div>
    
        </div>
    </a>
    ';
  }
  if ($loai == 'ý tưởng') {
    $content2 .= '
    <a class="dropdown-item d-flex align-items-center" href="ytuong.php">
        <div class="mr-3">
            <div class="icon-circle bg-primary">
              <img src="' . $img . '" style="object-fit: cover; width: 40px; height: 40px; border-radius: 50%" alt="">
                
            </div>
        </div>
        <div>
            <div class="font-weight-bold">' . $tenduan . '</div>
            <div class="small text-gray-500">' . $date . '</div>
            <div class="small text-gray-500">Nhân viên ' . $tennhanvien . ' đã cập nhật ' . $loai . ' </div>
    
        </div>
    </a>
    ';
  }
}
// return $array;

print_r($content2);
