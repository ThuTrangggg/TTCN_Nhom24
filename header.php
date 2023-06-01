<?php
include("head.php");
//session_start();
?>

<head>
    <?php
    include("function.php");
    // $regexResult=checkPrivilege();
    // if(!$regexResult){
    //     echo "Bạn không có quyền truy cập chức năng này";exit;
    // }
    // if (!empty($_SESSION['userid'])) {
    // 
    ?>
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <?php
            // $row = mysqli_query($conn,"select")

            ?>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <?php
                if (
                    isset($_SESSION['login'])
                    && $_SESSION['login'] == 1
                ) {
                ?>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" style="height: 431px; overflow-y:scroll" aria-labelledby="alertsDropdown">
                        <h6 style="text-align: center;" class="dropdown-header"> Thông báo</h6>
                        <div id="listNotice">
                        </div>
                        <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 12, 2019</div>
                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                        </div>
                    </a> -->
                        <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Hiển thị hết thông báo</a>  -->
                    </div>
                    <a onclick="getListNotice()" class="nav-link dropdown-toggle " href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter">1 </span>
                    </a>
            <!-- <li class="dropdown">dsad
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
                <ul class="dropdown-menu"></ul>
            </li> -->
            </li>


            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['tentaikhoan'] ?></span>
                    <img class="img-profile rounded-circle" width="50px" src="<?= $_SESSION['img'] ?>">
                </a>
                <!-- Dropdown - User Information -->

                <div id="" class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Cài đặt
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        trạng thái
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            <?php } elseif (!isset($_SESSION['login'])) {  ?><div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="login.php" id="userDropdown" role="button">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Đăng nhập</span>
                    <!-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> -->
                </a>
            </li>
        <?php } ?>
        </ul>
    </nav>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn muốn đăng xuất?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn nút "Logout" để đăng xuất</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    // }
    ?>
</head>

</html>

<?php
class UserController
{
    // public Config $conn;

    // public function __construct()
    // {
    //     if(!isset($_SESSION)){
    //         session_start();
    //     }
    //     $this->conn = new Config();
    // }

    public function getData()
    {
        $sql = "SELECT * FROM taikhoan";
        $query = mysqli_query($this->conn->connect(), $sql);
        $output = "";

        if (mysqli_num_rows($query) == 0) {
            $output .= "Không có bạn bè hoạt động";
        } elseif (mysqli_num_rows($query) > 0) {
            $output = $this->getFriendList($query);
        }
        echo $output;
    }


    // public function searchUser($searchTerm){
    //     $sql = "SELECT * FROM users 
    //             WHERE NOT unique_id = {$_SESSION['unique_id']} 
    //               AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%')";
    //     $output = "";
    //     $query = mysqli_query($this->conn->connect(), $sql);
    //     if(mysqli_num_rows($query) > 0){
    //         $output .= $this->getFriendList($query);
    //     }else{
    //         $output .= "Không tìm thấy người dùng liên quan đến từ khóa";
    //     }
    //     echo $output;
    // }

    // public function getUserById($unique_id){
    //     $sql = mysqli_query($this->conn->connect(), "SELECT * FROM users WHERE unique_id = {$unique_id}");
    //     if(mysqli_num_rows($sql)>0){
    //         return mysqli_fetch_assoc($sql);
    //     }
    // }

    public function getFriendList($query): string
    {
        $rs = '';
        while ($row = mysqli_fetch_assoc($query)) {
            // select one last message
            $sql = "SELECT * FROM messages WHERE 
                             (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']}) 
                         AND (outgoing_msg_id = {$_SESSION['unique_id']} OR incoming_msg_id = {$_SESSION['unique_id']})
                         ORDER BY msg_id DESC LIMIT 1";
            $query2 = mysqli_query($this->conn->connect(), $sql);
            $data = mysqli_fetch_assoc($query2);

            $last_mess = '';
            if (mysqli_num_rows($query2) > 0) {
                $last_mess = $data['msg'];
            } else {
                $last_mess = "Không có tin nhắn";
            }

            if (strlen($last_mess) > 28) {
                $last_mess = substr($last_mess, 0, 28) . '...';
            }

            // if you are the last rep person
            $you = "";
            if (isset($data['outgoing_msg_id'])) {
                ($_SESSION['unique_id'] == $data['outgoing_msg_id']) ? $you = "Bạn: " : $you = "";
            }

            // answerer activity
            ($row['status'] == "Không hoạt động") ? $offline = "offline" : $offline = "";

            // content
            $rs .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                  <div class="content">
                    <img src="api/images/' . $row['img'] . '"/>
                    <div class="details">
                      <span>' . $row['lname'] . ' ' . $row['fname'] . '</span>
                      <div>' . $you . $last_mess . '</div>
                    </div>
                    
                  </div>
                  <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                </a>';
        }
        return $rs;
    }
}

?>
<script>
    function getListNotice() {
        const url = "header_getdata.php";
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", url, true);
        xhttp.send();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4
                //  && this.status == 200
            ) {
                // Typical action to be performed when the document is ready:
                document.getElementById("listNotice").innerHTML = xhttp.responseText;
                // var notice = JSON.parse(xhttp.responseText);
                // console.log(notice);

            }
        };
    }
</script>