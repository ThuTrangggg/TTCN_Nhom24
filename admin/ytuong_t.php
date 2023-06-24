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
                        <h1 class="h3 mb-2 text-gray-800">Danh sách ý tưởng:</h1>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row">
                                <h6 class="font-weight-bold text-primary"style="margin-top:0.2cm;padding-left:1cm;">Ý tưởng</h6>
                                <a href="admin/t_ytuong.php" class="btn btn-primary btn-circle"style="float:left; margin-left:83%;">
                                        <i class="fas fa-plus"></i>
                                    </a></div>
                            </div>
                            <div class="card-body">
                                <?php 
                                                    $sql="SELECT a.id,c.tenduan, a.tenytuong, b.ten, noidung, a.ngaylap from ytuong as a INNER JOIN nhanvien as b on a.nhanvien_id=b.id JOIN duan as c on a.duan_id=c.id order by a.id asc;";
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
                                                <th>Tên ý tưởng</th>
                                                <th>Người thực hiện</th>
                                                <th>Ngày</th>
                                                <th>Nội dung</th>
                                            </tr>
                                        </thead>
                                        <?php
                                                if($ketQuaTruyVan->num_rows > 0){
                                                    $i=1;
                                                    while($ytuong = $ketQuaTruyVan->fetch_assoc()){
                                            ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo($i); ?></td>
                                                <td><?php echo $ytuong['tenduan']; ?></td>
                                                <td><?php echo $ytuong['tenytuong']; ?></td>
                                                <td><?php echo $ytuong['ten']; ?></td>
                                                <td><?php echo $ytuong['ngaylap']; ?></td>
                                                <td> <a href="down.php?id=<?php echo $ytuong['id']?>" style="color:#858796"><?=$ytuong['noidung']?></a></td>
                                                <td><a class="btn btn-success btn-circle" href="admin/s_ytuong.php?id=<?php echo $ytuong['id'];?>">Sửa</a>  
                                                <a class="btn btn-danger btn-circle" href="admin/x_ytuong.php?id=<?php echo $ytuong['id'];?>"><i class="fas fa-trash"></a></td>
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