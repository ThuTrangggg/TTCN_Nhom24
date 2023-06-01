<?php include '../connect.php'?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <base href="../">
    <?php include '../head.php'?>
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include '../sidebar.php' ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <?php include '../header.php' ?>
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Danh sách báo cáo:</h1>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                <h6 class="font-weight-bold text-primary"style="margin-top:0.2cm;padding-left:1cm;">Ý tưởng</h6>
                                <a href="baocao/t_baocao.php" class="btn btn-primary btn-circle"style="float:left; margin-left:83%;">
                                        <i class="fas fa-plus"></i>
                                    </a></div>
                            </div>
                            <div class="card-body">
                                <?php 
                                                    $sql="SELECT a.id, b.tenduan,c.ten,a.tenbaocao,a.noidung,a.ngaylap from baocao as a INNER JOIN duan as b on a.duan_id=b.id JOIN nhanvien as c on a.nhanvien_id=c.id order by a.id;";
                                                    $ketQuaTruyVan=$conn->query($sql);
                                                    ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    stt
                                                </th>
                                                <th>Tên dự án</th>
                                                <th>Tên nhân viên</th>
                                                <th>Tên báo cáo</th>
                                                <th>Nội dung</th>
                                                <th>Ngày</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <?php
                                                if($ketQuaTruyVan->num_rows > 0){
                                                    $i=1;
                                                    while($baocao = $ketQuaTruyVan->fetch_assoc()){
                                            ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo($i); ?></td>
                                                <td><?php echo $baocao['tenduan']; ?></td>
                                                <td><?php echo $baocao['ten']; ?></td>
                                                <td><?php echo $baocao['tenbaocao']; ?></td>
                                                <td><?php echo $baocao['noidung']; ?></td>
                                                <td><?php echo $baocao['ngaylap']; ?></td>
                                                <td><a class="btn btn-success btn-circle" href="baocao/s_baocao.php?id=<?php echo $baocao['id'];?>">Sửa</a>  
                                                <a class="btn btn-danger btn-circle" href="baocao/x_baocao.php?id=<?php echo $baocao['id'];?>"><i class="fas fa-trash"></a></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                                    $i++;}
                                                    }
                                                ?>
                                              
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php include("../footer.php");?>
</html>