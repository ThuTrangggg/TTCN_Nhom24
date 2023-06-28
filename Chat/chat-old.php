<link rel="stylesheet" href="./Chat/css/style3.css">
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

        $sql = 'select * from taikhoan where role_id = 1 or role_id = 2 order by online desc ';
        $result = $conn->query($sql);
        ?>

<body>
    <!-- <div class="wrapper" style="display:flex; width:350px; flex-direction: column"> -->
    <div class="chat-section">

        <!-- <section class="users"> -->
        <div class="chat-section-list" style="display: block;" onclick="openChat()">
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
            <div id="sidepanel">
                <div id="contacts">
                    <?php
                    include('Chat.php');
                    $chat = new Chat();
                    $loggedUser = $chat->getUserDetails($_SESSION['userId']);
                    $currentSession = '';
                    foreach ($loggedUser as $user) {
                        $currentSession = $user['current_session'];
                    }
                    ?>
                    <?php

                    echo '<ul>';
                    $chatUsers = $chat->chatUsers($_SESSION['userId']);
                    foreach ($chatUsers as $user) {
                        $status = 'offline';
                        if ($user['online']) {
                            $status = 'online';
                        }
                        $activeUser = '';
                        if ($user['id'] == $currentSession) {
                            $activeUser = "active";
                        }
                        echo '<li id="' . $user['id'] . '" class="contact ' . $activeUser . '" data-touserid="' . $user['id'] . '" data-tousername="' . $user['tentaikhoan'] . '">';
                        echo '<div class="wrap">';
                        echo '<span id="status_' . $user['id'] . '" class="contact-status ' . $status . '"></span>';
                        echo '<img width="50px" height="50px" style="object-fit: cover; border-radius: 50%; border: 1px solid #ccc" src="' . $user['img'] . '" alt="" />';
                        echo '<div class="meta">';
                        echo '<p class="name">' . $user['tentaikhoan'] . '<span id="unread_' . $user['id'] . '" class="unread">' . $chat->getUnreadMessageCount($user['id'], $_SESSION['userId']) . '</span></p>';
                        echo '<p class="preview"><span id="isTyping_' . $user['id'] . '" class="isTyping"></span></p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</li>';
                    }
                    echo '</ul>';
                    ?>
                </div>

            </div>
        </div>
        <div class="content-chat" id="content-chat" style="background-color: #ccc;">
            <div class="contact-profile" id="userSection">
                <?php
                $userDetails = $chat->getUserDetails($currentSession);
                foreach ($userDetails as $user) {
                    echo '<img src="' . $user['img'] . '" alt="" />';
                    echo '<p>' . $user['tentaikhoan'] . '</p>';
                    echo '<div class="social-media">';
                    echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
                    echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
                    echo '<i class="fa fa-instagram" aria-hidden="true"></i>';
                    echo '</div>';
                }
    }
                ?>
            </div>
            <div class="messages" id="conversation">
                <?php
                echo $chat->getUserChat($_SESSION['userId'], $currentSession);
                ?>
            </div>
            <div class="message-input" id="replySection">
                <div class="message-input" id="replyContainer">
                    <div class="wrap">
                        <input type="text" class="chatMessage submit_on_enter" id="chatMessage<?php echo $currentSession; ?>" placeholder="Write your message..." />
                        <button id="submit" class="submit chatButton " id="chatButton<?php echo $currentSession; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                document.getElementById('conversation').scrollIntoView({
                    behavior: "smooth",
                    block: "end"
                });

                $('.submit_on_enter').keydown(function(event) {
                    // enter has keyCode = 13, change it if you want to use another button
                    if (event.keyCode == 13) {
                        // alert(1);
                        // $('.submit').on('click');
                        document.getElementById('submit').addEventListener('click', );
                        // this.form.submit();
                        // return false;
                    }
                });

            });
        </script>
    </div>
    </div>

    <script>
        function closeChat() {}

        function openChat() {
            document.getElementById('#sidepanel').classList.toggle('show');
            document.getElementById('#sidepanel').style.display = 'none';
            // document.getElementsByClassName('chat-section-list')[0].classList.toggle('show');
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
<?php
// }
?>

</html>
<script src="./Chat/js/chat2.js"></script>