<?php
require_once 'create-user-id.php';
function cekId($sambung ,$tableName , $ColumnName,$id){
	$data = mysqli_query($sambung ,"SELECT * FROM $tableName WHERE $ColumnName='$id'");
	if(!$data){
          die ("Koneksi Error : Data Barang Kosong - " . mysqli_error($sambung));
        }else{
      	if(mysqli_num_rows($data) > 0) {
            $nid = createId();
            ;
            if (cekId($tableName, $ColumnName, $nid)<>true) {
              $nid = createId();
            }else{
              return $nid;
            }
          }else{
          	return true;
      }
    }
  }
?>