<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_menuutama/aksi_menuutama.php";
switch($_GET[act]){
  // Tampil Menu Utama
  default:
    echo "
	<div id='main-content'>
   	<div class='container_12'>
   	<div class=grid_12> 
	<h2>Menu Utama</h2>
	 <a href='?module=menuutama&act=tambahmenuutama' class='button'>
     <span>Tambah Menu Utama</span>
     </a><br/><br/>
	 *) Data pada Menu tidak bisa dihapus, tapi bisa di non-aktifkan melalui Edit Menu Utama.<br>
                         **) Untuk link menu Beranda (Home) harus diubah ketika online menjadi http://NamaDomainAnda.com
	 <div class='grid_12'>
     <div class='block-border'>
     <div class='block-header'>
     <span></span> 
     </div>
     <div class='block-content'>
		  <table id='table-example' class='table'>
       	  <thead>
          <tr><th class='center'>no</th>
          <th class='center'>menu utama</th>
          <th class='left'>link</th>
          <th align=center>aktif</th>
          <th class='center' width=100>admin menu</th>
          <th align=center>aksi</th></tr></thead><tbody>";
          
    $tampil=mysql_query("SELECT * FROM mainmenu");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td class='center' width='25'>$no</td>
             <td class='left'>$r[nama_menu]</td>
             <td class='left'>$r[link]</td>
             <td align='center'>$r[aktif]</td>
             <td align='center'>$r[adminmenu]</td>
             <td align='center' width='80'><a href=?module=menuutama&act=editmenuutama&id=$r[id_main] title='Edit' rel=tooltip-top class=with-tip><center><img src='img/edit.png' border='0'/></a>
             </td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  
  // Form Tambah Menu Utama
  case "tambahmenuutama":
     echo "
  <div id='main-content'>
  <div class='container_12'>

  <div class='grid_12'>
  <div class='block-border'>
  <div class='block-header'>
   
  <h1>TAMBAHKAN MENU UTAMA</h1>
  </div>
  <div class='block-content'>	
 
  <form method=POST action='$aksi?module=menuutama&act=input'>

   <p class=inline-small-label> 
   <label for=field4>Nama Menu</label>
 <input type=text name='nama_menu' size=60>
   </p>	  
   
   <p class=inline-small-label> 
   <label for=field4>Link</label>
  <input type=text name='link' size=60>
   </p>	  	  

   <p class=inline-small-label> 
   <label for=field4>Aktif</label>
  <input type=radio name='aktif' value='Y' checked>Ya  
  <input type=radio name='aktif' value='N'> Tidak
   </p>	 
  
  
   <p class=inline-small-label> 
   <label for=field4>Admin Menu</label>
   <input type=radio name='adminmenu' value='admin' checked>admin 
   <input type=radio name='adminmenu' value='user'>user
   </p>	
  
  	*) Apabila Aktif = Y dan Admin Menu = N, maka Menu Utama akan ditampilkan di halaman pengunjung. <br />
 	                      **) Apabila Aktif = N dan Admin Menu = Y, maka Menu Utama akan ditampilkan di halaman administrator.
						  
    <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=menuutama'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </li> </ul>
   </form>";
  break;
	
  // Form Edit Menu Utama
  case "editmenuutama":
    $edit=mysql_query("SELECT * FROM mainmenu WHERE id_main='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "
	<div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h2>Edit Menu Utama</h2>
   </div>
   <div class='block-content'>
   <form method=POST action=$aksi?module=menuutama&act=update>
   <input type=hidden name=id value='$r[id_main]'>
   
   <p class=inline-small-label> 
   <label for=field4>Nama Menu</label>
   <input type=text name='nama_menu' value='$r[nama_menu]' size=40>
   </p>
          
   <p class=inline-small-label> 
   <label for=field4>Link</label>
   <input type=text name='link' value='$r[link]' size=40>
   </p>";
    if ($r[aktif]=='Y'){
		echo "
   			<p class=inline-small-label> 
   			<label for=field4>Aktif</label>
   			<input type=radio name='aktif' value='Y' checked>Ya 
   			<input type=radio name='aktif' value='N'>Tidak
   			</p>";}
    else{
		echo "
   			<p class=inline-small-label> 
   			<label for=field4>aktif</label>
   			<input type=radio name='aktif' value='Y'>Ya 
   			<input type=radio name='aktif' value='N' checked>Tidak
   			</p>";}

    if ($r[adminmenu]=='Y'){
		echo "
   			<p class=inline-small-label> 
   			<label for=field4>Admin Menu</label>
   			<input type=radio name='adminmenu' value='Y'>Ya 
   			<input type=radio name='adminmenu' value='N' checked>Tidak
   			</p>";}
    else{
      echo "
   		<p class=inline-small-label> 
   		<label for=field4>Admin Menu</label>
   		<input type=radio name='adminmenu' value='Y'>Ya 
   		<input type=radio name='adminmenu' value='N' checked>Tidak
   		</p>";}

   echo " 
   *) Apabila Aktif = Y dan Admin Menu = N, maka Menu Utama akan ditampilkan di halaman pengunjung. <br />
 	                      **) Apabila Aktif = N dan Admin Menu = Y, maka Menu Utama akan ditampilkan di halaman administrator.<br/>
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=menuutama'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Update &nbsp;&nbsp;&nbsp;&nbsp;'>
   </li> </ul>
   </form>";
    break;  
}
}
?>
