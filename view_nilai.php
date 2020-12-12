<?php
session_start();
include "library/config.php";
include "library/function_date.php";

if( empty($_SESSION['username']) or empty($_SESSION['password']) or empty($_SESSION['siswa'])){
   header('location: login.php');
}

echo '<h3 class="page-header">Daftar Nilai</h3>';

//Cek jumlah ujian pada tanggal sekarang
$tgl = date('Y-m-d');

   echo '<table class="table table-striped">
   <thead>
   <tr>
      <th>No</th>
      <th>Topik</th>
      <th>Nama Mapel</th>
      <th>Nilai</th>
   </tr>
   </thead>
   <tbody>';
   
   $qujian = mysqli_query($mysqli, "SELECT nilai.*, ujian.* FROM nilai, ujian WHERE nilai.id_ujian=ujian.id_ujian AND nilai.nis='$_SESSION[nis]' ORDER BY nilai.id_nilai DESC");
   $no = 1;
   while($r = mysqli_fetch_array($qujian)){
    echo'<tr>
         <td>'.$no.'</td>
         <td>'.$r['topik'].'</td>
         <td>'.$r['nama_mapel'].'</td>
         <td>'.$r['nilai'].'</td>
        </tr>';
	 $no++;
  }

   echo '</tbody></table>';
?>
