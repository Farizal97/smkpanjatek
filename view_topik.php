<?php
session_start();
include "library/config.php";
include "library/function_date.php";

if( empty($_SESSION['username']) or empty($_SESSION['password']) or empty($_SESSION['siswa'])){
   header('location: login.php');
}

echo '<h3 class="page-header">Daftar Topik</h3>';
echo '<hr/><div class="alert alert-info"><ul>
<li>Klik tombol Download pada kolom Materi untuk men-download materi!</li>
<li>Klik tombol Diskusi pada kolom Diskusi untuk melihat diskusi!</li>
</ul></div>';
/*Cek jumlah ujian pada tanggal sekarang
$tgl = date('Y-m-d');
$qujian = mysqli_query($mysqli, "SELECT * FROM ujian t1, kelas_ujian t2 WHERE t1.id_ujian=t2.id_ujian AND t2.id_kelas='$_SESSION[kelas]' SORT BY id_ujian DESC");
$tujian = mysqli_num_rows($qujian);
$rujian = mysqli_fetch_array($qujian);
*/
   echo '<table class="table table-striped"><thead>
   <tr>
      <th>No</th>
      <th>Nama Mapel</th>
      <th>Topik</th>
      <th>Materi</th>
      <th>Tanggal Ujian</th>
      <th>Diskusi</th>
   </tr></thead>
   <tbody>';
   $qujian = mysqli_query($mysqli, "SELECT * FROM ujian t1, kelas_ujian t2 WHERE t1.id_ujian=t2.id_ujian AND t2.id_kelas='$_SESSION[kelas]' ORDER BY t1.id_ujian DESC");
   $no = 1;
   while($r = mysqli_fetch_array($qujian)){
      
      $kelas_ujian = array();
      $qkelas_ujian = mysqli_query($mysqli, "SELECT * FROM kelas t1, kelas_ujian t2 WHERE  t1.id_kelas=t2.id_kelas AND t2.id_ujian='$r[id_ujian]'");
      while($rku = mysqli_fetch_array($qkelas_ujian)){
         $kelas_ujian[] = $rku['kelas'];
      }
	  $labeldiskusi="";
	  $qdiskusi = mysqli_query($mysqli, "SELECT * FROM diskusi WHERE id_kelas ='$_SESSION[kelas]' AND id_ujian='$r[id_ujian]'");
	  $jmldiskusi = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM diskusi WHERE id_ujian='$r[id_ujian]' AND id_kelas='$_SESSION[kelas]'"));
	  $labeldiskusi .= '<a class="btn btn-xs btn-info" style="margin-bottom: 5px" onclick="show_diskusi('.$_SESSION['kelas'].','.$r['id_ujian'].')">Diskusi &nbsp;&nbsp; <span class="label label-warning">'.$jmldiskusi.'</span></a> ';
	  $download = "guru/upload/".$r['materi'];
	  $labeldownload="";
      $labeldownload .= '<a href='.$download.' class="btn btn-xs btn-info" target="_blank" style="margin-bottom: 5px">Download</a>';
	  echo'<tr>
         <td>'.$no.'</td>
         <td>'.$r['nama_mapel'].'</td>
         <td>'.$r['topik'].'</td>';
		 if($r['materi']==""){
			 echo '<td>Belum Ada Materi</td>';
		 }else{
			echo '<td>'.$labeldownload.'</td>';
		}
	echo'
         <td>'.tgl_indonesia($r['tanggal']).'</td>
         <td>'.$labeldiskusi.'</td>
     </tr>';
	 $no++;
  }

   echo '</tbody></table>';
//}
?>
