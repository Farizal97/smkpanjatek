<div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
   </button>
	<h5 align="center">
		<img src="../images/panjatek.png" width="30" height="30">
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
//   echo menu_admin("view/view_materi_teacher.php", "list-alt", "Materi");
   echo menu_admin("view/view_ujian_teacher.php", "edit", "Topik");
   echo menu_admin("view/view_ujian_operator.php", "edit", "Setting Ujian");
?>

   </ul>
   <ul class="nav navbar-nav navbar-right">

<?php
   echo menu_admin("view/view_profil.php", "user", $_SESSION['nama']);
   echo menu_admin("logout.php", "off", "Keluar");
?>

   </ul>
</div>
