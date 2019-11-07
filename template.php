<!DOCTYPE html>
<?php 
// $connect = mysqli_connect("localhost", "root", "Kul0nuwun", "autopost");
include_once("config.php");

$email_penerima = $_POST['email_penerima']; // Ambil email penerima dari inputan form
$subjek = $_POST['subjek']; // Ambil subjek dari inputan form
$pesan = $_POST['pesan']; // Ambil pesan dari inputan form
$id = $_POST['antrian_id']; // Ambil pesan dari inputan form
$nomor_perkara_banding = $_POST['nomor_perkara_banding']; // Ambil pesan dari inputan form
$pihak_nama = $_POST['pihak_nama']; // Ambil pesan dari inputan form
$alamat = $_POST['alamat']; // Ambil pesan dari inputan form
$permohonan_banding = $_POST['permohonan_banding']; // Ambil pesan dari inputan form
$tanggal_register_banding = $_POST['tanggal_register_banding']; // Ambil pesan dari inputan form

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}
.menu {
  float: left;
  width: 20%;
  padding: 0 20px;
  overflow: hidden;
}
.menuitem {
  padding: 8px;
  margin-top: 7px;
  border-bottom: 1px solid #f1f1f1;
}
.main {
  float: left;
  width: 50%;
  padding: 0 20px;
  overflow: hidden;
}
.right {
  background-color: #00BCD4;
  float: left;
  width: 30%;
  padding: 10px 15px;
  margin-top: 7px;
}

@media only screen and (max-width:800px) {
  /* For tablets: */
  .main {
    width: 80%;
    padding: 0;
  }
  .right {
    width: 100%;
  }
}
@media only screen and (max-width:500px) {
  /* For mobile phones: */
  .menu, .main, .right {
    width: 100%;
  }
}
</style>
</head>
<body style="font-family:Verdana;">

<!-- <div style="background-color:#f1f1f1;padding:15px;">
  <h1>Cinque Terre</h1>
  <h3>Resize the browser window</h3> -->
  <div style="float: left;margin-right: 10px;">
        <img src="cid:PTA_Surabaya" alt="Logo" style="height: 50px">
    </div>

    <h2 style="margin-bottom: 0;">PTA Surabaya</h2>
    http://www.pta-surabaya.go.id
    <div style="clear: both"></div>
    <hr />

</div>

<div style="overflow:auto">
  <div class="menu">
    <p>Nomor Perkara TK 1</p> 
    <p>Permohonan Banding</p>
    <p>Tanggal Register</p>
    <p>Nomor Banding</p>
    <p>Nama Pembanding</p>
    <p>Alamat</p>
  </div>

  <div class="main">
    <p><?php echo $subjek; ?></p>
    <p><?php echo $permohonan_banding?></p>
    <p><?php echo $tanggal_register_banding?></p>
    <p><?php echo $nomor_perkara_banding?></p>
    <p><?php echo $pihak_nama?></p>
    <p><?php echo $alamat?></p>
    <!-- <p>sdfdsfdsfd</p>
    <p>sdfdsfdsfd</p> -->
    <!-- <img src="img_5terre.jpg" style="width:100%"> -->
  </div>

  <div class="right">
    <h2>Whats Up ?</h2>
    <p>E-mail ini merupakan <br/>"<b><i>Generate by System</i></b>" yang akan mengirim pesan secara otomatis apabila perkara banding telah diterima & di register oleh <b>Pengadilan Tinggi Agama Surabaya</b></p>
  </div>
</div>

<hr>
<div style="background-color:#f5f5f5;text-align:center;padding:10px;margin-top:7px;font-size:12px;"> <b>Copyright @ <?php echo date("Y") ?> TIM IT PTA Surabaya</b><br/> Jl. Mayjen Sungkono No.7, Dukuh Pakis, Kec. Dukuh pakis, Kota Surabaya, Jawa Timur 60224.</div>
<!-- <div style="background-color:#ffffff;text-align:center;padding:10px;margin-top:7px; font-size:10px;"> </div> -->

</body>
</html>