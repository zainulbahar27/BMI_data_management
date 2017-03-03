<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>


<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){

  echo "
  <link href='css/zalstyle.css' rel='stylesheet' type='text/css'>";

  echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <img src='img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='button' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
  </section>
  </div>";
}
else{

//cek hak akses user
$cek=user_akses($_GET[module],$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){

$aksi="modul/mod_header/aksi_header.php";
switch($_GET[act]){

  // AWAL TAMPIL //////////////////////////
   default:
  
   echo "
   <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=header&act=tambahheader' class='button'>
   <span>Tambahkan Gambar Header</span>
   </a></div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>GAMBAR HEADER</h1>
   <span></span> 
   </div>
   <div class='block-content'>		
    		  
   <table id='table-example' class='table'>	  
	  
   <thead><tr>
   <th><center>Gambar</center></th>
   <th>Judul Gambar</th>
   <th>Url</th>
   <th>Tgl. Posting</th>
   <th>Aksi</th>
   
    </thead>
    <tbody>";
	if ($_SESSION['leveluser']=='admin'){
    $tampil = mysql_query("SELECT * FROM header ORDER BY id_header DESC");}
	
    else{
    
    echo "<span class style=\"color:#FAFAFA;\">$_SESSION[namauser]</span>";
	
    $tampil = mysql_query("SELECT * FROM header ORDER BY id_header DESC");}
   	
   while($r=mysql_fetch_array($tampil)){
 	
   echo "
   <tr class=gradeX>
   <td width=50><center><img src='../header/$r[gambar]' width=80></center></td>
   <td>$r[judul]</td>
   <td>$r[url]</td>
   <td>$r[tgl_posting]</td>
   <td width=80>
   
   <a href=?module=header&act=editheader&id=$r[id_header] rel=tooltip-top title='Edit' class='with-tip'>
   <center><img src='img/edit.png'></a>
   
   <a href=javascript:confirmdelete('$aksi?module=header&act=hapus&id=$r[id_header]&namafile=$r[gambar]') 
   title='Hapus' class='with-tip' rel=tooltip-top>
   &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
	   
   </td></tr>";
   }
   
   echo "</tbody></table> ";
 
    break;    

  //TAMBAH//////////////////////////

   case "tambahheader":
 
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAHKAN GAMBAR HEADER</h1>
   </div>
   <div class='block-content'>	
	
   <form method=POST action='$aksi?module=header&act=input' enctype='multipart/form-data'>

   <p class=inline-small-label> 
   <label for=field4>Judul header</label>
   <input type=text name='judul' size=60>
   </p> 	
		  			
   <p class=inline-small-label> 
   <label for=field4>Url</label>
   <input type=text name='url' value='http://' size=60>
   </p> 	
   

   <p class=inline-small-label> 
   <label for=field4>Gambar</label>
   <input type=file name='fupload' size=40></br>
   <span class style=\"font-size:11px;color:#666;\">&nbsp;&nbsp;&nbsp;&nbsp;
	  (ukuran file gambar header harus <b>980 x 300</b>)</span></p><br/>";
   echo "</p> 	
		  
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=header'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </li> </ul>
  </form>";
   
   break;
    
	// EDIT //////////////////////////
	
    case "editheader":
	
    $edit = mysql_query("SELECT * FROM header WHERE id_header='$_GET[id]'");
    $r    = mysql_fetch_array($edit);


   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT GAMBAR HEADER</h1>
   </div>
   <div class='block-content'>
	
    <form method=POST enctype='multipart/form-data' action=$aksi?module=header&act=update>
    <input type=hidden name=id value=$r[id_header]>
	
   <p class=inline-small-label> 
   <label for=field4>Judul header</label>
   <input type=text name='judul' size=60 value='$r[judul]'>
   </p> 
	   
   <p class=inline-small-label> 
   <label for=field4>Url Gambar</label>
  <textarea name='url' style='width: 720px; height: 200px;'>$r[url]</textarea>
   </p>		  
		  
		  
   <p class=inline-small-label> 
   <label for=field4>Gambar</label> ";
    if ($r[gambar]!=''){
    echo "<img src='../header/$r[gambar]'style='width: 500px;height: 300px;'></p>";  }
		  
   echo "
   <p class=inline-small-label> 
   <label for=field4>Ganti Gambar</label>
   <input type=file name='fupload' size=30>  
   </p>		  

      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=header'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";
	  
    break;  
   }
   //kurawal akhir hak akses module
   } else {
	echo akses_salah();
   }
   }
   ?>


   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>