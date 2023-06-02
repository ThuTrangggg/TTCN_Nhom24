<!DOCTYPE html>
<html lang="en">
    <base href="../">
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php include '../connect.php';
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
            <?php include '../header.php' ?>

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">LOẠI DỰ ÁN </h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">LOẠI DỰ ÁN 
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
                                            <th>Tên loại dự án </th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>

                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên loại dự án</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </tfoot> -->
                                    <?php
                                    $sql = "SELECT loaiduan.id,ten_loai_du_an from loaiduan";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $i = 1;
                                        while ($loaiduan  = $result->fetch_assoc()) {
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i ?>
                                                    <td><?= $loaiduan['ten_loai_du_an'] ?></td>
                                                    <td>
                                                        <a class="btn btn-success" href="loaiduan/loaiduan_sua.php?id=<?= $loaiduan["id"]; ?>">Sửa</a>
                                                    </td>

                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger" href="loaiduan/loaiduan_xoa.php" onclick="alert('Không xóa được')">Xóa</a>
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
                    <h3 class="text-center font-weight-light my-4">Thêm mới  loại dự án </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="loaiduan/loaiduan_them.php" enctype="multipart/form-data">
                        <input type="hidden" name="loaiduan.id" id="" value="<?=$loaiduan['id']?>">
                        <div class="form-floating mb-3">
                            <label for="txttentaikhoan">Tên loại dự án</label>
                            <input class="form-control" id="txttenloaiduan" type="text" placeholder="Tên loại dự án " name="txttenloaiduan" />
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