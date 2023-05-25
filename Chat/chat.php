<!-- <base href="../"> -->
<link rel="stylesheet" href="css/style2.css">
<?php include '../connect.php';
$sql = 'select * from taikhoan';
$result = $conn->query($sql);

?>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <div onclick="openChat()" class="chat-info" style="display: flex">

                    <img src="https://toigingiuvedep.vn/wp-content/uploads/2021/05/hinh-anh-avatar-trang.jpg" alt="">
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
                <div  class="chat-box">
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
            </div>

            <script>
                
                function closeChat() {
                    document.getElementById('chat-box').style.display = 'none'
                }function openChat() {
                    document.getElementById('chat-box').style.display = 'block'
                }
            </script>
        </section>
    </div>
</body>

</html>