<?php
include('../header.php');
include('../connect.php')
?>
<base href="../">
<script type="text/javascript">
    function validateForm() {
        var tenduan = document.forms["formsuaduan"]["tenduan"].value;
        var maloaiduan = document.forms["formsuaduan"]["loaiduan_id"].value;
        var ytuong = document.forms["formsuaduan"]["ytuong"].value;
        var tenbaocao = document.forms["formsuaduan"]["tenbaocao"].value;
        var tinhtrang = document.forms["formsuaduan"]["tinhtrang"].value;
        var chiphi = document.forms["formsuaduan"]["chiphi"].value;

        if (tenduan.trim() == "") {
            alert("Bạn phải chọn nhập tên dự án .");
            document.forms["formsuaduan"]["txttenduan"].focus();
            return false;
        }
        if (maloaiduan.trim() == "") {
            alert("Bạn phải nhập mã loai dự án");
            document.forms["formsuaduan"]["loaiduan_id"].focus();
            return false;
        }
        if (ytuong.trim() == "") {
            alert("Bạn phải nhập ý tưởng ");
            document.forms["formsuaduan"]["ytuong"].focus();
            return false;
        }
        if (tenbaocao.trim() == "") {
            alert("Bạn phải nhập tên báo cáo ");
            document.forms["formsuaduan"]["tenbaocao"].focus();
            return false;
        }
        if (tingtrang.trim() == "") {
            alert("Bạn phải nhập tinh trạng ");
            document.forms["formsuaduan"]["tinhtrang"].focus();
            return false;
        }
        if (chiphi.trim() == "") {
            alert("Bạn phải nhập chi phí  ");
            document.forms["formsuaduan"]["chiphi"].focus();
            return false;
        }
    }
</script>
</head>

<body class="sb-nav-fixed">
    <?php
    include("../sidebar.php");
    $duan_id = $_GET["id"];
    // $loaisanphamid;
    // if(isset($_GET['loaisanphamid'])) $loaisanphamid=$_GET['loaisanphamid'];
    $sql1 = "
                              SELECT *
                              FROM duan
                              Where id='" . $duan_id . "'
                    ";
    $kq1 = mysqli_query($ket_noi, $sql1);
    $row1 = mysqli_fetch_array($kq1);
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Cập nhật dự án </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="duan/duan_codesua.php<?php echo "?id=$duan_id"; ?>" enctype="multipart/form-data" id="formsuaduan" onsubmit="return validateForm()">
                            <div class="form-floating mb-3">
                                <label for="txttenduan">Tên dự án</label>
                                <input class="form-control" type="text" placeholder="Tên dự án" name="tenduan" value="<?php echo $row1["tenduan"]; ?>" />
                            </div>
                            <div class="form-floating mb-3">
                                <label for="txtmaloaiduan">Mã loại dự án </label>
                                <input class="form-control" type="text" placeholder="mã loại dự án " name="loaiduan_id" value="<?php echo $row1["loaiduan_id"]; ?>" />
                            </div>
                            <div class="form-floating mb-3">
                                <label for="txtytuong">ý tưởng </label>
                                <input class="form-control" id="txtytuong" placeholder="ý tưởng" name="ytuong" value="<?php echo $row1["ytuong"]; ?>" />
                            </div>
                            <div class="form-floating mb-3">
                                <label for="txttenbaocao">tên báo cáo </label>
                                <input class="form-control" id="txttenbaocao" placeholder="tên báo cáo " name="tenbaocao" value="<?php echo $row1["tenbaocao"]; ?>" />
                            </div>
                            <div class="form-floating mb-3">
                                <label for=""> tình trạng </label>
                                <select name="tinhtrang" class="form-control" id="">
                                    <option value="#"></option>
                                    <option value="1">Thành công </option>
                                    <option value="2">đang thực hiện </option>
                                    <option value="3">Update</option>
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="txtchiphi">chi phí  </label>
                                <input class="form-control" id="txtchiphi" placeholder="chi phí  " name="chiphi" value="<?php echo $row1["chiphi"]; ?>" />
                            </div>
                            <div class="mt-4 mb-0 btn-frm">
                            <ul>
                            
                                <li>
                                    <input type="hidden" name="duan_id" value="<?=$row1["id"]?>" id="">
                                    <input type="submit" class="btn" name="btnSubmit" value="Cập nhật">
                                </li>
                                <li>

                                    <a class="btn" href="duan/duan.php">Hủy</div>
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