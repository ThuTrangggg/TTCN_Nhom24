<!DOCTYPE html>
<html lang="en">
    <base href="../">
<?php 
include '../connect.php';
?>
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                <?php include '../header.php' ;
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">TÀI KHOẢN</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản
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
                                            <th>Avatar</th>
                                            <th>Tên tài khoản</th>
                                            <th>Mật khẩu</th>
                                            <th>Email</th>
                                            <th>Ngày lập</th>
                                            <th>Role</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Avatar</th>
                                            <th>Tên tài khoản</th>
                                            <th>Mật khẩu</th>
                                            <th>Email</th>
                                            <th>Ngày lập</th>
                                            <th>Role</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                                    $sql = "SELECT taikhoan.id, ngaylap, tentaikhoan,matkhau,email,img,role_id, vitri 
                                    from taikhoan join role
                                    on taikhoan.role_id = role.id order by taikhoan.role_id asc, id";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $i = 1;
                                        while ($taikhoan = $result->fetch_assoc()) {
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i ?>
                                                    <td>
                                                        <img width="50px" height="50px" style="object-fit: contain" src="<?= $taikhoan['img'] ?>" alt="">
                                                    </td>
                                                    <td><?= $taikhoan['tentaikhoan'] ?></td>
                                                    <td><?= $taikhoan['matkhau'] ?></td>
                                                    <td><?= $taikhoan['email'] ?></td>
                                                    <td><?php
                                                        $date_new =  date('d-m-Y', strtotime($taikhoan['ngaylap']));
                                                        echo $date_new
                                                        ?></td>
                                                    <td><?php echo $taikhoan['vitri'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-success" href="taikhoan/taikhoan_fix.php?id=<?= $taikhoan["id"]; ?>">Sửa</a>
                                                    </td>

                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger" href="taikhoan/taikhoan_xoa.php?id=<?= $taikhoan["id"]; ?>">Xóa</a>
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
                    <h3 class="text-center font-weight-light my-4">Thêm mới tài khoản</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="taikhoan/dstk_them_code.php" enctype="multipart/form-data">
                        <input type="hidden" name="taikhoan_id" id="" value="<?=$taikhoan['id']?>">
                        <div class="form-floating mb-3">
                            <label for="txttentaikhoan">Tên tài khoản</label>
                            <input class="form-control" id="txttentaikhoan" type="text" placeholder="Tên tài khoản" name="txttentaikhoan" />
                        </div>
                        <div class="form-floating mb-3">
                            <label for="txtmatkhau">Mật khẩu</label>
                            <input class="form-control" id="txtmatkhau" type="text" placeholder="Mật khẩu" name="txtmatkhau" />
                        </div>
                        <div class="form-floating mb-3">
                            <label for="txtemail">Email</label>
                            <input class="form-control" id="txtemail" type="text" placeholder="name@example.com" name="txtemail" />
                        </div>
                        <div class="form-floating mb-3">
                            <label for="txtrole">Role</label>
                            <select class="form-control"  name="txtrole" id="txtrole">
                                <Option value="#"></Option>
                                <option value="1">PM</option>
                                <option value="2">Nhân viên</option>
                                <option value="3">Khác</option>
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
        <?php 
        include ('../Chat/chat.php')
        ?>
    </div>
    <!-- End of Page Wrapper -->

</body>

</html>