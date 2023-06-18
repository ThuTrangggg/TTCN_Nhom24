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
                        <div class="card">
                            <div class="card-header">
                                <h5 style="text-align: center;font-weight: bold; margin:0;">THÊM Ý TƯỞNG</h5>
                            </div>

                        <div class="card-body">     
                            <form class="form form-horizontal" method="post" action="admin/t_ytuong1.php">
                                <div class="form-group">
                                    <div class="row">          
                                        <label class="control-label col-sm-2" style="color:#000">Danh mục: </label>
                                        <?php 
                                            $sql="SELECT *from duan;";
                                            $ketQuaTruyvan=$conn->query($sql);
                                        ?>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="duan_id">
                                                <option value="0">Chọn dự án</option>
                                                <?php
                                                    if($ketQuaTruyvan->num_rows > 0){
                                                    while($ytuong = $ketQuaTruyvan->fetch_assoc()){
                                                ?>
                                                <option value="<?php echo $ytuong['id'] ?>"><?php echo $ytuong['tenduan']?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2" style="color:#000">Nhân viên: </label>
                                        <?php 
                                            $sql="SELECT *from nhanvien;";
                                            $ketQuaTruyvan=$conn->query($sql);
                                        ?>
                                        <div class="col-sm-7 ">
                                        <select class="form-control" name="nhanvien_id">
                                            <option value="0">Chọn nhân viên</option>
                                            <?php
                                                if($ketQuaTruyvan->num_rows > 0){
                                                while($ytuong = $ketQuaTruyvan->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $ytuong['id'] ?>"><?php echo $ytuong['ten']?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2" style="color:#000">Tên ý tưởng: </label>
                                        <div class="col-sm-7 ">
                                            <input type="text" class="form-control" name="tenytuong" placeholder="Tên ý tưởng">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-2" style="color:#000">Nội dung: </label>
                                        <div class="col-sm-7 ">
                                            <input type="file" class="form-control" name="noidung" placeholder="Nội dung">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?=$id?>" />
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-9">
                                            <input class="btn btn-success" type="submit" value="Lưu" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('../footer.php') ?>
    </body>
</html>
