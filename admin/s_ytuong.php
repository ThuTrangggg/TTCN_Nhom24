<?php include '../connect.php'?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <base href="../">
        <?php include '../head.php'?>
    </head>
    <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM ytuong WHERE id = ".$id;
        $ketQuaTruyVan = $conn->query($sql);
        if($ketQuaTruyVan->num_rows >0 ){
        while($ytuong = $ketQuaTruyVan->fetch_assoc()){
                $duanid=$ytuong['duan_id'];
                $NVid=$ytuong['nhanvien_id'];
                $tenyt=$ytuong['tenytuong'];
                $noidung=$ytuong['noidung'];
                $ngay=$ytuong['ngaylap'];
            }
        }
    ?>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include '../sidebar.php' ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
    
                    <div class="card">
                        <!-- Page Heading -->
                        <div class="card-header">
                            <h5 style="text-align: center;font-weight: bold; margin:0;">SỬA Ý TƯỞNG</h5>
                        </div>

                        <!-- DataTales Example -->
                        <?php 
                            $sql="SELECT a.id,c.tenduan, a.tenytuong, b.ten, a.ngaylap from ytuong as a INNER JOIN nhanvien as b on a.nhanvien_id=b.id JOIN duan as c on a.duan_id=c.id order by a.id;";
                            $ketQuaTruyVan=$conn->query($sql);
                        ?>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="admin/s_ytuong1.php">
                                    <div class="form-group">
                                        <div class="row">          
                                            <label class="control-label col-sm-2" style="color:#000">Tên dự án: </label>
                                            <?php 
                                                $sql1="SELECT * FROM duan";
                                                $ketQuaTruyVan1=$conn->query($sql1);
                                            ?>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="duan_id">
                                                    <option value="0">Chọn dự án</option>
                                                    <?php
                                                        if($ketQuaTruyVan1->num_rows > 0){
                                                        while ($ytuong1 = $ketQuaTruyVan1->fetch_assoc()) {
                                                            if ($ytuong1['id'] == $duanid) {
                                                    ?>
                                                    <option selected="selected" value="<?php echo $ytuong1['id'] ?>"><?php echo $ytuong1['tenduan'] ?></option>
                                                    <?php
                                                        } else {
                                                    ?>
                                                    <option value="<?php echo $ytuong1['id'] ?>"><?php echo $ytuong1['tenduan'] ?></option>
                                                    <?php
                                                                }
                                                            }
                                                        }        
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">          
                                            <label class="control-label col-sm-2" style="color:#000">Tên nhân viên: </label>
                                            <?php 
                                                $sql2="SELECT * FROM nhanvien";
                                                $ketQuaTruyVan2=$conn->query($sql2);
                                            ?>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="nhanvien_id">
                                                    <option value="0">Chọn nhân viên:</option>
                                                    <?php
                                                        if($ketQuaTruyVan2->num_rows > 0){
                                                        while ($ytuong2 = $ketQuaTruyVan2->fetch_assoc()) {
                                                            if ($ytuong2['id'] == $NVid) {
                                                    ?>
                                                    <option selected="selected" value="<?php echo $ytuong2['id'] ?>"> <?php echo $ytuong2['ten'] ?> </option>
                                                    <?php
                                                        } else {
                                                    ?>
                                                    <option value="<?php echo $ytuong2['id'] ?>"><?php echo $ytuong2['ten'] ?></option>
                                                    <?php
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2" style="color:#000">Tên ý tưởng: </label>
                                            <div class="col-sm-7 ">
                                                <input type="text" class="form-control" name="tenytuong" placeholder="Tên ý tưởng" value="<?=$tenyt?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2" style="color:#000" for="noidung">Tên file:</label>
                                            <div class="col-sm-7 ">
                                                <input type="hidden" name="size" value="1000000">
                                                <input type="file" class="form-control" name="noidung" value="<?=$noidung?>">
                                            </div>
                                        </div>
                                    </div>
						
                                    <input name="id" value ="<?php echo $id;?>" type="hidden" />
                                        
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-9">
                                                <input class="btn btn-success" type="submit" value="Lưu" name="upload" />
                                            </div>
                                        </div>
                                    </div>
                                    <?php require "s_ytuong1.php" ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('../footer.php') ?>
    </body>
</html>