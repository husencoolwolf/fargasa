<table id="regTBL" cellpadding="6" style="padding: 10px">
     <tbody align="center">
     <tr>
      <!-- Nama -->
      <td><input type="text" id="txt_nama_dpn" name="txt_nama_dpn" placeholder="Nama Depan" style="border: 2px solid; border-radius: 5px;padding:5px;width: 70%" value="" required /></td>
    </tr>
     <tr>
      <td><input type="text" name="txt_nama_blk" placeholder="Nama Belakang" style="border: 2px solid;border-radius: 5px;padding:5px;width: 70%" value=""/></td>
     </tr>
     <!-- username -->
     <tr>
      <td><input type="text" id="txt_username" name="txt_username" placeholder="Username" style="border: 2px solid; border-radius: 5px;padding:5px;width: 70%" value="" required/></td>
     </tr>
     <!-- password -->
     <tr>
      <td><input id="password" type="password" name="txt_password" placeholder="Password" style="border: 2px solid; border-radius: 5px;padding:5px;width: 70%;float: none;" value="" required/></td>
     </tr>
     <tr>
      <td>
        <input id="re-password" type="password" name="txt_re_password" placeholder="Ulangi Password" style="border: 2px solid; border-radius: 5px;padding:5px;width: 70%;"required onchange="checkpass();" value="" />
        <span class="w3-animate-opacity" id="mRPass" style="text-align: center;display: none;">a</span>
      </td>
     </tr>
    <tr>
      <!-- Nomer telp -->
      <td>
        <input id="nope" type="number" name="nope" placeholder="No. Telp / HandPhone" style="border: 2px solid; border-radius: 5px;padding:5px;width: 70%;float: none;" value="" required/>
      </td>
       
    </tr>
    <tr>
     <!-- Alamat -->
     <td>
     <textarea name="txt_alamat" placeholder="Alamat" style="border: 2px solid; border-radius: 5px;padding:5px;width: 80%; height: 100px;" value=""></textarea>
     </tr>
     <!-- preview Foto -->
     <tr>
      <td>
      <span style="float: left;">
        <img src="usr_img/Users-Guest-icon.png" class="w3-circle w3-margin-right" id="fotoView" style="width:70px;height: 70px">
      </span>
      <!-- input foto -->
      <span style="float: right;">
      <input id="fotoSource" class="w3-white" type="file" name="fotoSource" title="foto" style="border:none;width: 100%;padding:5px" onchange="previewImage();" />
      </span>
      </td>
    </tr>
     <tr >
     <!-- <td ><input type="submit" name="btn_simpan" id="btn_simpan"
    value="Simpan" /></td> -->
    <td><p class="next-btn button w3-hover-green" id="next1" onclick="kedua();">Selanjutnya</p></td>
     </tr>
     </tbody>
     </table>