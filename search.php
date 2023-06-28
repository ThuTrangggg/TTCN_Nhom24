 
 
  <?php
  session_start();
  require("header.php");
  ?>
    <?php
    require("header.php");
    include("connect.php");
    ?> 
    <body style="margin:0;">
      <section class="ftco-section">
    	  <div class="container"> 
            <div class="row">
                <div class="col-md-2 col-lg-3 my-md-3">
                    <?php
                        $param = "";
                        $sortParam = "";
                        $orderConditon = "";
                        $sqll= "SELECT * FROM duan "; 
                        $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                        $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                        if(!empty($orderField) && !empty($orderSort))
                        {
                            $param .= "field=".$orderField."&sort=".$orderSort."&";
                            $orderConditon = "ORDER BY ".$orderField." ".$orderSort;
                        }
                        $item_per_page = 8;
                        $current_page = !empty($_GET['page'])?$_GET['page']:1;
                        $totalRecords = mysqli_query($conn,$sqll );
                        $Records = mysqli_num_rows($totalRecords);
                        $totalPages = ceil($Records / $item_per_page);
                    ?>
                </div>
            </div>
            <div class="row">
                <?php
                    $ten = $_GET['search'];
                    $sql = "
                        SELECT * 
                        FROM duan
                        WHERE tenduan like '%$ten%'
                        ORDER BY id DESC";
                    $Kqtv = mysqli_query($conn, $sql);
                    $i = 0;
                    while ($duan = mysqli_fetch_array($Kqtv)) {
                    $i++;
                ?>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="chitietduan.php?id=<?=$duan['id']?>&& ten=<?=$duan['tenduan']?>" class="img-prod"><img src="./img/<?php echo $duan['hinhanh']?>" class="img-fluid" alt="image" style="width:100%;height:170px;">
                        <span class="status"><?=$duan['tenytuong']?></span>
                        <div class="overlay"></div></a>  
                        <div class="text py-3 pb-4 px-3 text-center"><h3 style="font-family: Open Sans;"><a href="chitietduan.php?id=<?=$duan['id']?>"><?=$duan['tenduan']?></a></h3>
                            

                        </div>
                    </div>
                </div>	  
                <?php
                    if($i%3==2){
                    ?><br>
                    <?php
                    }
                        $i++;
                        }
                ?>
            </div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
        
    	</div>
    </section>

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

              </body>
    <?php require("footer.php");?>
