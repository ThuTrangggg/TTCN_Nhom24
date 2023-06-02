<!DOCTYPE html>
<html lang="en">
<base href="../">
<?php include '../connect.php';
?>
<!-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

<body>

    <!-- Page Wrapper -->
    <div id="wrapper" style="width: 100%">

        <!-- Sidebar -->
        <?php include '../sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php include '../header.php' ?>
                <li class="dropdown-menu">dsad
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
                        <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>
                    </a>
                    <ul class="dropdown-menu"></ul>
                </li>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DỰ ÁN </h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH DỰ ÁN
                                <div class="btn btn-add" onclick="openFrmAdd()">Thêm</div>
                            </h6>
                        </div>
                        <script>
                            function openFrmAdd() {
                                document.getElementById("frmAdd").style.display = 'block'
                            }
                        </script>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên dự án</th>
                                            <th>Mã loai dự án </th>
                                            <th>Ý tưởng </th>
                                            <th>Tên báo cáo </th>
                                            <th>Tình trạng </th>
                                            <th>Chi phí </th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>

                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                        <th>STT</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên  dự án</th>
                                            <th>mã loai dự án </th>
                                            <th>Ý tưởng </th>
                                            <th>Kế hoạch quảng cáo </th>
                                            <th>báo cáo  </th>
                                            <th>Feedback</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </tfoot> -->
                                    <?php
                                    // $sql = "SELECT hinhanh,tenduan,loaiduan_id,tenytuong,tenbaocao,tenKHQC, noidung
                                    // from duan join ytuong
                                    // on duan_id = ytuong.duan_id order by duan.ytuong asc, id";
                                    $sql = "SELECT duan.id,hinhanh,tenduan,loaiduan_id,tenytuong,tenbaocao,tinhtrang,chiphi
                                    FROM duan left JOIN ytuong ON duan.id = ytuong.duan_id
                                    left JOIN baocao as b ON duan.id = b.duan_id";

                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $i = 1;
                                        while ($duan = $result->fetch_assoc()) {
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i ?>
                                                    <td>
                                                        <img width="50px" height="50px" style="object-fit: contain" src="<?= $duan['hinhanh'] ?>" alt="">
                                                    </td>
                                                    <td><?= $duan['tenduan'] ?></td>
                                                    <td><?= $duan['loaiduan_id'] ?></td>
                                                    <td><?= $duan['tenytuong'] ?></td>
                                                    <td><?= $duan['tenbaocao'] ?></td>
                                                    <td><?= $duan['tinhtrang'] ?></td>
                                                    <td><?= $duan['chiphi'] ?></td>

                                                    <td>
                                                        <a class="btn btn-success" href="duan/duan_sua.php?id=<?= $duan["id"]; ?>">Sửa</a>
                                                    </td>

                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger" href="duan/duan_xoa.php?id=<?= $duan["id"]; ?>">Xóa</a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                    <?php $i++;
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include '../footer.php'
            ?>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
        <div id="frmAdd" class="justify-content-center">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Thêm mới dự án </h3>
                </div>
                <div class="card-body">
                    <form method="POST" id="noti_frm" action="duan/duan_them.php" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <label for="txttenduan">Tên dự án </label>
                            <input class="form-control" id="txttenduan" type="text" placeholder="Tên dự án" name="txttenduan" />
                        </div>
                        <!-- <div class="form-floating mb-3">
                            <label for="txtmaloaiduan">Mã loại dự án </label>
                            <input class="form-control" id="txtmaloaiduan" type="text" placeholder="Mã loại dự án " name="txtmaloaiduan" />
                        </div> -->
                        <div class="form-floating mb-3">
                            <label for="txtmaloaiduan">mã loại dự án </label>
                            <select class="form-control" name="txtmaloaiduan" id="txtmaloaiduan">
                                <Option value="#"></Option>
                                <option value="1">1</option>
                                <option value="2">2 </option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <!-- <div class="form-floating mb-3">
                            <label for="txtytuong">Ý tưởng </label>
                            <input class="form-control" id="txtytuong" type="text" placeholder="Ý tưởng" name="txtytuong" />
                        </div> -->
                        <!-- <div class="form-floating mb-3">
                            <label for="txttenbaocao">Tên báo cáo  </label>
                            <input class="form-control" id="txttenbaocao" type="text" placeholder="Tên báo cáo " name="txttenbaocao" />
                        </div> -->
                        <div class="form-floating mb-3">
                            <label for="txttinhtrang">Tình trạng </label>
                            <select class="form-control" name="txttinhtrang" id="txtmaloaiduan">
                                <Option value="#"></Option>
                                <option value="1">Thành công</option>
                                <option value="2">Đang thực hiện</option>
                                <!-- <option value="3">3</option> -->
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="txtchiphi">Chi phí </label>
                            <input class="form-control" id="txtchiphi" type="text" placeholder="Chi phí  " name="txtchiphi" />
                        </div>

                        <div class="mt-4 mb-0 btn-frm">
                            <ul>
                                <li>

                                    <input type="submit" class="btn" name="btnSubmit" value="Thêm">
                                </li>
                                <li>

                                    <div class="btn" onclick="closeFrm()">Hủy</div>
                                </li>
                            </ul>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <script>
            function closeFrm() {
                document.getElementById("frmAdd").style.display = 'none';
            }
        </script>
    </div>
    <!-- End of Page Wrapper -->

</body>

</html>

<script>
    src = "https://code.jquery.com/jquery-3.2.1.min.js"
    $(document).ready(function() {

        function load_unseen_notification(view = '') {
            $.ajax({
                url: "./fetch.php",
                method: "POST",
                data: {
                    view: view
                },
                dataType: "json",
                success: function(data) {
                    // window.alert("ok");

                    $('.dropdown-menu').html(data.notification);
                    if (data.unseen_notification > 0) {
                        $('.count').html(data.unseen_notification);
                    }
                }
            });
        }

        load_unseen_notification();

        $('#noti_frm').on('submit', function(event) {
            event.preventDefault();
            // if ($('#subject').val() != '' && $('#comment').val() != '') {
            var form_data = $(this).serialize();
            console.log(form_data);
            $.ajax({
                
                url: "./duan/duan_them.php",
                method: "POST",
                data: form_data,
                success: function(data) {
                    // window.alert("ok2");

                    $('#noti_frm')[0].reset();
                    load_unseen_notification();
                }
            });
        });
        //     } else {
        //         alert("Both Fields are Required");
        //     }
        // });

        $(document).on('click', '.dropdown-toggle', function() {
            $('.count').html('');
            load_unseen_notification('yes');
        });

        setInterval(function() {
            load_unseen_notification();;
        }, 5000);

    });
</script>