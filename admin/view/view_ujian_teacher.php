<script type="text/javascript" src="script/script_ujian_teacher.js"> </script>

<?php
session_start();
if(empty($_SESSION['user']) or empty($_SESSION['pass'])){
   header('location: login.php');
}

include "../../library/config.php";
include "../../library/function_view.php";

create_title("edit", "Manajemen Topik");

echo '<hr/><div class="alert alert-info"><ul>
<li>Klik tombol edit pada kolom Bank Soal untuk mengatur soal!</li>
<li>Klik nama kelas pada kolom Kelas Ujian untuk melihat nilai pada kelas tersebut!</li>
<li>Klik tombol Diskusi pada kolom Diskusi untuk melihat diskusi!</li>
</ul></div>';

create_table(array("Topik", "Nama Mapel", "Tanggal", "Jml. Soal", "Materi","Bank Soal", "Kelas Ujian","Diskusi"));
?>