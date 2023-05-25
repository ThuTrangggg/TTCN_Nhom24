<?php
include('../header.php');
include('../connect.php')
?>
<base href="../">
<script type="text/javascript">
    function validateForm() {
        var tentaikhoan = document.forms["formsua"]["tentaikhoan"].value;
        var matkhau = document.forms["formsua"]["matkhau"].value;
        var email = document.forms["formsua"]["email"].value;
        var role = document.forms["formsua"]["role"].value;
        if (tentaikhoan.trim() == "") {
            alert("Bạn phải chọn nhập tên loại sản phẩm.");
            document.forms["formsua"]["txttenloaisanpham"].focus();
            return false;
        }
        if (matkhau.trim() == "") {
            alert("Bạn phải nhập mật khẩu");
            document.forms["formsua"]["matkhau"].focus();
            return false;
        }
        if (email.trim() == "") {
            alert("Bạn phải nhập email");
            document.forms["formsua"]["email"].focus();
            return false;
        }
        if (role.trim() == "") {
            alert("Bạn phải chọn vị trí.");
            document.forms["formsua"]["role"].focus();
            return false;
        }
    }
</script>
</head>

<body class="sb-nav-fixed">
    <?php
    include("../sidebar.php");
    $taiKhoan_id = $_GET["id"];
    // $loaisanphamid;
    // if(isset($_GET['loaisanphamid'])) $loaisanphamid=$_GET['loaisanphamid'];
    $sql1 = "
                              SELECT *
                              FROM taikhoan
                              Where id='" . $taiKhoan_id . "'
                    ";
    $kq1 = mysqli_query($ket_noi, $sql1);
    $row1 = mysqli_fetch_array($kq1);
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Cập nhật thông tin nhân sự</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="taikhoan/taikhoan_fixcode.php<?php echo "?id=$taiKhoan_id"; ?>" enctype="multipart/form-data" id="formsua" onsubmit="return validateForm()">
                        <div class="form-floating mb-3">
                            <label for="txttentaikhoan">Tên nhân viên</label>
                            <input class="form-control" id="txttentaikhoan" type="text" placeholder="Tên nhân viên" name="txtten" />
                        </div>
                        <div class="form-floating mb-3">
                            <label for="txtmatkhau">CCCD</label>
                            <input class="form-control" id="txtmatkhau" type="text" placeholder="Mật khẩu" name="txtcccd" />
                        </div>
                        <div class="form-floating mb-3">
                            <label for="txtmatkhau">Số điện thoại</label>
                            <input class="form-control" id="txtmatkhau" type="text" placeholder="Số điện thoại" name="txtsdt" />
                        </div>
                        <div class="form-floating mb-3">
                            <label for="txtmatkhau">Email</label>
                            <input class="form-control" id="txtmatkhau" type="text" placeholder="abc@gmail.com" name="txtemail" />
                        </div>
                        <div class="form-floating mb-3">
                            <label for="txtgioitinh">Giới tính</label>
                            <select class="form-control" name="" id="">
                                <option value="#"></option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>

                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="txtchucvu">Chức vụ</label>
                            <select class="form-control" name="txtchucvu" id="txtchucvu">
                                <Option value="#"></Option>
                                <option value="1">Project Manager</option>
                                <option value="2">Marketer</option>
                                <option value="3">Game Designer</option>
                                <option value="4">Tester</option>
                                <option value="5">Developer</option>
                            </select>
                        </div>
                            <div class="mt-4 mb-0 btn-frm">
                            <ul>
                            
                                <li>
                                    <input type="hidden" name="taikhoan_id" value="<?=$row1["id"]?>" id="">
                                    <input type="submit" class="btn" name="btnSubmit" value="Cập nhật">
                                </li>
                                <li>

                                    <a class="btn" href="nhansu/danhsachnhansu.php">Hủy</div>
                                </li>
                            </ul>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>