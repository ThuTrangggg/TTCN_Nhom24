
<?php
include("../connect.php");
if (isset($_POST["submit"]))
{
    #retrieve file title
       
    $duanid=$_POST['duan_id'];
    $NVid=$_POST['nhanvien_id'];
    $tenyt=$_POST['tenytuong'];
    
   #file name with a random number so that similar dont get replaced
    $pname = rand(1000,10000)."-".$_FILES["noidung"]["name"];

   #temporary file name to store file
   $tname = $_FILES["noidung"]["tmp_name"];
  
    #upload directory path
    $uploads_dir = 'noidung';
   #TO move the uploaded file to specific location
   move_uploaded_file($tname, $uploads_dir.'/file'.$pname);

   #sql query to insert into database
   $sql="INSERT INTO `ytuong`(`duan_id`, `nhanvien_id`, `tenytuong`, `noidung`) 
   VALUES ($duanid, $NVid, $tenyt, $pname)";
    if(mysqli_query($conn,$sql)){
        echo "them moi";
   }
   else{
       echo "Error";
   }
}


?>
