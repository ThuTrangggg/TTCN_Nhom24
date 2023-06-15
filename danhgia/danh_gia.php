
<!DOCTYPE html>
<html lang="en">
<base href="../">
<?php include '../connect.php';
include '../head.php';
// $duan_id = $_GET['id'];
// ?>
// <?php //include 'connect.php';
//include 'head.php';
$duan_id = $_POST['duan_id'];
// $sanpham_id = $_GET['id'];

$taikhoan_id = $_POST['taikhoan_id'];

?>

<style>
    div.stars {
        width: 270px;
        display: inline-block;
    }

    input.star {
        display: none;
    }

    label.star {
        float: right;
        padding: 5px;
        font-size: 18px;
        color: #444;
        transition: all .2s;
        font-weight: 100;

    }

    input.star:checked~label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    input.star-5:checked~label.star:before {
        color: #FE7;
        text-shadow: 0 0 10px #952;
    }

    input.star-1:checked~label.star:before {
        color: #F62;
    }

    label.star:hover {
        transform: rotate(-10deg) scale(1.3);
    }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }
</style>
<?php

$sql1 = "SELECT * FROM duan
    WHERE id='" . $duan_id . "' ";
$kq = mysqli_query($ket_noi, $sql1);
$row1 = mysqli_fetch_array($kq);
?>
<div class="container" style="margin-top: 150px;">
    <label style="font-size: 28px;" for="">Đánh giá sản phẩm: </label>
    <div style="border: 1px solid lightgrey; padding: 40px; margin-bottom: 150px">

        <form class="form row" method="post" action="../TTCN_Nhom24/danhgia/danh_gia_code.php" id="rate">
            <div class="col-md-4">
                <div class="col-md-5">

                    <img height="150px" src="<?= $row1['hinhanh']; ?>" alt="">
                </div>
                <div class="col-md-7">
                    <?php
                    echo $row1['tenduan']; ?>
                </div>

            </div>
            <br>
            <div class="col-md-6">

                <input type="hidden" value="<?= $row1["duan.id"] ?>" name="duan_id" />
                <input type="hidden" value="<?= $taikhoan_id ?>" name="taikhoan_id">
                <!-- <input type=""> -->
                <div class="row" style="align-items: center;">

                    <!-- <input type="submit" class="button-capnhat text-uppercase offset-md-1 btn" style="background-color: #000; border-radius: 40px; color:#fff;height: 36px; width: 152px; margin-left:64px;" name="btnSubmit" value="Thêm vào giỏ hàng"> -->

                    <!-- <button type="button" class="btn btn-info" style="width: 100px; height: 35px; margin-left: 40px; border-radius: 50px; background-color: #DAF9E6; color: #000; border: 1px solid #000;">MUA NGAY</button> -->
                    <!-- <a  href="/Nhom14/wishlist/them_wishlist.php"class="like-btn" style="margin:15px; ">
                <button <i class="fa-regular fa-heart" style="border: none; box-shadow: 0 2px 4px rgb(0 0 0 / 16%); border-radius: 20px; width: 30px; height: 30px; font-size: 18px; background-color: white;"></i></button>
            </a> -->
                </div>
                <?php
                ?>
                <fieldset>
                    <div class="control-group">
                        <div class="controls">
                            <input placeholder="Đánh giá của bạn" required style="outline: none; border-radius: 0; color: black; border: 1px solid #000; translate: 0 -21px;" class="form-control" type="text" id="tentaikhoan" name="noidung">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="file" id="password" name="img">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">

                        <label class="col-md-6" style="display: inline-block; font-weight: 100" for="">Xếp hạng của bạn</label>

                        <div class="col-md-6 stars" style="translate: -233px -9px;">
                            <input class="star star-5" value="5" id="star-5" type="radio" name="star" />
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" value="4" id="star-4" type="radio" name="star" />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" value="3" id="star-3" type="radio" name="star" />
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" value="2" id="star-2" type="radio" name="star" />
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" value="1" id="star-1" type="radio" name="star" />
                            <label class="star star-1" for="star-1"></label>
                        </div>
                    </div>


                </fieldset>
            </div>
            <div class="col-md-1">
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <button type="submit" style="translate: 0px -41px; border: none; background-color: black; color: #fff; width: 100px; height: 34px; " class="">Gửi đánh giá</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<script>
    function checkForm() {
        var username = document.forms['register']["username"].value;
        var password = document.forms['register']["password"].value;

        if (username == '') {
            alert('Bạn phải nhập đầy đủ thông tin người dùng');
            document.forms["register"]["username"].focus();
            return false;
        } else if (password == '') {
            alert('Bạn phải nhập mật khẩu');
            document.forms["register"]["password"].focus();
            return false;
        }
    }
</script>
</body>

</html>

<?php include '../footer.php' ?>