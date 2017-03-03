<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
        <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_submenu/aksi_submenu.php";
switch($_GET[act]){
  // Tampil Sub Menu
  default:
    echo "
	<div id='main-content'>
   	<div class='container_12'>
   	<div class=grid_12>
	<h2>Sub Menu</h2>
	<a href='?module=submenu&act=tambahsubmenu' class='button'>
    <span>Tambah Sub Menu</span>
    </a><br/><br/>
    <div class='grid_12'>
    <div class='block-border'>
    <div class='block-header'>
    <span></span> 
    </div>
    <div class='block-content'>
	<table id='table-example' class='table'>
    <thead>
    	<tr><td class='center'>no</td>
          <td class='center'>sub menu</td>
		  <td class='center'>kode material group</td>
		  <td class='center'>kode kategori</td>
          <td class='center'>menu utama</td>
          <td class='left'>link submenu</td>
          <td class='center'>aktif</td>
          <td class='center'>admin sub menu</td>
          <td class='center'>aksi</td></tr></thead><tbody>";          

    $tampil = mysql_query("SELECT * FROM submenu,mainmenu WHERE submenu.id_main=mainmenu.id_main");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
	if($r[id_submain]!=0){
		$sub = mysql_fetch_array(mysql_query("SELECT * FROM submenu WHERE id_sub=$r[id_submain]"));
		$mainmenu = $r[nama_menu]." &gt; ".$sub[nama_sub];
	} else {
		$mainmenu = $r[nama_menu];
	}
      echo "<tr><td class='left' width='25'>$no</td>
                <td class='left'>$r[nama_sub]</td>
				<td class='left'>$r[kd_material_group]</td>
				<td class='left'>$r[kd_kategori]</td>
                <td class='left'>$mainmenu</td>
                <td class='left'>$r[link_sub]</td>
                <td class='center'>$r[aktif]</td>
                <td class='center'>$r[adminsubmenu]</td>
		            <td class='center' width='85'><a href=?module=submenu&act=editsubmenu&id=$r[id_sub] title=Edit rel=tooltip-top class=with-tip><center>&nbsp;&nbsp;&nbsp;&nbsp;<img src='img/edit.png' border='0' /></a>
		                <a href=$aksi?module=submenu&act=hapus&id=$r[id_sub] title='hapus' rel=tooltip-top class=with-tip>&nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png' border='0'/></a></td>
		        </tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambahsubmenu":
    echo "
	<div id='main-content'>
  <div class='container_12'>

  <div class='grid_12'>
  <div class='block-border'>
  <div class='block-header'>
   
  <h1>TAMBAHKAN SUB MENU</h1>
  </div>
  <div class='block-content'>
  <form method=POST action='$aksi?module=submenu&act=input'>
          
	<p class=inline-small-label> 
   	<label for=field4>Sub Menu</label>
 	<input type=text name='nama_sub' size=60>
   	</p>
		  
	<p class=inline-small-label> 
   	<label for=field4>Menu Utama</label>
          <select name='menu_utama'>
            <option value=0 selected>- Pilih Menu Utama -</option>";
            $tampil=mysql_query("SELECT * FROM mainmenu WHERE aktif='Y' ORDER BY nama_menu");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_main]>$r[nama_menu]</option>";
            }
    echo "</select></p>
    <p class=inline-small-label> 
   	<label for=field4>Pilih Sub Utama</label>
          <select name='sub_menu'>
            <option value=0 selected>- Pilih Sub Menu -</option>";
            $tampil=mysql_query("SELECT * FROM submenu WHERE id_submain=0 AND aktif='Y' ORDER BY nama_sub");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_sub]>$r[nama_sub]</option>";
            }
    echo "</select></p>
	
	<p class=inline-small-label> 
   	<label for=field4>Link Sub Menu</label>
 	<input type=text name='link_sub' size=60>
   	</p> 
	<p class=inline-small-label> 
   	<label for=field4>Kode Material Group</label>
 	<input type=text name='kd_material' size=60>
   	</p>
	<p class=inline-small-label> 
   	<label for=field4>Kode Kategori</label>
 	<input type=text name='kd_kategori' size=60>
   	</p>
	<p class=inline-small-label> 
   <label for=field4>Deskripsi Kategori</label>
   <textarea name='isi_kategori'  style='width: 720px; height: 350px;'></textarea>
   </p>
	
	<p class=inline-small-label> 
   	<label for=field4>Aktif</label>
  	<input type=radio name='aktif' value='Y' checked>Ya  
  	<input type=radio name='aktif' value='N'> Tidak
   	</p>													 
															 
    <p class=inline-small-label> 
   	<label for=field4>Admin Sub Menu</label>
  	<input type=radio name='adminsubmenu' value='Y' checked>Ya  
  	<input type=radio name='adminsubmenu' value='N'> Tidak
   	</p>
   	
	*) Apabila Aktif = Y dan Admin Sub Menu = N, maka Sub Menu akan ditampilkan di halaman pengunjung. <br />
 	                      **) Apabila Aktif = N dan Admin Sub Menu = Y, maka Sub Menu akan ditampilkan di halaman administrator. <br /><br />
                        ***) Pilih <b>Menu Utama</b> jika ingin membuat Sub Menu dari Menu Utama <br />
	                      ****) Pilih <b>Sub Menu</b> jika ingin membuat Sub Menu dari Sub Menu (hanya berlaku untuk halaman pengunjung)
						  
