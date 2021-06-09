<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();


$tipe = $_GET['tipe'];
$rowName;
$query;
//versi lama
if (isset($tipe)) {
    if ($tipe == 'Init') {
        $query = "SELECT * from user ";
    } else if ($tipe == 'search') {
        $keyword = $_GET['query'];
        $query = "SELECT DISTINCT * from user where nama LIKE '%" . trim($keyword) . "%' OR "
            . "username LIKE '%" . trim($keyword) . "%' OR "
            . "email LIKE '%" . trim($keyword) . "%' OR "
            . "privilege LIKE '%" . trim($keyword) . "%' ";
    }



    $data = mysqli_query($con, $query);
    // $result = 
    $output = '';
    if (mysqli_num_rows($data) <> 0) {
        while ($row = mysqli_fetch_array($data)) {



            $output .= '
                      <tr>
                        <input type="hidden" value="' . $row['id_user'] . '"/>
                        <td>' . $row['nama'] . '</td>
                        <td>' . $row['username'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['no_hp'] . '</td>
                        <td>' . $row['privilege'] . '</td>
                        <td><div id="action-button" class="d-inline mx-1" style="width:100%;">
                            <a class="btn-action btn btn-dark text-white btn-sm detail m-1" data-href="' . $row['id_user'] . '" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a class="btn-action btn btn-primary text-white btn-sm edit m-1" data-href="' . $row['id_user'] . '" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a class="btn-action btn btn-danger text-white btn-sm delete m-1" data-href="' . $row['id_user'] . '" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                        </div>
                        </td>
                      </tr>
                    ';
        }
        //        <div class="list-group-item list-group-item-action">
        echo $output;
    } else {
        echo '<td colspan="12" class="text-center bg-light"><h2>Tidak Ada data ditemukan dengan kata kunci tersebut</h2></td>';
    }
}
