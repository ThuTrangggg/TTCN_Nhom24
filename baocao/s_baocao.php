<?php include '../connect.php'?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <base href="../">
        <?php include '../head.php'?>
    </head>
    <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM baocao WHERE id = ".$id;
        $ketQuaTruyVan = $conn->query($sql);
        if($ketQuaTruyVan->num_rows >0 ){
        while($baocao = $ketQuaTruyVan->fetch_assoc()){
                $duanid=$_POST['duan_id'];
                $NVid=$_POST['nhanvien_id'];
                $tenyt=$_POST['tenbaocao'];
                $noidung=$_POST['noidung'];
                $ngay=$_POST['ngaylap'];
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
                            <h5 style="text-align: center;font-weight: bold; margin:0;">SỬA SẢN PHẨM</h5>
                        </div>

                        <!-- DataTales Example -->
                        <?php 
                                                    $sql="SELECT a.id, b.tenduan,c.ten,a.tenbaocao,a.noidung,a.ngaylap from baocao as a INNER JOIN duan as b on a.duan_id=b.id JOIN nhanvien as c on a.nhanvien_id=c.id order by a.id;";
                                                    $ketQuaTruyVan=$conn->query($sql);
                        ?>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form class="form form-horizontal" method="post" action="admin/s_baocao1.php">
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
                                                        while ($baocao1 = $ketQuaTruyVan1->fetch_assoc()) {
                                                            if ($baocao1['id'] == $duanid) {
                                                    ?>
                                                    <option selected="selected" value="<?php echo $baocao1['id'] ?>"><?php echo $baocao1['tenduan'] ?></option>
                                                    <?php
                                                        } else {
                                                    ?>
                                                    <option value="<?php echo $baocao1['id'] ?>"><?php echo $baocao1['tenduan'] ?></option>
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
                                                        while ($baocao2 = $ketQuaTruyVan2->fetch_assoc()) {
                                                            if ($baocao2['id'] == $nhanvienid) {
                                                    ?>
                                                    <option selected="selected" value="<?php echo $baocao2['id'] ?>"><?php echo $baocao2['ten'] ?></option>
                                                    <?php
                                                        } else {
                                                    ?>
                                                    <option value="<?php echo $baocao2['id'] ?>"><?php echo $baocao2['ten'] ?></option>
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
                                            <label class="col-sm-2" style="color:#000">Tên báo cáo: </label>
                                            <div class="col-sm-7 ">
                                                <input type="text" class="form-control" name="tenbaocao" placeholder="Tên ý tưởng">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2" style="color:#000">Nội dung: </label>
                                            <div class="col-sm-7 ">
                                                <input type="text" class="form-control" name="noidung" placeholder="Nội dung">
                                            </div>
                                        </div>
                                    </div>
						
                                    <input name="id" value ="<?php echo $id;?>" type="hidden" />
                                        
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
        </div>
        <?php include('../footer.php') ?>
    </body>
</html>