<div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=submenu'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </li> </ul>
   </form>";     
   break;
    
  case "editsubmenu":
    $edit = mysql_query("SELECT * FROM submenu WHERE id_sub='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "
	<div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h2>Edit Sub Menu</h2>
   </div>
   <div class='block-content'>
	<form method=POST action=$aksi?module=submenu&act=update>
          <input type=hidden name=id value=$r[id_sub]>
          
   <p class=inline-small-label> 
   <label for=field4>Sub Menu</label>
   <input type=text name='nama_sub' value='$r[nama_sub]' size=40>
   </p>
          
	<p class=inline-small-label> 
   	<label for=field4>Menu Utama</label>
   	<select name='menu_utama'>";
 
          $tampil=mysql_query("SELECT * FROM mainmenu WHERE aktif='Y' ORDER BY nama_menu");
          if ($r[id_main]==0){
            echo "<option value=0 selected>- Pilih Menu Utama -</option>";
          }   
          while($w=mysql_fetch_array($tampil)){
            if ($r[id_main]==0 || ($r[id_main]!=0 && $r[id_submain]!=0)){
              echo "<option value=$w[id_main] selected>$w[nama_menu]</option>";
            }
            else{
              echo "<option value=$w[id_main]>$w[nama_menu]</option>";
            }
          }
    echo "</select></p>
	
	<p class=inline-small-label> 
   	<label for=field4>Pilih Sub Menu</label>
	<select name='sub_menu'>";
 
      		$tampil2=mysql_query("SELECT * FROM submenu WHERE id_submain=0 AND aktif='Y' ORDER BY nama_sub");
          if ($r[id_submain]==0){
            echo "<option value=0 selected>- Pilih Sub Menu -</option>";
          }   
          while($s=mysql_fetch_array($tampil2)){
            if ($r[id_submain]==$s[id_sub]){
              echo "<option value=$s[id_sub] selected>$s[nama_sub]</option>";
            }
            else{
              echo "<option value=$s[id_sub]>$s[nama_sub]</option>";
            }
          }
    echo "</select></p>
	
	<p class=inline-small-label> 
   <label for=field4>Link Sub Menu</label>
   <input type=text name='link_sub' value='$r[link_sub]' size=40>
   </p>
   <p class=inline-small-label> 
   <label for=field4>Kode Material Group</label>
   <input type=text name='kd_material' value='$r[kd_material_group]' size=40>
   </p>
   <p class=inline-small-label> 
   <label for=field4>Kode Kategori</label>
   <input type=text name='kd_kategori' value='$r[kd_kategori]' size=40>
   </p>
   <p class=inline-small-label> 
   <label for=field4>Deskripsi Kategori</label>
   <textarea name='isi_kategori' style='width: 550px; height: 500px;'>$r[isi_kategori]</textarea></td>
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
   			<label for=field4>Aktif</label>
   			<input type=radio name='aktif' value='Y'>Ya 
   			<input type=radio name='aktif' value='N' checked>Tidak
   			</p>";}
			
	if ($r[adminsubmenu]=='Y'){
		echo "
   			<p class=inline-small-label> 
   			<label for=field4>Admin Sub Menu</label>
   			<input type=radio name='adminsubmenu' value='Y'>Ya 
   			<input type=radio name='adminsubmenu' value='N' checked>Tidak
   			</p>";}
    else{
      echo "
   		<p class=inline-small-label> 
   		<label for=field4>Admin Sub Menu</label>
   		<input type=radio name='adminsubmenu' value='Y'>Ya 
   		<input type=radio name='adminsubmenu' value='N' checked>Tidak
   		</p>";}
	      
    echo "*) Apabila Aktif = Y dan Admin Sub Menu = N, maka Sub Menu akan ditampilkan di halaman pengunjung. <br />
 	                      **) Apabila Aktif = N dan Admin Sub Menu = Y, maka Sub Menu akan ditampilkan di halaman administrator. <br /><br />
                        ***) Pilih <b>Menu Utama</b> jika ingin membuat Sub Menu dari Menu Utama <br />
	                      ****) Pilih <b>Sub Menu</b> jika ingin membuat Sub Menu dari Sub Menu (hanya berlaku untuk halaman pengunjung)
         <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=submenu'>Batal</a>
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
