<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<?php include '../connect.php';

?>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '../sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">TÀI KHOẢN</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản
                            <div class="btn btn-add" onclick="openFrmAdd()">Thêm</div>
                            </h6>
                        </div>
                        <script> 
                        function openFrmAdd(){
                            document.getElementById("frmAdd").style.backgroundColor = red;
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
                                    $sql = "SELECT * from taikhoan join role on role.id = taikhoan.role_id";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $i = 1;
                                        while ($taikhoan = $result->fetch_assoc()) {
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i ?>
                                                    <td>
                                                        <img width="100px" src="<?= $taikhoan['img'] ?>" alt="">
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
                                                        <a class="btn btn-success" href="dstk_sua.php?id=<?=$taikhoan["id"]; ?>">Sửa</a>
                                                    </td>

                                                    </td>
                                                    <td>
                                                    <a class="btn btn-danger" href="dstk_xoa.php?id=<?=$taikhoan["id"]; ?>">Xóa</a></td>
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
        <div id="frmAdd" class="justify-content-center" >
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Thêm mới Admin</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="quantrivien_xlthemmoi.php" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txthoten" type="text" placeholder="Họ tên" name="txthoten" />
                                                <label for="txthoten">Họ tên</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtdiachi" type="text" placeholder="Địa chỉ" name="txtdiachi"/>
                                                <label for="txtdiachi">Địa chỉ</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtemail" type="email" placeholder="name@example.com" name="txtemail"/>
                                                <label for="txtemail">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtmatkhau" type="text" placeholder="Mật khẩu" name="txtmatkhau"/>
                                                <label for="txtmatkhau">Mật khẩu</label>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <input type="submit" name="btnSubmit" value="Thêm mới">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>

    </div>
    <!-- End of Page Wrapper -->

</body>

</html>