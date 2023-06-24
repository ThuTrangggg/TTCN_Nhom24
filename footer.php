<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<?php include 'connect.php' ?>
<body>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Bản quyền thuộc về &copy; Nhóm 24</span>
                    </div>
                </div>
            </footer>
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


    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

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
                        // history.back();
                        $('.dropdown-notice').html(data.notification);
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
</script>