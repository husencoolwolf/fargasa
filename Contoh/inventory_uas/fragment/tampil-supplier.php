<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/index.css">

<?php
require_once dirname(__DIR__,1).'/koneksi.php';
        $data = mysqli_query($sambung ,"SELECT * FROM tbl_supplier");
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
  <title>Tampil data Supplier</title>

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
        <th style="width: 100px;">ID User</th>
        <th style="min-width: 300px;">Nama Perusahaan</th>
      </tr>
        <?php
             while ($hasil = mysqli_fetch_array($data) ) { 
               ?>
            <tr> 
        <td>
           
            <img class="w3-circle" src="../assets/pic/supplier/<?php echo$hasil['gambar'];?>" width ="70" height="70" border="0"/> 
        </td>
        <td>
            <?php echo $hasil["id_supplier"];?>  
        </td>
        <td>
            <?php echo $hasil["perusahaan_supplier"];?>
        </td>
        
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
