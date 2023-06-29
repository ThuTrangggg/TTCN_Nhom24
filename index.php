<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <?php
        include 'sidebar.php'
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include 'header.php'
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Trang chủ</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <?php
                        $sql = "SELECT count(id) from duan";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Tổng số dự án</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row['count(id)'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <?php
                        $sql = "SELECT sum(chiphi) from duan";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tổng chi phí </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?= number_format($row['sum(chiphi)'], 3, '.', '.'); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <?php
                        $sql = "SELECT count(id) from duan WHERE tinhtrang = 'Hoàn thành'";
                        $result = mysqli_query($conn, $sql);
                        $rowhoanthanh = mysqli_fetch_assoc($result);

                        $sql1 = "SELECT count(id) from duan";
                        $result1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Dự án hoàn thành
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $rowhoanthanh['count(id)'] ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $rowhoanthanh['count(id)'] ?>0%" aria-valuenow="<?= $rowhoanthanh['count(id)'] ?>" aria-valuemin="0" aria-valuemax="<?= $row1['count(id)'] ?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <?php
                        $sql = "SELECT count(id) from duan WHERE tinhtrang = 'Tạm dừng'";
                        $result = mysqli_query($conn, $sql);
                        $rowtamdung = mysqli_fetch_assoc($result);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <a style="" href="./duan/duan.php">
                                                    Dự án tạm dừng
                                                </a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $rowtamdung['count(id)'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Số liệu dự án</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body --><?php $chuahoanthanh = ""; 
                                 $sql = "SELECT count(id) from duan WHERE tinhtrang = 'Đang thực hiện'";
                                 $result = mysqli_query($conn, $sql);
                                 $rowdangthuchien = mysqli_fetch_assoc($result);

                                 $tamdung = $rowtamdung['count(id)'];
                                 $hoanthanh = $rowhoanthanh['count(id)'];
                                 $dangthuchien = $rowdangthuchien['count(id)'];
                                ?>

                                <!-- (B) USE PHP TO ECHO JAVASCRIPT CODE -->
                                <script>
                                    <?php 
                                    echo "var tamdung = '$tamdung';"; 
                                    echo "var hoanthanh = '$hoanthanh';"; 
                                    echo "var dangthuchien = '$dangthuchien';"; 
                                    
                                    ?>
                                </script>
                                <div class="card-body">
                                    <div style="">
                                        <canvas id="myChart"></canvas>
                                    </div>

                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                    <script>
                                        const ctx = document.getElementById('myChart');

                                        new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['Đang thực hiện', 'Hoàn thành', 'Tạm dừng'],
                                                datasets: [{
                                                    label: 'Tình trạng của dự án',
                                                    data: [dangthuchien, hoanthanh, tamdung],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Đánh giá dự án</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body --><?php $chuahoanthanh = ""; 
                                 $sql = "SELECT AVG(rate), duan_id, tenduan FROM `feedback` JOIN duan on feedback.duan_id = duan.id  GROUP by duan_id order by rate desc limit 5";
                                 $result = mysqli_query($conn, $sql);
                                 $rowrate = mysqli_fetch_assoc($result);

                                 $tamdung = $rowtamdung['count(id)'];
                                 $hoanthanh = $rowhoanthanh['count(id)'];
                                 $dangthuchien = $rowdangthuchien['count(id)'];
                                ?>

                                <!-- (B) USE PHP TO ECHO JAVASCRIPT CODE -->
                                <script>
                                    <?php 
                                    echo "var tamdung = '$tamdung';"; 
                                    echo "var hoanthanh = '$hoanthanh';"; 
                                    echo "var dangthuchien = '$dangthuchien';"; 
                                    
                                    ?>
                                </script>
                                <div class="card-body">
                                    <div style="">
                                        <canvas id="myChart2"></canvas>
                                    </div>

                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                    <script>
                                        const rate = document.getElementById('myChart2');

                                        new Chart(rate, {
                                            type: 'bar',
                                            data: {
                                                labels: ['Puzzle Defenders', 'Hero Craft: Stumble Race', 'Save the puppy: Pet dog rescue','Hero Craft: Stumble Race','Alphabet Love: Merge Puzzle'],
                                                datasets: [{
                                                    label: 'Tình trạng của dự án',
                                                    data: [5,4, 4, 2,2 
],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php
            //  include 'Chat/chat.php'
            ?>
            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>

<?php
include 'footer.php'
?>
<!-- 
<script>
    src = "https://code.jquery.com/jquery-3.2.1.min.js"
    $(document).ready(function() {

        function load_unseen_notification(view = '') {
            $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                        view: view
                    },
                    dataType: "json",
                    success: function(data) {
                        // window.alert("ok123");
                        $('.dropdown-menu').html(data.notification);
                        if (data.unseen_notification > 0) {
                            $('.count').html(data.unseen_notification);
                        }
                    }
                })
                .done(function(data) {
                    successFunction(data);
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    serrorFunction();
                });

        }
        load_unseen_notification();

        // $('#noti_frm').on('submit', function(event) {
        //     event.preventDefault();
        //     // if ($('#subject').val() != '' && $('#comment').val() != '') {
        //     var form_data = $(this).serialize();
        //     console.log(form_data);
        //     $.ajax({
        //         url: "./taikhoan/dstk_them_code.php",
        //         method: "POST",
        //         data: form_data,
        //         success: function(data) {
        //             $('#noti_frm')[0].reset();
        //             load_unseen_notification();
        //             window.alert("Thêm mới thành công");
        //             window.location='taikhoan/danhsachtaikhoan.php';
        //         }
        //     });
        // });
        //     } else {
        //         alert("Both Fields are Required");
        //     }
        // });

        $(document).on('click', '.dropdown-toggle', function() {
            $('.count').html('');
            load_unseen_notification('yes');
        });

        setInterval(function() {
            load_unseen_notification();;
        }, 2000);

    });
</script> -->