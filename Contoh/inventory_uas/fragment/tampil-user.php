<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/index.css">

<?php
require_once dirname(__DIR__,1).'/koneksi.php';
        $data = mysqli_query($sambung ,"SELECT * FROM tbl_user");
        if(!$data){
          die ("Koneksi Error : Data Barang Kosong - " . mysqli_error($sambung));
        }else{
          if(mysqli_num_rows($data) == 0) {
            echo "Data Anda Tidak Ada / Kosong!";
          }else{
       

?>

<style type="text/css">
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  height: 500px;
  border: 1px solid #ddd;
}

#tableUser th {
  padding: 8px;
  text-align: center;
  position: sticky;
  top: 0px;
  background-color: #f1f1f1 
}
#tableUser td{
   text-align: center; 
   vertical-align: middle;
}
tr:nth-child(even){background-color: white}
</style>
<head>
  <title>Tampil data User</title>
<link rel="stylesheet" href="style.css">

</head>
<body class="w3-light-grey">
  <div class="w3-main" id="bgOvr" style="margin-left:0px;margin-top:43px;">

     <a href="\inventory_uas/index.php" class="w3-hover w3-hover-text-grey" style="float: left; z-index: 5;" title="Kembali">
    <i class="fa fa-chevron-circle-left w3-xxxlarge"> </i>
  </a>
<center>


  <div class="w3-container">
    <div style="overflow: auto;max-height: 80%;">
    <table class="w3-table w3-hoverable" border="1" id="tableUser" ><div style="overflow: auto;max-height: 80%;">
      <tr class="w3-light-grey">
        <th style="width: 150px;">Gambar</th>
        <th style="min-width: 100px;">ID User</th>
        <th style="width: 200px;">Username</th>
        <th style="width: 170px;">Password</th>
        <th style="width: 30px;">Status</th>
        <th style="width: 200px;">Nama Perusahaan</th>
        <th style="min-width: 500px;">Alamat Perusahaan</th>
        <th style="min-width: 200px;">Nama</th>
        <th style="min-width: 500px;">Alamat</th>
        <th style="min-width: 200px;">Telepon</th>
        <!-- <th style="width: 80px;"></th> -->
      </tr>
        <?php
             while ($hasil = mysqli_fetch_array($data) ) { 
               ?>
            <tr> 
        <td>
           
            <img class="w3-circle" src="../usr_img/<?php echo$hasil['gambar'];?>" width ="70" height="70" border="0"/> 
        </td>
        <td>
            <?php echo $hasil["id_user"];?>  
        </td>
        <td>
            <?php echo $hasil["username"];?>
        </td>
        <td>
            <?php echo $hasil["password"];?>
        </td>
        <td>
            <?php echo $hasil["privilege"];?>
        </td>
        <td><?php echo $hasil["nm_perusahaan"];?> 
        </td>
        
        </td>
        <td><?php echo $hasil["alamat_perusahaan"];?> 
        </td>
        </td>
        <td><?php echo $hasil["nama"];?> 
        </td>
        </td>
        <td><?php echo $hasil["alamat"];?> 
        </td>
        </td>
        <td><?php echo $hasil["no_tlp"];?> 
        </td>

        <!-- <td>
          <a href="fragment/detail-barang-admin.php?id_brg=<?php echo $hasil["id_brg"];?>"><i class="fa fa-edit fa-fw"></i></a>
        </td> -->
        
            </tr>
       
       <?php
              }
            }
           } 
        ?>
    </table>
    </div>

  </div>
</center>
</div>
</body>
