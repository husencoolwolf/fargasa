<?php
//memasukkan koneksi database
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';

$conn = new createCon();
$con = $conn->connect();

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if (isset($_POST['id'])) {
    //membuat variabel id berisi post['id']
    $id = $_POST['id'];
    //query standart select where id
    $view = mysqli_query($con, "SELECT * FROM stok WHERE id_pembelian='$id'");
    //jika ada datanya
    if ($view->num_rows) {
        //fetch data ke dalam veriabel $row_view
        $row_view = $view->fetch_assoc();
        //menampilkan data dengan table
        echo '
        <h4>'. $conn->intToRupiah($row_view['hrg_jual']) .'</h4>
		<table class="table table-bordered">
			<tr>
				<th>Tipe</th>
				<td>' . $row_view['tipe'] . '</td>
			</tr>
			<tr>
				<th>Warna</th>
				<td>' . $row_view['warna'] . '</td>
			</tr>
			<tr>
				<th>Tahun</th>
				<td>' . $row_view['tahun'] . '</td>
			</tr>
			<tr>
				<th>Jarak Tempuh</th>
				<td>' . $row_view['jarak_tempuh'] . '</td>
			</tr>
			<tr>
				<th>Jenis BBM</th>
				<td>' . $row_view['jenis_bbm'] . '</td>
			</tr>
		</table>
		';
    }
}
