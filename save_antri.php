<?php  
//  $connect = mysqli_connect("localhost", "root", "Kul0nuwun", "autopost");
$databaseHost = 'localhost';
$databaseName = 'xxx';
$databaseUsername = 'xxx';
$databasePassword = 'xxx';

$log = date("Y-m-d H:i:s");

$connect = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

 if(isset($_POST["post1"]) 
    && isset($_POST["post2"]) 
    && isset($_POST["post3"]) 
    && isset($_POST["post4"]) 
    && isset($_POST["post5"]) 
    && isset($_POST["post6"]) 
    && isset($_POST["post7"]))
 {
  $post1 = mysqli_real_escape_string($connect, $_POST["post1"]);
  $post2 = mysqli_real_escape_string($connect, $_POST["post2"]);
  $post3 = mysqli_real_escape_string($connect, $_POST["post3"]);
  $post4 = mysqli_real_escape_string($connect, $_POST["post4"]);
  $post5 = mysqli_real_escape_string($connect, $_POST["post5"]);
  $post6 = mysqli_real_escape_string($connect, $_POST["post6"]);
  $post7 = mysqli_real_escape_string($connect, $_POST["post7"]);
  if($_POST["postId"] != '')  
  {  
    //update post  
    echo "Sukses simpan";
    // die();
    // $sql = "UPDATE tbl_post SET nomor_perkara_pn = '".$nomor_perkara_pn."', permohonan_banding = '".$permohonan_banding."',email = '".$email."' WHERE post_id = '".$_POST["postId"]."'";  
    // mysqli_query($connect, $sql);  
  }  
  else  
  {  
    //insert post  
    $sql = "INSERT INTO p_diterima(nomor_perkara_pn, permohonan_banding, tanggal_register_banding,nomor_perkara_banding,pihak_nama, alamat, email_satker, cek_status, log) VALUES
                                  ('".$post1."', '".$post2."','".$post3."','".$post4."','".$post5."','".$post6."','".$post7."','1','".$log."')";  
    mysqli_query($connect, $sql);  
    echo mysqli_insert_id($connect);  
  }
  mysqli_close($connect);
 }  
 ?>