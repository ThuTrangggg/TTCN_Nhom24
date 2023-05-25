<!DOCTYPE html>
<html lang="en">
<base href="../">
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php include '../connect.php';
?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<body>

    <!-- Page Wrapper -->
    <?php include '../sidebar.php' ?>
    <div id="wrapper" style="width: 100%">

        <!-- Sidebar -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <?php include '../header.php';
            ?>

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">NHÂN SỰ</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách nhân sự
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
                                            <th>Tên</th>
                                            <th>CCCD</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Giới tính</th>
                                            <th>Chức vụ</th>
                                            <th>Tài khoản hệ thống</th>
                                            <th>Trạng thái</th>
                                            <th>Sửa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên</th>
                                            <th>CCCD</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Giới tính</th>
                                            <th>Chức vụ</th>
                                            <th>Tài khoản hệ thống</th>
                                            <th>Trạng thái</th>
                                            <th>Sửa</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                                    $sql = "SELECT nhanvien.id, chucvu.chucvu,ten, gioitinh,nhanvien.email,ngaysinh,diachi,sdt,cccd,trangthai, taikhoan.tentaikhoan FROM `nhanvien` left join taikhoan 
                                    on nhanvien.taikhoan_id = taikhoan.id left join chucvu on nhanvien.chucvu_id = chucvu.id
                                    order by nhanvien.chucvu_id asc, nhanvien.id";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $i = 1;
                                        while ($nhansu = $result->fetch_assoc()) {
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i ?>
                                                    <td><?= $nhansu['ten'] ?></td>
                                                    <td><?= $nhansu['cccd'] ?></td>
                                                    <td><?= $nhansu['sdt'] ?></td>
                                                    <td><?= $nhansu['email'] ?></td>
                                                    <td><?= $nhansu['gioitinh']
                                                        ?></td>
                                                    <td><?php echo $nhansu['chucvu'];
                                                        ?>
                                                    </td>
                                                    <td><a href="taikhoan/danhsachtaikhoan"></a>
                                                        <?= $nhansu['tentaikhoan']
                                                        ?></td>
                                                    <td><?= $nhansu['trangthai']
                                                        ?></td>
                                                    <td>
                                                        <a class="btn btn-success" href="nhansu/nhansu_fix.php?id=<?= $nhansu["id"]; ?>">Sửa</a>
                                                    </td>

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
        <?php
        include '../Chat/chat.php'
        ?>
        <!-- End of Content Wrapper -->

        <div id="frmAdd" class="justify-content-center frmAdd">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Thêm mới nhân sự</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="nhansu/dsns_them_code.php" enctype="multipart/form-data">
                        <input type="hidden" name="nhansu_id" id="" value="<?= $taikhoan['id'] ?>">
                        <div class="form-floating mb-3">
                            <label for="txttentaikhoan">Tên nhân viên</label>
                            <input class="form-control" id="txttentaikhoan" type="text" placeholder="Tên nhân viên" name="txtten" />
                        </div>
                        <div class="form-floating mb-3">
                            <label for="txtmatkhau">CCCD</label>
                            <input class="form-control" id="txtmatkhau" type="text" placeholder="Mật khẩu" name="txtcccd" />
                        </div>
                        <div class="form-floating mb-3">
                            <label for="txtmatkhau">123</label>
                            <input class="form-control" id="txtmatkhau" type="text" placeholder="Mật khẩu" name="123" />
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
                            <label for="txtmatkhau">Ngày sinh</label>
                            <input type="date" class="form-control" id="txtngaysinh" type="text" placeholder="abc@gmail.com" name="txtngaysinh" />
                        </div>
                        <div class="form-floating mb-3">
                            <label for="txtmatkhau">Địa chỉ</label>
                            <input type="text" class="form-control" id="txtngaysinh" type="text" placeholder="Địa chỉ" name="txtdiachi" />
                        </div>
                        <div class="form-floating mb-3">
                            <label for="txtgioitinh">Giới tính</label>
                            <select class="form-control" name="txtgioitinh" id="txtgioitinh">
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