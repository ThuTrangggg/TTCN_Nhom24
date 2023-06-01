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
                        <h1 class="h3 mb-2 text-gray-800">Danh sách Kế hoạch quảng cáo:</h1>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                <h6 class="font-weight-bold text-primary"style="margin-top:0.2cm;padding-left:1cm;">Kế hoạch quảng cáo</h6>
                                <a href="KHQC/t_khqc.php" class="btn btn-primary btn-circle"style="float:left; margin-left:74%;">
                                        <i class="fas fa-plus"></i>
                                    </a></div>
                            </div>
                            <div class="card-body">
                                <?php 
                                                    $sql="SELECT c.id,a.tenKHQC, b.tenloaiKHQC,d.tenduan, c.noidung FROM (khqc as a INNER JOIN loaikhqc as b on a.loaiKHQC=b.id) INNER JOIN(chitietkhqc as c INNER JOIN duan as d on c.duan_id=d.id) on a.id=c.KHQC_id;";
                                                    $ketQuaTruyVan=$conn->query($sql);
                                                    ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    stt
                                                </th>
                                                <th>Tên kế hoạch quảng cáo</th>
                                                <th>Tên loại Kế hoạch quảng cáo</th>
                                                <th>Tên dự án</th>
                                                <th>Nội dung</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <?php
                                                if($ketQuaTruyVan->num_rows > 0){
                                                    $i=1;
                                                    while($khqc = $ketQuaTruyVan->fetch_assoc()){
                                            ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo($i); ?></td>
                                                <td><?php echo $khqc['tenKHQC']; ?></td>
                                                <td><?php echo $khqc['tenloaiKHQC']; ?></td>
                                                <td><?php echo $khqc['tenduan']; ?></td>
                                                <td><?php echo $khqc['noidung']; ?></td>
                                                <td><a class="btn btn-success btn-circle" href="khqc/s_khqc.php?id=<?php echo $khqc['id'];?>">Sửa</a>  
                                                <a class="btn btn-danger btn-circle" href="khqc/x_khqc.php?id=<?php echo $khqc['id'];?>"><i class="fas fa-trash"></a></td>
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