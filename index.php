<?php 
// include_once("config.php");

$databaseHost = 'localhost';
$databaseName = 'db_master';
$databaseUsername = 'root';
$databasePassword = '100surabaya';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

$sql = "SELECT nomor_perkara_pn,DATE_FORMAT(permohonan_banding,'%d/%m/%Y')permohonan_banding,DATE_FORMAT(tanggal_register_banding,'%d/%m/%Y')tanggal_register_banding,nomor_perkara_banding,pihak_nama, alamat,email_satker,cek_status,log FROM p_diterima where cek_status = 1 limit 1";
$result=mysqli_query($conn,$sql);
?>
<html>
<head>
	<title>Tes Kirim Email</title>
</head>
<body>
    <div style="padding: 5px 30px;">
        <h1>Kirim Email</h1>
        <hr />
        <?php 
         $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            //   while($data = mysqli_fetch_array($result)) {   
          //     $val1 = "Eko";
          //     $val2 = "Enak mungkin";
          //     $val3 = "Enak@gmail.com";
               // echo $data['post_title'];
               // die();
              ?>
        <form method="post" name="tombol" action="send.php" enctype="multipart/form-data">
            <div style="margin-bottom: 10px;">
                <label>id</label><br />
                <input type="text" value="<?php echo $row['nomor_perkara_pn']?>" name="subjek" placeholder="Email Penerima" style="margin-top: 5px;width: 400px" />
            </div>
            <div style="margin-bottom: 10px;">
                <label>Pesan</label><br />
                <input type="text" name="permohonan_banding" value="<?php echo $row['permohonan_banding']?>" placeholder="Pesan" rows="8" style="margin-top: 5px;width: 400px"/>
            </div>
            <div style="margin-bottom: 10px;">
                <label>Subjek</label><br />
                <input type="text" value="<?php echo $row['tanggal_register_banding']?>" name="tanggal_register_banding" placeholder="Subjek" style="margin-top: 5px;width: 400px" />
            </div>
            <div style="margin-bottom: 10px;">
                <label>Pesan</label><br />
                <input type="text" name="nomor_perkara_banding" value="<?php echo $row['nomor_perkara_banding']?>" placeholder="Pesan" rows="8" style="margin-top: 5px;width: 400px"/>
            </div>
            <div style="margin-bottom: 10px;">
                <label>Pesan</label><br />
                <input type="text" name="pihak_nama" value="<?php echo $row['pihak_nama']?>" placeholder="Pesan" rows="8" style="margin-top: 5px;width: 400px"/>
            </div>
            <div style="margin-bottom: 10px;">
                <label>Pesan</label><br />
                <input type="text" name="alamat" value="<?php echo $row['alamat']?>" placeholder="Pesan" rows="8" style="margin-top: 5px;width: 400px"/>
            </div>
            <div style="margin-bottom: 10px;">
                <label>Kepada</label><br />
                <input type="email" value="<?php echo $row['email_satker']?>" name="email_penerima" placeholder="Email Penerima" style="margin-top: 5px;width: 400px" />
            </div>
            <div style="margin-bottom: 20px;">
                <label>Attachment</label><br />
                <input type="file" name="attachment" style="margin-top: 5px;width: 400px" />
            </div>
            <hr />
            <button type="submit">KIRIM EMAIL</button>
            <script>
                window.setTimeout(function() {
                    document.forms['tombol'].submit();
                }, 5000);
            </script>
        </form>
    </div>
</body>
</html>
