<?php
session_start();
?>
<script type = "text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>

<?php

if(empty($_SESSION['user_adm']) or empty ($_SESSION['pass_adm'])){
   header('location: login.php');
}
$jk="";
if($_SESSION['jk_adm']=="Laki-Laki"){
	$jk="Bapak";
}else{
	$jk="Ibu";
}
?>


<div class="jumbotron">
   <div class="container text-center">
      <h2>Selamat Datang <?php echo $jk;?> <b> <?= $_SESSION['nama_adm']; ?> </b>!</h2>
      <p>Anda login sebagai <b> Administrator </b></p>
   </div>
</div>
