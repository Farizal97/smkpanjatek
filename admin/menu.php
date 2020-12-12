<div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
   </button>
	<h5 align="center">
		<img src="../images/panjatek.png" width="40" height="40">
		<font color="black" style="bold"><b>E-Learning SMK Panjatek</b></font>
	</h5>
</div>

<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">

<?php
	
function menu_admin($link, $icon, $title){
   $item = '<li><a href="'.$link.'" class="navigation"><i class="glyphicon glyphicon-'.$icon.'"></i> '.$title.'</a></li>';
   return $item;
}

   echo menu_admin("home.php", "home", "Beranda");
   echo menu_admin("view/view_kelas.php", "signal", "Kelas");
   echo menu_admin("view/siswa.php", "list-alt", "Siswa");
   echo menu_admin("view/view_user.php", "user", "Guru");
   echo menu_admin("view/view_ujian.php", "edit", "Ujian");
   echo menu_admin("view/view_klsujian.php", "sort-by-attributes", "Kelas Ujian");
 
?>

   </ul>
   <ul class="nav navbar-nav navbar-right">

<?php
   echo menu_admin("view/view_profil.php", "user", $_SESSION['nama_adm']);
   echo menu_admin("logout.php", "off", "Keluar");
?>

   </ul>
</div>
