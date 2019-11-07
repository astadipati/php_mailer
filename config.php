<?php
$databaseHost = 'localhost';
$databaseName = 'xxx';
$databaseUsername = 'xxx';
$databasePassword = 'xxx';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
if (!$conn){
    echo "0";
}else{
    echo "1";
}

// $sql="select a.nomor_perkara_pn, a.permohonan_banding, a.tanggal_register_banding, a.nomor_perkara_banding, a.pihak_nama, a.alamat, a.email_satker, b.status
// from v_info_pihak a 
// left join p_diterima b on a.nomor_perkara_pn = b.nomor_perkara_pn
// where b.status is null and a.nomor_perkara_pn like '%tbn' and year(a.tanggal_register_banding)=2019 limit 1";
// $result=mysqli_query($conn,$sql);

// $row=mysqli_fetch_array($result,MYSQLI_NUM);
// printf ("%s (%s)\n",$row[0],$row[1]);

// mysqli_close($con);

?>

