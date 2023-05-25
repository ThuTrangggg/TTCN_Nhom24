<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'head.php'?>
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include 'sidebar.php'?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <?php include 'header.php' ?>
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Danh sách Kế hoạch quảng cáo:</h1>
                        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                <h6 class="font-weight-bold text-primary"style="margin-top:0.2cm;padding-left:1cm;">Kế hoạch quảng cáo</h6>
                                <a href="KHQC/t_khqc.php" class="btn btn-primary btn-circle"style="float:left; margin-left:83%;">
                                        <i class="fas fa-plus"></i>
                                    </a></div>
                            </div>
                            <div class="card-body">
                                <?php 
                                                    $sql="SELECT a.id, b.tenloaiKHQC, a.tenKHQC FROM khqc as a INNER JOIN loaiKHQC as b ON a.loaiKHQC=b.id;";
                                                    $ketQuaTruyVan=$conn->query($sql);
                                                    ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    stt
                                                </th>
                                                <th>Tên loại kế hoạch quảng cáo</th>
                                                <th>Tên Kế hoạch quảng cáo</th>
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
                                                <td><?php echo $khqc['tenduan']; ?></td>
                                                <td><?php echo $khqc['tenkhqc']; ?></td>
                                                <td><?php echo $khqc['ten']; ?></td>
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
    <?php include("footer.php");?>
</html>