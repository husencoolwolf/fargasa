<?php
//memasukkan koneksi database
require_once("connection.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = $conn->query("SELECT * FROM pembelian WHERE id='$id'");
    //jika ada datanya
    if ($view->num_rows) {
        //fetch data ke dalam veriabel $row_view
        $row_view = $view->fetch_assoc();
        //menampilkan data dengan table
        echo '
		<p>Berikut ini adalah detail dari data siswa <b>' . $row_view['tipe'] . '</b></p>
		<table class="table table-bordered">
			<tr>
				<th></th>
				<td>' . $row_view['tipe'] . '</td>
			</tr>
			<tr>
				<th></th>
				<td>' . $row_view['hrg_beli'] . '</td>
			</tr>
			<tr>
				<th></th>
				<td>' . $row_view['warna'] . '</td>
			</tr>
		</table>
		';
    }
}
