<!-- <base href="../"> -->
<link rel="stylesheet" href="../css/style2.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
// session_start();
// include_once "api/app/controller/AuthController.php";
// include_once "api/app/Config.php";
// include_once "api/app/controller/UserController.php";

// $auth = new AuthController();
// $auth->checkAuth();

// $user = new UserController();
// $row = $user->getUserById($_GET['user_id']);
// $row = $_SESSION['userId'];

include '../connect.php';
include '../head.php';
if (isset($_SESSION['login'])) {

    $sql = 'select * from taikhoan where role_id = 1 or role_id = 2 order by status desc ';
    $result = $conn->query($sql);
?>

    <body>
        <div class="wrapper" style="display:flex; width:350px; flex-direction: column">
            <div class="chat-section">

                <!-- <section class="users"> -->
                <div class="chat-section-header" onclick="openChat()">
                    <b>

                        <center>Messenger</center>
                    </b>
                </div>
                <div class="search" style="">
                    <div style="display: flex; margin-top: 10px">
                        <input class="" style="width: 100%" type="text" name="search" id="" placeholder="Nhập tên để tìm kiếm">
                        <button class=""><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="chat-section-list">
                    <?php if ($result->num_rows > 0) {
                        // echo $result->num_rows;
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <!-- <div class="chat-area-wrap chat-area"> -->
                            <div class="chat-section-item">
                                <div class="content" style="display: inline-flex;">
                                    <img width="50px" height="50px" style="object-fit: cover; border-radius: 50%" src="<?php echo $row['img']; ?>" alt="">
                                    <div class="details">
                                        <?php
                                        if ($row['status'] != 'Không hoạt động') {
                                        ?>
                                            <span style="display: block;">
                                                <?php
                                                echo
                                                $row['tentaikhoan']
                                                ?>
                                                <i style="color:green" class="dot-active fa-solid fa-circle"></i>
                                            </span>
                                            <span style="color: green">
                                                <?= $row['status']; ?>
                                            </span>
                                        <?php
                                        } else { ?>
                                            <span style="display: block;"><?php
                                                                            echo
                                                                            $row['tentaikhoan']
                                                                            ?>
                                                <i class="dot-active fa-solid fa-circle"></i></span>
                                            <span>
                                            <?= $row['status'];
                                        } ?>
                                            </span>
                                    </div>
                                </div>
                            </div>

                            <!-- </section> -->

                    <?php  }
                    } ?>
                </div>
            </div>
            <div class="users-list">
            </div>
            <!-- <script src="assets/users-event.js"></script> -->
            <?php
             function getData(){
        $sql = "SELECT * FROM users WHERE NOT unique_id = {$_SESSION['unique_id']} ORDER BY  user_id DESC";
        $query = mysqli_query($conn, $sql);
        $output = "";

        if(mysqli_num_rows($query) == 0){
            $output .= "Không có bạn bè hoạt động";
        }elseif(mysqli_num_rows($query)>0){
            $output = $this->getFriendList($query);
        }
        echo $output;
    }?>
<script>
    
const usersList = document.querySelector(".users-list");

setInterval(() => {
	let xhr = new XMLHttpRequest();
	xhr.open("POST", 'api/users.php', true);
	xhr.onload = () => {
		if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
			if(!searchBar.classList.contains("active")){
				usersList.innerHTML = xhr.response;
			}
		}
	}
	xhr.send();
}, 500)
</script>
            <!-- <div id="chat" class="chat-close">
                <div class="chat">
                    <div class="chat outgoing">
                        <div class="details">
                            <p>out going</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <div class="details">
                            <p>incoming</p>
                        </div>
                    </div>

                </div>
                <div>

                    <form action="" class="typing-area">
                        <input type="text" name="incoming_id" hidden class="incomming_id" id="">
                        <input type="text" name="message" class="input-field" placeholder="Nhập nội dung" id="">
                        <button>
                            <i class="fab fa-telegram-plane"></i>
                        </button>
                    </form>
                </div>
            </div> -->

            <script>
                function closeChat() {


                }

                function openChat() {
                    document.getElementsByClassName('chat-section-list')[0].classList.toggle('show');
                    document.getElementsByClassName('search')[0].classList.toggle('show');
                }
            </script>

            <!-- <div class="chat-area">
            <header>
                <div onclick="openChat()" class="chat-info" style="display: flex">

                    <img src="<?php echo $row['img']; ?>" alt="">
                    <div class="details">
                        <span>Name</span>
                        <div>Đang hoạt động</div>
                    </div>
                </div>
                <div class="chat-action">
                    <i class="fa-solid fa-phone"></i>
                    <i class="fa-light fa-minus close-chat" style="cursor: pointer" onclick="closeChat()"></i>
                    <i class="fa-light fa-xmark" onclick="delChat()"></i>
                </div>

            </header>

            <div id="chat-box" class="chat-box-close">
                <div class="chat-box">
                    <div class="chat outgoing">
                        <div class="details">
                            <p>out going</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <div class="details">
                            <p>incoming</p>
                        </div>
                    </div>

                </div>
                <div>

                    <form action="" class="typing-area">
                        <input type="text" name="incoming_id" hidden class="incomming_id" id="">
                        <input type="text" name="message" class="input-field" placeholder="Nhập nội dung" id="">
                        <button>
                            <i class="fab fa-telegram-plane"></i>
                        </button>
                    </form>
                </div>
            </div> -->

            <!-- <script>
                function closeChat() {
                    document.getElementById('chat-box').style.display = 'none'
                }

                function openChat() {
                    document.getElementById('chat-box').style.display = 'block'
                }
            </script> -->
        </div>
        </div>
    </body>
<?php } ?>

</html>