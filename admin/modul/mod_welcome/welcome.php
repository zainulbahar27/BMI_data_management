<?php
$aksi="modul/mod_welcome/aksi_welcome.php";
switch($_GET[act]){
  // Tampil Welcome
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='56'");
    $r    = mysql_fetch_array($sql);
	echo "
   <div id='main-content'>
   <div class='container_12'>
   <div class='grid_12'>
   </div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>EDIT SELAMAT DATANG</h1>
   <span></span> 
   </div>
   <div class='block-content'>
  
    <form method=POST enctype='multipart/form-data' action=$aksi?module=welcome&act=update>
    <input type=hidden name=id value=$r[id_modul]>
		  
    <p class=inline-small-label> 
   <textarea name='isi' style='width: 550px; height: 500px;'>$r[static_content]</textarea></td>
   </p>";

    echo "<div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=welcome'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </form>";
	
    break;  
   }
  ?>


   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>
