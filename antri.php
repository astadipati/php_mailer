<?php 
$secondsWait = 120;
echo date('Y-m-d H:i:s');
echo '<meta http-equiv="refresh" content="'.$secondsWait.'">';

// include_once("config.php");
// $result = mysqli_query($mysqli, "SELECT * from v_info_pihak");
$databaseHost = 'localhost';
$databaseName = 'db_master';
$databaseUsername = 'root';
$databasePassword = '100surabaya';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
$sql="select a.nomor_perkara_pn, a.permohonan_banding, a.tanggal_register_banding, a.nomor_perkara_banding, a.pihak_nama, a.alamat, a.email_satker, b.cek_status
from v_info_pihak a 
left join p_diterima b on a.nomor_perkara_pn = b.nomor_perkara_pn
where b.cek_status is null and a.nomor_perkara_pn like '%tbn' and year(a.tanggal_register_banding)=2019 limit 1";
$result=mysqli_query($conn,$sql);
?>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">  
         <meta charset="utf-8">  
         <title>Golek datane</title>  
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<body>
    <div style="padding: 5px 30px;">
        <h1>Simpan data</h1>
        <hr />
        <?php 
              $row=mysqli_fetch_array($result,MYSQLI_ASSOC);   
              
          //     echo $row['nomor_perkara_pn'];
              ?>
              <div class="form-group">  
                   <label>Enter Post Title</label>  
                   <input type="text" value="<?php echo $row['nomor_perkara_pn']?>" name="nomor_perkara_pn" id="nomor_perkara_pn" class="form-control" />  
              </div>  
              <div class="form-group">  
                   <label>Enter Post Description</label>  
                   <input type="text" value="<?php echo $row['permohonan_banding']?>" name="permohonan_banding" id="permohonan_banding" class="form-control" />  
              </div>
              <div class="form-group">  
                   <label>Email</label>  
                   <input type="text" value="<?php echo $row['tanggal_register_banding']?>" name="tanggal_register_banding" id="tanggal_register_banding" class="form-control" />  
              </div>
              <div class="form-group">  
                   <label>Email</label>  
                   <input type="text" value="<?php echo $row['nomor_perkara_banding']?>" name="nomor_perkara_banding" id="nomor_perkara_banding" class="form-control" />  
              </div>
              <div class="form-group">  
                   <label>Email</label>  
                   <input type="text" value="<?php echo $row['pihak_nama']?>" name="pihak_nama" id="pihak_nama" class="form-control" />  
              </div>
              <div class="form-group">  
                   <label>Email</label>  
                   <input type="text" value="<?php echo $row['alamat']?>" name="alamat" id="alamat" class="form-control" />  
              </div>
              <div class="form-group">  
                   <label>Email</label>  
                   <input type="text" value="<?php echo $row['email_satker']?>" name="email_satker" id="email_satker" class="form-control" />  
              </div>
              <?php 
              ?>
               <div class="form-group">
               <button type="button" name="publish" class="btn btn-info">Publish</button>
               </div>
              <div class="form-group">  
                   <input type="text" name="post_id" id="post_id" />  
                   <div id="autoSave"></div>  
              </div>  
         </div>  
    </body>  
</html>  
<script>  
$(document).ready(function(){  
    function autoSave() 
    {  
         var nomor_perkara_pn = $('#nomor_perkara_pn').val();  
         var permohonan_banding = $('#permohonan_banding').val();  
         var tanggal_register_banding = $('#tanggal_register_banding').val();  
         var nomor_perkara_banding = $('#nomor_perkara_banding').val();  
         var pihak_nama = $('#pihak_nama').val();  
         var alamat = $('#alamat').val();  
         var email_satker = $('#email_satker').val();  
         var post_id = $('#post_id').val();  
         if(nomor_perkara_pn != '' && permohonan_banding != '' && tanggal_register_banding != '')  
         {  
              $.ajax({  
                   url:"save_antri.php",  
                   method:"POST",  
                   data:{post1:nomor_perkara_pn, 
                         post2:permohonan_banding, 
                         post3:tanggal_register_banding, 
                         post4:nomor_perkara_banding, 
                         post5:pihak_nama, 
                         post6:alamat, 
                         post7:email_satker, 
                         postId:post_id},  
                   dataType:"text",  
                   success:function(data)  
                   {  
                        if(data != '')  
                        {  
                             $('#post_id').val(data);  
                        }  
                        $('#autoSave').text("Post save as draft");  
                        setInterval(function(){  
                             $('#autoSave').text('');  
                        }, 5000);  
                   }  
              });  
         }            
    }  
    setInterval(function(){   
         autoSave();   
         }, 10000);  
});  
</script>

